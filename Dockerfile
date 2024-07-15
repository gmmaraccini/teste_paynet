FROM bitnami/laravel:latest

# Instalar dependências do Laravel e do Sanctum
WORKDIR /app
RUN composer require laravel/sanctum

# Definir permissões
RUN chown -R bitnami:bitnami /app
