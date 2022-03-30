FROM ubuntu
ENV DEBIAN_FRONTEND = noninteractive

# Installing apache2 and php module
RUN apt-get update
RUN apt-get install -y apache2
RUN apt-get install -y apache2-utils
RUN apt-get install -y php
RUN apt-get install -y libapache2-mod-php
RUN apt-get install -y vim
RUN apt-get install -y python3
RUN apt-get clean

COPY run-apache2.sh /usr/local/bin/

WORKDIR /usr/local/bin/

RUN chmod a+x run-apache2.sh

WORKDIR /var/www/html

COPY src .

RUN rm index.html

RUN chown www-data:www-data /var/www/html

CMD ["run-apache2.sh"]