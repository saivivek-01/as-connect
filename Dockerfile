# Base image with Apache and PHP
FROM php:7.4-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install MySQLi extension
RUN docker-php-ext-install mysqli

# Copy project files into Apache's root directory
COPY . /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html/

# Expose Apache
EXPOSE 80