#!/bin/bash
#
# Shell script that adds a message to all message files
#
# Example:  add_message.sh '$htmlNewMessage' 'new message contents'
#
# From phpmyadmin http://phpmyadmin.sf.net/ (lem9)
#
for file in *.php
do
        echo $file " "
        grep -v '?>' ${file} > ${file}.new
        echo "$1=\""  $2  '";  //to translate' >> ${file}.new
        echo "?>" >> ${file}.new
        rm $file
        mv ${file}.new $file
done
echo " "
echo "This script also added the new message to en.php"
