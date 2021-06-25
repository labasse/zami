#!/bin/bash

tmpfile=$(mktemp)
archive=./$(basename $tmpfile).tar.gz
tar -czf $tmpfile.tar.gz .
cp ./setup/install.sh $tmpfile.sh

scp $tmpfile.* deploy:.
rm $tmpfile
ssh deploy "bash ./$tmpfile.sh $archive $1"
