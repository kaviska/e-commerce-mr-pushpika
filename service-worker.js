// Settings
const SETTINGS = {
  appName: 'Atsmore',
  // To clear cache on devices, always change SETTINGS.appVersion number after making changes.
  // The app will serve fresh content right away or after 2-3 refreshes (open / close)
  appVersion: '3.1.2',
  diagnostics: false, // Set to true to enable diagnostic logs
  
  // Cache Strategy Configuration
  cacheStrategy: {
    // Precache files - Loaded immediately on install
    precache: [
      'offline.html',
      'manifest.json',
      'assets/app-icons/icon-32x32.png',
      'assets/app-icons/icon-180x180.png',
      'assets/app-icons/icon-144x144.png',
      'assets/app-icons/icon-192x192.png',
      'assets/app-icons/icon-512x512.png',
      'assets/js/theme-switcher.js',
      'assets/fonts/inter-variable-latin.woff2',
      'assets/icons/cartzilla-icons.woff2',
      'assets/icons/cartzilla-icons.min.css',
      'assets/css/theme.min.css',
      'assets/css/theme.rtl.min.css',
      'assets/js/theme.min.js',
      'assets/vendor/swiper/swiper-bundle.min.js',
      'assets/vendor/swiper/swiper-bundle.min.css',
    ],
    
    // Cache-first strategy: Serve from cache, fallback to network (for static assets)
    cacheFirst: {
      cacheName: 'static-assets',
      paths: [
        '/assets/css/',
        '/assets/js/',
        '/assets/fonts/',
        '/assets/icons/',
        '/assets/vendor/',
        '/assets/img/',
      ],
      maxAge: 2592000, // 30 days in seconds
    },
    
    // Stale-while-revalidate: Serve cached but update in background (for images)
    staleWhileRevalidate: {
      cacheName: 'dynamic-images',
      paths: [
        '/storage/',
        '/assets/img/',
      ],
      maxAge: 604800, // 7 days in seconds
    },
    
    // Network-first strategy: Try network first, fallback to cache (for APIs and dynamic content)
    networkFirst: {
      cacheName: 'api-responses',
      paths: [
        '/api/',
      ],
      timeout: 5000, // 5 seconds network timeout
      maxAge: 300, // 5 minutes cache duration
    },
  },
  
  // Add all files you want to view offline to cachedFiles array (legacy support)
  cachedFiles: [],
}
SETTINGS.cacheName = `${SETTINGS.appName}-${SETTINGS.appVersion}`

/**
 * Helper function for logging messages to the console based on the message type.
 * @param {string} message - The message to log.
 * @param {string} type - The type of message ('info' or 'error').
 */
const logMessage = (message, type = 'info') => {
  if (SETTINGS.diagnostics) {
    if (type === 'error') {
      console.error(message)
    } else {
      console.log(message)
    }
  }
}

// Install Service Worker, create/open cache and precache files
self.addEventListener('install', (e) => {
  e.waitUntil(
    Promise.all([
      // Precache essential files
      caches.open(SETTINGS.cacheName).then((cache) => {
        logMessage(`[Service Worker] Precaching ${SETTINGS.cacheStrategy.precache.length} files`)
        return cache.addAll(SETTINGS.cacheStrategy.precache).catch((err) => {
          logMessage(
            `[Service Worker Cache] Precache error - some files may be missing or paths incorrect - ${err}`,
            'error'
          )
        })
      }),
      
      // Clear old caches
      caches.keys().then((cacheNames) => {
        return Promise.all(
          cacheNames.map((cacheName) => {
            if (cacheName !== SETTINGS.cacheName && 
                cacheName !== SETTINGS.cacheStrategy.cacheFirst.cacheName &&
                cacheName !== SETTINGS.cacheStrategy.staleWhileRevalidate.cacheName &&
                cacheName !== SETTINGS.cacheStrategy.networkFirst.cacheName) {
              logMessage(`[Service Worker] Deleting old cache: ${cacheName}`)
              return caches.delete(cacheName)
            }
          })
        )
      }),
    ])
    .then(() => {
      logMessage('[Service Worker] Install complete, skipping waiting')
      return self.skipWaiting()
    })
  )
  logMessage('[Service Worker] Installing...')
})

// Activate Service Worker and clean up old caches
self.addEventListener('activate', (e) => {
  e.waitUntil(
    caches.keys().then((cacheNames) => {
      return Promise.all(
        cacheNames.map((cacheName) => {
          if (cacheName !== SETTINGS.cacheName &&
              cacheName !== SETTINGS.cacheStrategy.cacheFirst.cacheName &&
              cacheName !== SETTINGS.cacheStrategy.staleWhileRevalidate.cacheName &&
              cacheName !== SETTINGS.cacheStrategy.networkFirst.cacheName) {
            logMessage(`[Service Worker] Cleaning up cache: ${cacheName}`)
            return caches.delete(cacheName)
          }
        })
      )
    })
    .then(() => {
      logMessage('[Service Worker] Activation complete, claiming clients')
      return self.clients.claim()
    })
  )
  logMessage('[Service Worker] Activating...')
})

/**
 * Helper function to check if URL matches strategy paths
 */
function matchesStrategy(url, strategyPaths) {
  return strategyPaths.some(path => url.includes(path))
}

/**
 * Helper function to check if cached response is still fresh
 */
function isCacheFresh(response, maxAge) {
  if (!response) return false
  const cacheDate = response.headers.get('sw-cache-date')
  if (!cacheDate) return false
  
  const age = (Date.now() - parseInt(cacheDate)) / 1000
  return age < maxAge
}

/**
 * Cache-first strategy: Serve from cache, fallback to network
 */
function cacheFirstStrategy(request) {
  return caches.open(SETTINGS.cacheStrategy.cacheFirst.cacheName)
    .then((cache) => {
      return cache.match(request).then((response) => {
        if (response && isCacheFresh(response, SETTINGS.cacheStrategy.cacheFirst.maxAge)) {
          logMessage(`[Cache-First] Hit: ${request.url}`)
          return response
        }

        logMessage(`[Cache-First] Miss/Stale: ${request.url} - fetching from network`)
        return fetch(request)
          .then((networkResponse) => {
            if (!networkResponse || networkResponse.status !== 200 || networkResponse.type === 'error') {
              return response || networkResponse
            }

            const responseToCache = networkResponse.clone()
            const headers = new Headers(responseToCache.headers)
            headers.append('sw-cache-date', Date.now().toString())
            
            cache.put(
              request,
              new Response(responseToCache.body, {
                status: responseToCache.status,
                statusText: responseToCache.statusText,
                headers: headers,
              })
            )

            return networkResponse
          })
          .catch(() => {
            logMessage(`[Cache-First] Network failed, returning cached version: ${request.url}`)
            return response || caches.match('offline.html')
          })
      })
    })
}

/**
 * Stale-while-revalidate strategy: Serve cached, update in background
 */
function staleWhileRevalidateStrategy(request) {
  return caches.open(SETTINGS.cacheStrategy.staleWhileRevalidate.cacheName)
    .then((cache) => {
      return cache.match(request).then((response) => {
        const fetchPromise = fetch(request)
          .then((networkResponse) => {
            if (networkResponse && networkResponse.status === 200) {
              const responseToCache = networkResponse.clone()
              const headers = new Headers(responseToCache.headers)
              headers.append('sw-cache-date', Date.now().toString())
              
              cache.put(
                request,
                new Response(responseToCache.body, {
                  status: responseToCache.status,
                  statusText: responseToCache.statusText,
                  headers: headers,
                })
              )
            }
            return networkResponse
          })
          .catch(() => {
            logMessage(`[Stale-While-Revalidate] Network failed: ${request.url}`)
            return response
          })

        // Return cached response immediately, or wait for network if no cache
        return response || fetchPromise
      })
    })
}

/**
 * Network-first strategy: Try network first, fallback to cache
 */
function networkFirstStrategy(request) {
  const timeout = SETTINGS.cacheStrategy.networkFirst.timeout
  const fetchWithTimeout = new Promise((resolve, reject) => {
    const timeoutId = setTimeout(() => {
      reject(new Error('Network request timeout'))
    }, timeout)

    fetch(request)
      .then((response) => {
        clearTimeout(timeoutId)
        
        if (!response || response.status !== 200) {
          reject(response)
          return
        }

        // Cache successful responses
        const responseToCache = response.clone()
        const headers = new Headers(responseToCache.headers)
        headers.append('sw-cache-date', Date.now().toString())

        caches.open(SETTINGS.cacheStrategy.networkFirst.cacheName)
          .then((cache) => {
            cache.put(
              request,
              new Response(responseToCache.body, {
                status: responseToCache.status,
                statusText: responseToCache.statusText,
                headers: headers,
              })
            )
          })

        resolve(response)
      })
      .catch((err) => {
        clearTimeout(timeoutId)
        reject(err)
      })
  })

  return fetchWithTimeout
    .catch(() => {
      logMessage(`[Network-First] Network failed/timeout: ${request.url} - trying cache`)
      return caches.open(SETTINGS.cacheStrategy.networkFirst.cacheName)
        .then((cache) => {
          return cache.match(request)
            .then((response) => {
              return response || caches.match('offline.html')
            })
        })
    })
}

// Intelligent fetch handler with caching strategies
self.addEventListener('fetch', (e) => {
  const { request } = e
  const requestUrl = new URL(request.url)

  // Skip non-GET requests
  if (request.method !== 'GET') {
    return
  }

  // Skip chrome extensions and other non-http(s) requests
  if (!requestUrl.protocol.startsWith('http')) {
    return
  }

  // Determine which strategy to use
  let responsePromise

  // API requests - Network first
  if (matchesStrategy(requestUrl.pathname, SETTINGS.cacheStrategy.networkFirst.paths)) {
    responsePromise = networkFirstStrategy(request)
  }
  // Dynamic images - Stale while revalidate
  else if (matchesStrategy(requestUrl.pathname, SETTINGS.cacheStrategy.staleWhileRevalidate.paths)) {
    responsePromise = staleWhileRevalidateStrategy(request)
  }
  // Static assets - Cache first
  else if (matchesStrategy(requestUrl.pathname, SETTINGS.cacheStrategy.cacheFirst.paths)) {
    responsePromise = cacheFirstStrategy(request)
  }
  // Default - Network first with offline fallback
  else {
    responsePromise = fetch(request)
      .catch(() => {
        logMessage(`[Default] Network failed: ${request.url}`)
        return caches.match('offline.html')
      })
  }

  e.respondWith(responsePromise)
})
