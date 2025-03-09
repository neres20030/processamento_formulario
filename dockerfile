# Usando a imagem oficial PHP do Docker
FROM php:8.0-apache

# Copiar os arquivos do projeto para o diretório do servidor web
COPY . /var/www/html/

# Definir o diretório de trabalho
WORKDIR /var/www/html/

# Expor a porta 80 para o servidor Apache
EXPOSE 80
