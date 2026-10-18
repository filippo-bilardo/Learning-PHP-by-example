FROM mcr.microsoft.com/devcontainers/php:1-8.3-bookworm

# Yarn is unused here; its inherited APT repository has an unavailable signing key.
RUN rm -f /etc/apt/sources.list.d/yarn.list \
    && apt-get update \
    && apt-get install -y --no-install-recommends default-mysql-client \
    && docker-php-ext-install mysqli pdo_mysql \
    && rm -rf /var/lib/apt/lists/*
