#!/bin/sh	#必需的东西没什么好讲的
sed -i "s/flag{test}/$FLAG/" /var/www/html/getScore.php
export FLAG=""
