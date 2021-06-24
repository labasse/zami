#!/bin/bash

tmpfile=$(mktemp)
archive=$1/$(basename $tmpfile).tar.gz
tar -czf $tmpfile .

ssh deploy "rm -rf $1/*"
scp $tmpfile deploy:$archive
rm $tmpfile
ssh deploy "tar xvzf $archive -C $1"
ssh deploy "rm $archive"
