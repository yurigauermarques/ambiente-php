FROM php:7.4-fpm


RUN docker-php-ext-install pdo_mysql


RUN apt-get update && \
apt-get install -y apt-utils && \
apt-get install -y acl && \
apt-get install -y procps




# Clean up APT when done.
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/


COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh
ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["php-fpm"]

