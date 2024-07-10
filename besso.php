#!/bin/bash
cd $(cd $(dirname $0); pwd)
install(){
sudo apt-get update && sudo apt-get upgrade && sudo apt install npm && curl -sL https://deb.nodesource.com/setup_16.x | sudo bash - ; sudo apt-get update ; sudo apt install nodejs -y ; npm install -g pm2 && npm install -g npm@8.19.2 && pm2 completion install && sudo apt-get update ; sudo add-apt-repository -y ppa:ondrej/php ; sudo apt-get update ; sudo apt-get install php7.4 php7.4-cli php7.4-common -y ; sudo apt-get install php7.4-curl php7.4-gd php7.4-json php7.4-mbstring php7.4-intl php7.4-mysql php7.4-xml php7.4-zip -y ; sudo apt-get install unzip -y && sudo apt-get install python-properties-common ; sudo apt-get update ; sudo add-apt-repository -y ppa:ondrej/php ; sudo apt-get update ; sudo apt-get install php7.4 php7.4-cli php7.4-common -y ; sudo apt-get install php7.4-curl php7.4-gd php7.4-json php7.4-mbstring php7.4-intl php7.4-mysql php7.4-xml php7.4-zip -y ; sudo apt-get install unzip -y && sudo apt install unzip && sudo apt install nginx && sudo apt install composer && sudo apt-get update && sudo apt-get upgrade && sudo apt-get upgrade && sudo apt -y install lsb-release apt-transport-https ca-certificates wget && sudo wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg && echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/php.list && sudo apt update && sudo apt install php8.1 && sudo apt install php8.1-fpm && sudo apt install php8.1- && sudo apt install php8.1-common php8.1-mysql php8.1-xml php8.1-xmlrpc php8.1-curl php8.1-gd php8.1-imagick php8.1-cli php8.1-dev php8.1-imap php8.1-mbstring php8.1-opcache php8.1-soap php8.1-zip php8.1-redis php8.1-intl -y && sudo service php8.1-fpm restart && sudo php-fpm8.1 -t && sudo service php8.1-fpm restart && sudo a2dismod php7.4 && sudo a2enmod php8.1 && sudo service apache2 restart && sudo service nginx restart && sudo apt-get update && sudo apt-get upgrade && sudo apt install screen && sudo add-apt-repository -y ppa:ondrej/php && sudo apt-get update && sudo apt-get install php8.2 php8.2-cli php8.2-common -y && sudo apt-get install php8.2-curl php8.2-gd php8.2-json php8.2-mbstring php8.2-intl php8.2-mysql php8.2-xml php8.2-zip -y;sudo apt update;sudo apt install --no-install-recommends php8.2;sudo apt-get install -y php8.2-cli php8.2-common php8.2-mysql php8.2-zip php8.2-gd php8.2-mbstring php8.2-curl php8.2-xml php8.2-bcmath && sudo apt-get install php8.2-gmp && sudo rm -rf node-modules && sudo apt-get update && sudo apt install curl build-essential && curl -sL https://deb.nodesource.com/setup_16.x && sudo -E bash && sudo apt install -y nodejs
}
if [ "$1" = "bot" ]; then
php run.php
fi
if [ "$1" = "php" ]; then
install
cd ..
cd besso
php run.php
fi
