# Escolhe a imagem base do PHP com Apache
FROM php:7.4-apache

# Atualiza o apt-get e instala dependências do sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libicu-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mysqli mbstring zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Habilita o módulo Apache mod_rewrite (necessário para URLs amigáveis)
RUN a2enmod rewrite

# Define o diretório de trabalho no container
WORKDIR /var/www/html

# Copia os arquivos do seu projeto para o container
COPY . /var/www/html

# Exponha a porta 5000 (usada pela Railway)
EXPOSE 5000

# Comando para rodar o Apache
CMD ["apache2-foreground"]
