
import os

file_path = r"c:\xampp\htdocs\My Project\e-commerce-mr-pushpika\components\ShopProduct.php"

with open(file_path, 'r', encoding='utf-8') as f:
    lines = f.readlines()

new_lines = []
inside_grid = False
grid_started = False
footer_preserved = False

for i, line in enumerate(lines):
    # Keep lines until we hit the product grid container start
    if '<div class="col-lg-9">' in line:
        new_lines.append(line)
        # Add the new grid container immediately after
        new_lines.append('            <div class="row row-cols-2 row-cols-md-3 g-4 pb-3 mb-3" id="product-grid">\n')
        new_lines.append('              <!-- Products will be loaded here via JS -->\n')
        new_lines.append('            </div>\n')
        inside_grid = True
        grid_started = True
        continue
    
    if inside_grid:
        # We are inside the part we want to skip.
        # Check for the end of the section/grid to resume
        # We know the file ends with:
        #           </div>
        #         </div>
        #       </section>
        # And we want to keep those.
        # But wait, looking at the previous reads, the </div> at 1675 matches col-lg-9
        # So we should skip everything until we see the closing div sequence near the end?
        # A safer way: We know line 303 was col-lg-9.
        # We want to keep line 303.
        # We want to discard everything after 303 until line 1675.
        # So I will just specific key lines index if I was sure, but line numbers might shift if I edited before? No I didn't.
        # But let's use the explicit logic:
        # Skip everything until we see the footer pattern matching the end of the file.
        # The logic:
        # If we have started result, we skip lines.
        # But we need to define when to stop skipping.
        # We can stop skipping when we reach the last 3 lines of the file.
        pass
    else:
        new_lines.append(line)

# Now append the footer
# We know the last few lines are closing divs.
# I'll manually append the closing divs because I know I deleted the internal structure.
# col-lg-9 was opened. I searched for it.
# I added valid content inside it.
# Now I need to close col-lg-9, row, section.
# The original file had:
# 1675:           </div> (closes col-lg-9)
# 1676:         </div> (closes row)
# 1677:       </section> (closes section)
# I should just append these.

# Correct logic:
# 1. Read all lines.
# 2. Find index of '<div class="col-lg-9">'
# 3. Find index of '</section>' (last occurrence)
# 4. Slice.

start_index = -1
end_index = -1

for i, line in enumerate(lines):
    if '<div class="col-lg-9">' in line:
        start_index = i
        break

for i in range(len(lines) - 1, -1, -1):
    if '</section>' in lines[i]:
        end_index = i
        break

if start_index != -1 and end_index != -1:
    # Keep lines up to start_index (inclusive of col-lg-9)
    # The original file has <div class="col-lg-9"> then <div class="row...
    # I want to keep <div class="col-lg-9">.
    # So I keep lines[:start_index+1]
    
    final_output = lines[:start_index+1]
    final_output.append('            <div class="row row-cols-2 row-cols-md-3 g-4 pb-3 mb-3" id="product-grid">\n')
    final_output.append('              <!-- Products will be loaded here via JS -->\n')
    final_output.append('            </div>\n')
    
    # Now I need to close the col-lg-9.
    # The original file had `</div>` at 1675 closing it.
    # The `end_index` points to `</section>`.
    # The line before `</section>` (end_index-1) is `</div>` (closes row)
    # The line before that (end_index-2) is `</div>` (closes col-lg-9)
    # So I can just take the last 3 lines of the original file?
    # lines[end_index-2] -> closes col-lg-9
    # lines[end_index-1] -> closes row
    # lines[end_index] -> closes section
    
    # Wait, check indentation.
    # 1675:           </div>
    # 1676:         </div>
    # 1677:       </section>
    
    final_output.append('          </div>\n') # Closes col-lg-9
    final_output.append('        </div>\n')   # Closes row
    final_output.append('      </section>\n') # Closes section (or append from original if there's other stuff)
    
    # Wait, `section` closes the whole component.
    # Is there anything after?
    # I'll check if end_index is the last line.
    
    if end_index < len(lines) - 1:
        # There is content after /section?
        # View file showed 1677 as last line.
        pass
    
    with open(file_path, 'w', encoding='utf-8') as f:
        f.writelines(final_output)
    print("Successfully updated ShopProduct.php")
else:
    print("Could not find start or end markers")
