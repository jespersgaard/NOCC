#!/bin/sh
#
# buildpackage.sh      Build a NOCC package for release
#
# Author:            Olivier Cahagne
#

if test $# -eq 0
then
  echo "Missing first parameter (name of package)"
  echo "Usage: buildpackage.sh <name of package>"
  echo "Example: buildpackage.sh nocc-0.9.3"
  exit 0
fi

distname=`echo "$1"`
myname=`basename \`pwd\`` 
cd .. && cp -rp $myname $distname
cd $distname
 find . -name CVS -type d | xargs rm -rf
 rm -f buildpackage.sh
cd ..
tar cf $distname.tar $distname
rm -f $distname.tar.*
gzip -9 $distname.tar
md5sum $distname.tar.gz
sync; sleep 2
md5sum $distname.tar.gz
gzip -t $distname.tar.gz
echo creating zip archive
zip -rq9 $distname.zip $distname
md5sum $distname.zip
sync; sleep 2
md5sum $distname.zip
zip -T $distname.zip
rm -rf $distname
