#!/bin/bash

# Update package lists
apt-get update

# Install required libraries
apt-get install -y libssl1.0.0 libssl-dev

# Run composer install
composer install --no-dev --optimize-autoloader
