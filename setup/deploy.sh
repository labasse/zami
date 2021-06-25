#!/bin/bash

tmpfile=$(mktemp)
tmpname=$(basename $tmpfile)
archive=./$tmpname.tar.gz
tar -czf $tmpfile.tar.gz .
cp ./setup/install.sh $tmpfile.sh

scp $tmpfile.* deploy:.
rm $tmpfile
ssh deploy "bash ./$tmpname.sh $archive $1"
