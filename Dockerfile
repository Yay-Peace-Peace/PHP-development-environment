FROM webdevops/php-apache:7.4-alpine

RUN apk add --no-cache $PHPIZE_DEPS && pecl install xdebug && docker-php-ext-enable xdebug
RUN curl -s https://getcomposer.org/installer | php
RUN alias composer='php composer.phar'
RUN echo memory_limit = 512M >> /opt/docker/etc/php/php.ini
RUN echo error_reporting=E_ALL >> /opt/docker/etc/php/php.ini
RUN echo display_errors=On >> /opt/docker/etc/php/php.ini
RUN echo date.timezone=America/Sao_Paulo >> /opt/docker/etc/php/php.ini
RUN echo extension=php_openssl.dll  >> /opt/docker/etc/php/php.ini
RUN echo LoadModule rewrite_module modules/mod_rewrite.so >> /etc/apache2/httpd.conf