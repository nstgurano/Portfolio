FROM php:7.2-apache
#RUN apt-get update 
#&& \
  # PHPのExtensionをインストール．
RUN docker-php-ext-install pdo_mysql mysqli mbstring

RUN curl -sL https://deb.nodesource.com/setup_10.x | bash -
RUN apt-get install -y nodejs

WORKDIR /var/www/html

EXPOSE 80