FROM wordpress:5.8-php7.4-apache

# نصب ionCube Loader
RUN apt-get update && \
    apt-get install -y wget unzip && \
    wget https://downloads.ioncube.com/loader_downloads/ioncube_loaders_lin_x86-64.tar.gz && \
    tar xvfz ioncube_loaders_lin_x86-64.tar.gz && \
    rm ioncube_loaders_lin_x86-64.tar.gz && \
    cp ioncube/ioncube_loader_lin_7.4.so /usr/local/lib/php/extensions/no-debug-non-zts-20190902/ && \
    echo "zend_extension = /usr/local/lib/php/extensions/no-debug-non-zts-20190902/ioncube_loader_lin_7.4.so" > /usr/local/etc/php/conf.d/00-ioncube.ini && \
    rm -rf ioncube