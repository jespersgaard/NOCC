#!/bin/bash
#
# Shell script that removes a message from all message files
# it checks for the message, followed by a space
#
# Example:  remove_message.sh 'htmlMessageToRemove' 
#
# From phpmyadmin http://phpmyadmin.sf.net/ (lem9)
#
for file in *.php
do
	echo "lines before:" `wc -l $file`
        grep -v "$1 " ${file} > ${file}.new
        rm $file
        mv ${file}.new $file
	echo " lines after:" `wc -l $file`
done
echo " "
