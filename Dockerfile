FROM php:8.3-apache

ENV TZ=America/El_Salvador
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
#Actualizar apache desde la lista de sources
COPY ./sources.list /etc/apt/sources.list

RUN apt-get update
#&& apt-get install apache2 -y
# Instalar dependencias necesarias para la imagen base (OS)
RUN apt-get update && \
    apt-get install -y libzip-dev  libpng-dev zlib1g-dev libonig-dev  libxml2-dev \
    libicu-dev libpq-dev libmemcached-dev supervisor \
    git libldap2-dev \
    cron \
    #Configurar dependencia y extension de ldap (Para conexion con el AD)
    && ln -s /usr/lib/x86_64-linux-gnu/libldap.so /usr/lib/libldap.so \
    && ln -s /usr/lib/x86_64-linux-gnu/liblber.so /usr/lib/liblber.so \
    # Instalar extension de conector para mysql y ldap
    && docker-php-ext-install pdo_mysql mbstring ldap mbstring exif pcntl bcmath gd zip


# Actualizar el índice de paquetes e instalar nano, ping y telnet
RUN apt-get update && \
    apt-get install -y nano iputils-ping telnet && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Instalar Node.js (v20 como ejemplo) y npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

#Definir apache configs + document root para el servicio de apache
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

#Definir reglas de escritura y sobre escritura asi como tambien los extra headers como por ej. Access-Control-Allow-Origin en el .htaccess de apache
RUN a2enmod rewrite headers

#Agregar composer para manejador de dependencias de laravel y configuracion inicial de php
COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY docker/php.ini /usr/local/etc/php/

#Definir Variable de entorno para permitir a composer ejecutar como super usuario en el contenedor
ENV COMPOSER_ALLOW_SUPERUSER 1

#Definir ruta de trabajo (acceso) del contenedor
WORKDIR /var/www/html
#Copiar proyecto al contenedor
COPY . /var/www/html/

# Instalar dependencias y crear carpeta build
RUN npm install


#Asignar permisos a la ruta del proyecto e instalar dependencias con composer
RUN chown -R www-data:www-data /var/www/html \
    && composer install \
    && composer update \
    && npm run build
RUN echo culr.cainfo="/etc/cacert.pem" >> /usr/local/etc/php/conf.d/docker-php-curl-ca-cert.ini
RUN chmod -R 755 /storage
RUN unlink storage
RUN php artisan storage:link

# COPY verificador-worker.conf /etc/supervisor/conf.d/
# Copiar el script de entrada
# COPY entrypoint.sh   /usr/local/bin/entrypoint.sh
# RUN chmod 777 /usr/local/bin/entrypoint.sh


#COPY cronfile /etc/cron.d/cronfile
#RUN chmod 0644 /etc/cron.d/cronfile
#RUN crontab /etc/cron.d/cronfile
#RUN cron -f &
#RUN chmod 755 /var/www/html/storage/ra_certs/cer.pem
#RUN chmod 755 /var/www/html/storage/ra_certs/key.pem

# CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/supervisord.conf", "-n"]
