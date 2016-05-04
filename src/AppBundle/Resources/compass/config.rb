# Require any additional compass plugins here.

# Set this to the root of your project when deployed:
# we use http_path as relative for css_rewrite. other wise it does not works.
http_path = "."
css_dir = "../public/css"
sass_dir = "sass"
javascripts_dir = "../public/js"
# this is for the path in the generated css file.
images_dir = "../images"
#this is for the images file load path.
sprite_load_path = "images"
#this is the path for generated sprite image path.
generated_images_dir = "../public/images"
require 'bootstrap-sass'
# You can select your preferred output style here (can be overridden via the command line):
# output_style = :expanded or :nested or :compact or :compressed
output_style = :expanded

# To enable relative paths to assets via compass helper functions. Uncomment:
# relative_assets = true

# To disable debugging comments that display the original location of your selectors. Uncomment:
line_comments = true

# If you prefer the indented syntax, you might want to regenerate this
# project again passing --syntax sass, or you can uncomment this:
# preferred_syntax = :sass
# and then run:
# sass-convert -R --from scss --to sass sass scss && rm -rf sass && mv scss sass
