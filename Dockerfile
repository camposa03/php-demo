FROM php:7.2-fpm-alpine
WORKDIR /src
# add curl
RUN apk add curl
# lumen packages
RUN docker-php-ext-install mbstring tokenizer mysqli pdo_mysql 
# install composer 
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer 
COPY . .
# install dependencies
RUN composer install
# php -S localhost:9999 -t public
CMD [ "php", "-S", "0.0.0.0:9999", "-t", "/src/public", "/src/public/index.php" ] 