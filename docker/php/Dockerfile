FROM php:7.4-fpm


RUN docker-php-ext-install pdo_mysql



# Clean up APT when done.
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/

CMD ["php-fpm"]

