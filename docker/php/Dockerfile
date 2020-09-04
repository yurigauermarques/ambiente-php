FROM php:7.4-fpm

RUN apt-get update \
 && apt-get install -y --no-install-recommends \
    curl \
    openssl \
    acl


RUN docker-php-ext-install pdo_mysql 



# Clean up APT when done.
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/



COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint

ENTRYPOINT ["docker-entrypoint"]
CMD ["php-fpm"]


