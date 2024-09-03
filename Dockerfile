FROM php:8.1-cli

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y --no-install-recommends \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    unzip \
    libzip-dev \
    vim \
    git \
    curl \
    supervisor \
    unixodbc-dev \
    gcc \
    g++ \
    make \
    default-libmysqlclient-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-configure zip \
    && docker-php-ext-install pdo pdo_mysql gd zip \
    && curl -fsSL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y --no-install-recommends nodejs \
    && pecl install pdo_sqlsrv \
    && pecl install sqlsrv \
    && docker-php-ext-enable pdo_sqlsrv \
    && docker-php-ext-enable sqlsrv \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www/html
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN composer install --optimize-autoloader --no-dev --prefer-dist --no-progress --no-suggest

RUN npm install --production --silent && npm cache clean --force

EXPOSE 8001

CMD ["/usr/bin/supervisord"]
