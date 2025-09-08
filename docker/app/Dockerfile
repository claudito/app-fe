FROM php:8.2-apache-bullseye

# Evitar preguntas interactivas
ENV DEBIAN_FRONTEND=noninteractive

# Instalar dependencias del sistema y extensiones PHP necesarias
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    unzip \
    curl \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libwebp-dev \
    libfreetype6-dev \
    libxml2-dev \
    libicu-dev \
    zlib1g-dev \
    libonig-dev \
    libxrender1 \
    libfontconfig1 \
    fonts-dejavu-core \
    fonts-dejavu-extra \
  && docker-php-ext-configure gd --with-jpeg --with-webp --with-freetype \
  && docker-php-ext-install -j$(nproc) \
      gd \
      zip \
      xml \
      pdo_mysql \
      mbstring \
      bcmath \
      intl \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/*

# Instalar Composer desde imagen oficial
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Activar mod_rewrite para Laravel
RUN a2enmod rewrite \
 && echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Configuración de Apache (Laravel en public/)
COPY docker/app/vhost.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

# Copiar composer.json primero para aprovechar cache
COPY composer.json composer.lock ./

RUN composer install --no-dev --no-scripts --prefer-dist --no-interaction --no-ansi || true

# Copiar el resto del proyecto
COPY . .

# Optimizar autoload
RUN composer dump-autoload --optimize

# Permisos para storage y cache
RUN chown -R www-data:www-data /var/www/html \
 && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache || true

EXPOSE 80

CMD ["apache2-foreground"]
