# Sail's own composer image already bundles PHP-CLI, Composer, Node, and npm —
# there's no need for a full Sail install (this isn't a full Laravel app, so
# `artisan sail:install` has nothing to hook into). This just reuses the image.
FROM laravelsail/php83-composer:latest

WORKDIR /var/www/html
