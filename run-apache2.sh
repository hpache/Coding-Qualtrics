#!/usr/bin/env bash

sed -i "s/Listen 80/Listen ${PORT:-80}/g" /etc/apache2/ports.conf
apache2ctl -D FOREGROUND
apache2ctl restart