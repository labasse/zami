#!/bin/bash

rm -rf $2/*
tar xzf $1 -C $2
rm $1
cd $2
composer install
