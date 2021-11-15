FROM php:8-fpm

LABEL maintainer="mohammed_hs55@yahoo.com"

# Install dependencies
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zlib1g-dev \
    libxml2-dev \
    libzip-dev \
    locales \
    redis-server \
    git \
    curl


# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mysqli mbstring zip exif pcntl

# install supervisor
# RUN apt-get update && apk add --no-cache supervisor

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# install latest version node-js, npm
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
RUN apt-get install -y nodejs

#Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
