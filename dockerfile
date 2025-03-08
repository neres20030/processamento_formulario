# Use uma imagem base do PHP com Apache (o que ajuda com PHP)
FROM php:8.3-apache

# Habilite a reescrita de URLs no Apache
RUN a2enmod rewrite

# Defina o diretório de trabalho dentro do contêiner
WORKDIR /var/www/html

# Copiar todos os arquivos do projeto para o diretório do servidor web no contêiner
COPY . .

# Defina a porta do contêiner
EXPOSE 80

# Comando para iniciar o Apache no modo foreground
CMD ["apache2-foreground"]
