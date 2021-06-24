#!/bin/bash

tmpfile=$(mktemp)
tar -czf $tmpfile .
scp $tmpfile deploy:~/$1/$tmpfile.tar.gz
rm $tmpfile
ssh deploy "tar xvzf $tmpfile.tar.gz"
ssh deploy "rm $tmpfile.tar.gz"
