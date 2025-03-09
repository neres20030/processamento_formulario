# Usar a imagem oficial do PHP com Apache
FROM php:8.0-apache

# Copiar os arquivos do projeto para o diretório do servidor Apache
COPY . /var/www/html/

# Definir o diretório de trabalho
WORKDIR /var/www/html/

# Instalar dependências necessárias para o PHP, caso existam
RUN docker-php-ext-install mysqli

# Expor a porta 80 para o servidor Apache
EXPOSE 80
