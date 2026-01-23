# Service Worker Caching Strategy Documentation

## Overview

A comprehensive caching system has been implemented using Service Workers to improve performance and provide offline support. The system uses multiple caching strategies optimized for different content types.

## Caching Strategies

### 1. **Cache-First Strategy** (Static Assets)
**Priority:** Cache → Network

**Used for:**
- CSS files (`/assets/css/`)
- JavaScript files (`/assets/js/`)
- Fonts (`/assets/fonts/`)
- Icon fonts (`/assets/icons/`)
- Vendor libraries (`/assets/vendor/`)

**Behavior:**
- Serves cached version immediately if available
- Falls back to network if cache miss
- Updates cache when new version is fetched
- Perfect for versioned assets that rarely change

**Cache Duration:** 30 days

### 2. **Stale-While-Revalidate Strategy** (Dynamic Images)
**Priority:** Cache + Background Update

**Used for:**
- Product images (`/storage/`)
- Product variations
- Category images
- Dynamic content images

**Behavior:**
- Returns cached image immediately (fast)
- Fetches fresh version in background
- Updates cache with new version
- Provides offline support with stale content
- Optimal for images that update occasionally

**Cache Duration:** 7 days

### 3. **Network-First Strategy** (API Requests)
**Priority:** Network → Cache

**Used for:**
- API endpoints (`/api/`)
- Product data
- User-specific content
- Dynamic pricing

**Behavior:**
- Attempts to fetch from network first
- 5-second timeout before falling back to cache
- Caches successful responses
- Returns cached data if network fails
- Ensures freshness of critical data

**Cache Duration:** 5 minutes
**Network Timeout:** 5 seconds

### 4. **Default Strategy**
**Priority:** Network → Cache → Offline Fallback

**Used for:**
- HTML pages
- Other resources
- Fallback for unmapped requests

## File Organization

### Precached Files (Cached on Install)

Essential files that are cached immediately when the service worker installs:

```
✓ offline.html
✓ manifest.json
✓ App icons (all sizes)
✓ Theme switcher JavaScript
✓ System fonts
✓ Icon font CSS
✓ Theme CSS (main & RTL)
✓ Theme JavaScript
✓ Swiper library (JS & CSS)
```

### Dynamic Caches

Created and managed automatically based on request patterns:

- **static-assets** - CSS, JS, fonts, vendor libraries
- **dynamic-images** - Product and category images
- **api-responses** - API responses and dynamic content

## Implementation Details

### Service Worker File

Located at: `service-worker.js`

Key components:
- **SETTINGS.cacheStrategy** - Configuration for all strategies
- **Install Event** - Precaches essential files and cleans old caches
- **Activate Event** - Cleans up old version caches
- **Fetch Event** - Routes requests to appropriate strategy

### Cache Versioning

Caches include a timestamp header (`sw-cache-date`) to track age:
```javascript
headers.append('sw-cache-date', Date.now().toString())
```

This allows:
- Checking cache freshness
- Implementing TTL (Time To Live)
- Smart invalidation

### Cache Management Utilities

Added to `main.js`, these functions allow manual cache control:

```javascript
// Get information about all caches
await getCacheInfo()

// Clear specific cache
await clearCache('static-assets')

// Clear all caches
await clearAllCaches()

// Clear caches by pattern
await clearCachesByPattern('api-')

// Prewarm cache with URLs
await prewarmCache([
  'assets/css/theme.min.css',
  'assets/vendor/swiper/swiper-bundle.min.js'
])

// Get storage quota and usage
const info = await estimateCacheSize()

// Log cache status to console
await logCacheStatus()
```

## Browser Console Usage

### Monitor Cache Status
```javascript
// View all caches and their contents
await window.logCacheStatus()

// Get detailed cache information
const info = await window.getCacheInfo()
console.log(info)

// Check storage quota
const storage = await window.estimateCacheSize()
console.log(`Using ${storage.percentage}% of storage`)
```

### Clear Caches
```javascript
// Clear all caches (forces fresh reload)
await window.clearAllCaches()

// Clear specific cache type
await window.clearCache('api-responses')

// Clear API caches only
await window.clearCachesByPattern('api-')
```

### Prewarm Cache
```javascript
// Pre-cache important assets before they're needed
await window.prewarmCache([
  '/assets/css/theme.min.css',
  '/assets/js/theme.min.js',
  'https://fonts.googleapis.com/...'
])
```

## Cache Headers (Server Configuration)

To work optimally with this service worker, configure server cache headers:

### Static Assets (30-day cache)
```
Cache-Control: public, max-age=2592000, immutable
```

### Product Images (7-day cache)
```
Cache-Control: public, max-age=604800, stale-while-revalidate=604800
```

### API Responses (5-minute cache)
```
Cache-Control: private, max-age=300, stale-while-revalidate=300
```

### HTML Pages (No cache)
```
Cache-Control: private, no-cache, must-revalidate
```

## Offline Support

When the network is unavailable:
1. Cached assets are served immediately
2. For images, stale versions are shown
3. API failures fallback to cached responses
4. Missing resources show `offline.html`

## Performance Impact

### Expected Improvements

- **Repeat Visits:** 40-60% faster load times
- **Static Assets:** Nearly instant (from cache)
- **Images:** Served while fresh version loads
- **Offline:** Full functionality with cached content
- **Mobile:** Reduced data usage through caching

### Metrics

- Cache size limit: Browser-dependent (typically 50-500MB)
- Precached files: ~50KB
- Dynamic cache growth: Depends on browsing habits

## Maintenance

### Clearing Cache on Update

To force users to get fresh content, increment the version in `service-worker.js`:

```javascript
appVersion: '3.1.3' // Changed from 3.1.2
```

This automatically:
1. Triggers installation of new service worker
2. Creates new cache with version suffix
3. Cleans up old version caches
4. Forces refresh of all cached assets

### Disabling Service Worker

To temporarily disable caching, remove the registration in `index.html`:
```html
<!-- Comment out or remove: -->
<!-- <script>
  if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/service-worker.js')
  }
</script> -->
```

## Debugging

### Enable Diagnostic Logs

In `service-worker.js`:
```javascript
const SETTINGS = {
  diagnostics: true, // Enable console logging
  // ...
}
```

Then check browser console for service worker logs.

### Chrome DevTools

1. Open DevTools → Application tab
2. Service Workers section - View registered workers
3. Cache Storage section - Inspect cached files
4. Network tab - See cache hits (from service worker icon)

### Storage Quota

Check available storage:
```javascript
if ('storage' in navigator && 'estimate' in navigator.storage) {
  const estimate = await navigator.storage.estimate()
  console.log(estimate)
}
```

## Best Practices

1. **Version Assets** - Use fingerprints in filenames for cache busting
2. **Monitor Size** - Keep total cache under quota limits
3. **Clean Old Caches** - Update version when deploying changes
4. **Test Offline** - Verify offline behavior works as expected
5. **Use Timeout** - Network-first has timeout to prevent hanging
6. **User Control** - Provide UI to clear cache if needed

## Troubleshooting

### Cache Not Updating

- Increment `appVersion` in service-worker.js
- Clear browser cache manually
- Check cache headers on server
- Ensure file URLs are consistent

### Offline Mode Not Working

- Verify `offline.html` exists and is accessible
- Check service worker registration
- Enable diagnostics to see logs
- Test in Chrome DevTools with "Offline" mode

### Storage Quota Exceeded

```javascript
// Check and clear old caches
await window.clearAllCaches()

// Or clear specific types
await window.clearCachesByPattern('dynamic-')
```

### Service Worker Not Installing

- Check browser console for errors
- Verify HTTPS is enabled (required for service workers)
- Ensure service-worker.js file path is correct
- Check precached file paths are accessible

## Future Enhancements

Potential improvements:
1. IndexedDB for larger data storage
2. Background sync for offline actions
3. Push notifications
4. Cache quota management UI
5. Progressive image loading with placeholders
6. WebP/AVIF format detection and caching
