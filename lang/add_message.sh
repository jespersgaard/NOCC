#!/bin/bash
#
# Shell script that adds a message to all message files
#
# Example:  add_message.sh '$htmlNewMessage' 'new message contents'
#
# From phpmyadmin http://phpmyadmin.sf.net/ (lem9)
# Modified for NOCC by Olivier Cahagne
#
# TODO: Rewrote to sh only to be compatible with most shells.
#

if test $# -eq 0
then
  echo "Missing parameters (name of var and var value)"
  echo "Usage: add_message.sh '$<var name>' 'var value'"
  echo "Example: add_message.sh '\$htmlNewMessage' 'new message contents'"
  exit 0
fi

if test $# -eq 1
then
  echo "Missing parameter (name of var or var value)"
  echo "Usage: add_message.sh '$<var name>' 'var value'"
  echo "Example: add_message.sh '\$htmlNewMessage' 'new message contents'"
  exit 0
fi

for file in *.php
do
        echo $file " "
        grep -v '?>' ${file} > ${file}.new
        echo "$1 = '"$2"';  //to translate" >> ${file}.new
        echo '?>' >> ${file}.new
        rm $file
        mv ${file}.new $file
done
echo " "
echo "This script also added the new message to en.php"
