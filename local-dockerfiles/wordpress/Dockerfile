FROM "wordpress:${WP_VERSION:-5.5.0}-php${PHP_VERSION:-7.3}-apache"

RUN set -ex; \
	apt-get update; \
	apt-get install -y --no-install-recommends \
		libjpeg-dev \
		libpng-dev \
		libmemcached-dev \
		zlib1g-dev \
	; \
	docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr; \
	docker-php-ext-install gd mysqli opcache; \
	pecl install memcached-3.1.4; \
	pecl install memcache; \
	apt-get purge -y --auto-remove -o APT::AutoRemove::RecommendsImportant=false; \
	rm -rf /var/lib/apt/lists/*
