FROM php:7.4-apache

RUN a2enmod rewrite cgi

# Setup directories
RUN mkdir -p /var/www/html/app/Controller && \
    mkdir -p /var/www/html/public && \
    mkdir -p /var/www/html/debug

# Copy application
COPY www/ /var/www/html/

# CGI phpinfo debugger
RUN mkdir -p /usr/lib/cgi-bin
COPY www/debug/phpinfo.php /usr/lib/cgi-bin/phpinfo.php
RUN chmod +x /usr/lib/cgi-bin/phpinfo.php

# Enable CGI
RUN a2enmod cgid

# Apache rewrite rules
COPY www/.htaccess /var/www/html/.htaccess
COPY www/public/.htaccess /var/www/html/public/.htaccess

# Permissions
RUN chmod -R 755 /var/www/html

EXPOSE 80
CMD ["apache2-foreground"]
