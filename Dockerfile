FROM ubuntu
ENV DEBIAN_FRONTEND = noninteractive

RUN mkdir -p /usr/share/man/man1

# Updating apt
RUN apt-get update
# Installing apache2
RUN apt-get install -y apache2
# Installing utilities for apache2 
RUN apt-get install -y apache2-utils
# Installing php
RUN apt-get install -y php
# Installing pecl
RUN apt-get install -y php-pear php-dev
# Installing composer 
RUN apt-get install -y composer
# Installing php module for apache2
RUN apt-get install -y libapache2-mod-php
# Installing python3
RUN apt-get install -y python3
# Installing latest java build
RUN apt-get install -y default-jdk
RUN apt-get clean

RUN composer self-update --2

# Installing mongodb extension
RUN pecl install mongodb

# Copying script to user/local/bin directory
COPY run-apache2.sh /usr/local/bin/

# Changing working directory to usr/local/bin directory
WORKDIR /usr/local/bin/

# Making the shell script executable
RUN chmod a+x run-apache2.sh


# Copying the custom php.ini configuration file to cli directory
COPY php.ini /etc/php/7.4/cli/php.ini
# Copying the custom php.ini configuration file to apache2 directory
COPY php.ini /etc/php/7.4/apache2/php.ini

# changing working directory to /var/www/html
WORKDIR /var/www/html

# Copying files in the src directory to /var/www/html
COPY src .


# Spiking mongodb library and extension
RUN composer require mongodb/mongodb

# Allowing php to read,write, and delete
# files ONLY IN /var/www/html
RUN chown www-data:www-data /var/www/html


RUN a2enmod headers

# Copying the custom apache2 configuration file 
COPY apache2.conf /etc/apache2/apache2.conf


# Running the run-apache2.sh script to start apache2
# Correctly (auto-assign open ports without Docker)
CMD ["run-apache2.sh"]