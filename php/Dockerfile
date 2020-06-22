FROM php:7.4-apache
RUN apt-get update
RUN  apt-get install -y libmcrypt-dev && \
  # php7.4ではmbstringの代わりにlibonig-devを入れる必要がある
  apt-get install -y libonig-dev && \
  # PHPのExtensionをインストール．
  docker-php-ext-install pdo_mysql mysqli
  
WORKDIR /var/www/html

EXPOSE 80