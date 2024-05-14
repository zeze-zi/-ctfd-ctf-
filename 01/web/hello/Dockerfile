FROM ctftraining/base_image_nginx_mysql_php_56
RUN rm -rf /var/www/html/index.html
COPY src /var/www/html
RUN mv /var/www/html/flag.sh / \
    && chmod +x /flag.sh