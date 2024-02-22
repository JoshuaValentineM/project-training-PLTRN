FROM php:7-apache
RUN sed -i 's/Listen 80/Listen $PORT/' /etc/apache2/ports.conf
ENV PORT=8080
RUN docker-php-ext-install mysqli
# MAINTAINER YOUR_EMAIL_OR_ORGANIZATION
RUN mkdir -p /var/www/public
WORKDIR /var/www/public

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
COPY start-apache /usr/local/bin
RUN a2enmod rewrite

# Copy application source
COPY . .
RUN chown -R www-data:www-data /var/www
RUN chown -R 10000:10000 /etc/apache2
RUN chmod +x /usr/local/bin/start-apache
CMD ["start-apache"]