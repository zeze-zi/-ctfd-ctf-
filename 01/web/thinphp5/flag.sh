sed -i "s/flag{test}/$(echo $FLAG | sed 's/\//\\\//g')/" /flag.txt
export FLAG=""
