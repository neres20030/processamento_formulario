# Usar uma imagem oficial do PHP com servidor embutido
FROM php:8.3-cli

# Definir o diretório de trabalho dentro do contêiner
WORKDIR /app

# Copiar todos os arquivos do projeto para dentro do contêiner
COPY . .

# Expor a porta 8000 para acessar o servidor
EXPOSE 8000

# Comando para rodar o servidor PHP
CMD ["php", "-S", "0.0.0.0:8000", "-t", "."]
