#!/bin/bash

source /Users/edpittol/.bash_profile

# Verify if the WordPress is installed, if not download and create the
# wp-config.php
if [ ! -f public/wp-load.php ]; then
    echo 'Downloading WordPress'
    wp core download
fi

# Create the wp-config.php file, if not exists
if [ ! -f public/wp-config.php ]; then
    echo 'Configuring WordPress'
    wp core config
fi

# Install the WordPress if it isn't
if ! wp core is-installed 2> /dev/null; then
    wp db reset --yes 2> /dev/null || wp db create
    wp core install
fi

# Install extra plugins
plugins=extra/plugins/*.zip
if [ $(ls -la ${plugins} 2> /dev/null | wc -l) -gt 0 ]; then # verify if has packages inner the directory
    for plugin in $plugins
    do
        if ! wp plugin is-installed $(basename $plugin .zip); then
            wp plugin install $plugin
        fi
    done
fi

# Install extra themes
themes=extra/themes/*.zip
if [ $(ls -la ${themes} 2> /dev/null | wc -l) -gt 0 ]; then # verify if has packages inner the directory
    for theme in $themes
    do
        if ! wp theme is-installed $(basename $theme .zip); then
            wp theme install $theme
        fi
    done
fi

# Install WPackagist plugins and themes
composer install

# Activate all plugins
wp plugin activate --all

# Remove menu items before import
wp post delete $(wp post list --post_type='nav_menu_item' --format=ids) 2> /dev/null

# Import data
datafiles=extra/data/*.xml
if [ $(ls -la ${datafiles} 2> /dev/null | wc -l) -gt 0 ]; then # verify if has packages inner the directory
    if ! wp plugin is-installed wordpress-importer; then
        wp plugin install wordpress-importer
    fi

    wp plugin activate wordpress-importer

    for data in $datafiles
    do
        wp import $data --authors=create
    done
fi

# Update language
wp core language update

# Build the theme
grunt
