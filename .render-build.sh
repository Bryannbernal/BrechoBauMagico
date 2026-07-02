#!/usr/bin/env bash

php artisan storage:link || true

php artisan migrate --force || true