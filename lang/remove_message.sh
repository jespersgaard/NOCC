#!/bin/bash
#
# Shell script that removes a message from all message files
# it checks for the message, followed by a space
#
# Example:  remove_message.sh 'htmlMessageToRemove' 
#
# From phpmyadmin http://phpmyadmin.sf.net/ (lem9)
# Modified for NOCC by Olivier Cahagne
#

if test $# -eq 0
then
  echo "Missing parameter (message to remove)"
  echo "Usage: remove_message.sh '<message to remove>'"
  echo "Example: remove_message.sh 'html_inbox'"
  exit 0
fi

for file in *.php
do
	echo "lines before:" `wc -l $file`
        grep -v "$1 " ${file} > ${file}.new
        rm $file
        mv ${file}.new $file
	echo "lines after:" `wc -l $file`
done
echo " "
