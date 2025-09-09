FROM shinsenter/codeigniter4:latest

WORKDIR /var/www/html
COPY . .

RUN chmod -R 777 .
RUN composer install

EXPOSE 80