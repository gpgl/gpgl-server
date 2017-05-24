FROM ubuntu:16.04

MAINTAINER Jeff Puckett

COPY install.bash /install.bash

RUN /install.bash

COPY setup entrypoint apache2-foreground /usr/local/bin/
COPY vhost.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

EXPOSE 80 443

ENTRYPOINT ["entrypoint"]

CMD ["apache2-foreground"]
