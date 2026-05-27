FROM mcr.microsoft.com/devcontainers/php:1-8.2-bookworm

# Add Yarn GPG key to avoid NO_PUBKEY errors from the yarnpkg repo
RUN set -eux; \
    curl -fsSL https://dl.yarnpkg.com/debian/pubkey.gpg | gpg --batch --yes --dearmor -o /usr/share/keyrings/yarn-archive-keyring.gpg

# Install MariaDB client
RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
    && apt-get install -y --no-install-recommends mariadb-client \
    && apt-get clean -y && rm -rf /var/lib/apt/lists/*

# Install php-mysql driver
RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN apt-get -y update \
&& apt-get install -y libicu-dev \
&& docker-php-ext-configure intl \
&& docker-php-ext-install intl

# [Optional] Uncomment this section to install additional OS packages.
# RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
#     && apt-get -y install --no-install-recommends <your-package-list-here>

# [Optional] Uncomment this line to install global node packages.
# RUN su vscode -c "source /usr/local/share/nvm/nvm.sh && npm install -g <your-package-here>" 2>&1

