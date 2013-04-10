#!/bin/sh

# Based on: https://gist.github.com/tijmenb/956993
 
mkdir -p app/tmp/cache/models
mkdir -p app/tmp/cache/persistent
mkdir -p app/tmp/cache/views
mkdir -p app/tmp/logs
mkdir -p app/tmp/sessions
mkdir -p app/tmp/tests
 
chmod -R 777 app/tmp
