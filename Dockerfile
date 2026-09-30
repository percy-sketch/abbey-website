# Sail's composer image bundles PHP-CLI and Composer but not Node/npm, so Node
# is installed on top. There's no need for a full Sail install (this isn't a
# full Laravel app, so `artisan sail:install` has nothing to hook into).
FROM laravelsail/php83-composer:latest

RUN apt-get update \
    && apt-get install -y --no-install-recommends ca-certificates curl \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y --no-install-recommends nodejs \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html
