FROM ubuntu
ENV DEBIAN_FRONTEND = noninteractive

# Updating apt
RUN apt-get update
# Installing apache2
RUN apt-get install -y apache2
# Installing utilities for apache2 
RUN apt-get install -y apache2-utils
# Installing php
RUN apt-get install -y php
# Installing php module for apache2
RUN apt-get install -y libapache2-mod-php
# Installing python3
RUN apt-get install -y python3
# Installing latest java build
RUN apt-get install -y default-jdk
RUN apt-get clean

# Copying script to user/local/bin directory
COPY run-apache2.sh /usr/local/bin/

# Changing working directory to usr/local/bin directory
WORKDIR /usr/local/bin/

# Making the shell script executable
RUN chmod a+x run-apache2.sh

# Copying the custom apache2 configuration file 
COPY apache2.conf /etc/apache2/apache2.conf

# changing working directory to /var/www/html
WORKDIR /var/www/html

# Copying files in the src directory to /var/www/html
COPY src .

# Removing default index.html file
RUN rm index.html

# Allowing php to read,write, and delete
# files ONLY IN /var/www/html
RUN chown www-data:www-data /var/www/html

# Running the run-apache2.sh script to start apache2
# Correctly (auto-assign open ports without Docker)
CMD ["run-apache2.sh"]