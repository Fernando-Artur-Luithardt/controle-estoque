# Escolhe uma imagem com PHP + extensões + Composer
FROM php:8.3-fpm

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libzip-dev \
    libpq-dev \
    libpng-dev \
    libonig-dev \
    nodejs \
    npm \
    && docker-php-ext-install pdo pdo_mysql zip bcmath

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define diretório de trabalho
WORKDIR /var/www

# Copia os arquivos da aplicação
COPY . .

# Instala dependências PHP
RUN composer install

# Instala dependências do Node
RUN npm install

# Compila assets
RUN npm run build

# Expondo porta do Laravel
EXPOSE 8000

# Comando padrão do container
CMD php artisan serve --host=0.0.0.0 --port=8000
