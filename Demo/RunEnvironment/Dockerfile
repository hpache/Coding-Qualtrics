FROM ubuntu
ENV DEBIAN_FRONTEND = noninteractive

# Installing apache2 and php module
RUN apt-get update
RUN apt-get install -y apache2
RUN apt-get install -y apache2-utils
RUN apt-get install -y php
RUN apt-get install -y libapache2-mod-php

# Installing vim
RUN apt-get install -y vim
# Installing python3
RUN apt-get install -y python3
RUN apt-get clean

# Copying the run.php file to the working apache2 directory
WORKDIR /var/www/html
COPY RunEnvironment/run.php .

# Exposing port 80, running apache2 and restarting it to get php module running
EXPOSE 80 
CMD ["apache2ctl", "-D", "FOREGROUND"]
RUN apache2ctl restart

# Allowing write access to php in the /var/www/html directory only!
RUN chown www-data:www-data /var/www/html

# Updating headers to allow outside origins 
RUN a2enmod headers
WORKDIR /etc/apache2
COPY RunEnvironment/apache2.conf .
RUN apache2ctl restart