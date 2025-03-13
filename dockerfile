# Escolhe a imagem PHP com suporte ao Apache
FROM php:7.4-apache

# Instala as dependências necessárias, como MongoDB
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev libicu-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mysqli mbstring zip

# Instala a extensão MongoDB
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Habilita o módulo Apache mod_rewrite (necessário para URLs amigáveis)
RUN a2enmod rewrite

# Define o diretório de trabalho no container
WORKDIR /var/www/html

# Copia os arquivos do seu projeto para o container
COPY . /var/www/html

# Exponha a porta 80 para o Apache
EXPOSE 80
