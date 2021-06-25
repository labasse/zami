#!/bin/bash

tmpfile=$(mktemp)
archive=./$(basename $tmpfile).tar.gz
tar -czf $tmpfile .

scp $tmpfile deploy:$archive
rm $tmpfile
ssh deploy "bash ./setup/install.sh $archive $1"
