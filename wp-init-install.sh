#!/usr/bin/env sh

# Install WordPress.
docker-compose run --rm wp-cli wp core install \
  --title="Project" \
  --admin_user="wordpress" \
  --admin_password="wordpress" \
  --admin_email="admin@example.com" \
  --url="http://docker.local" \
  --skip-email

# Update permalink structure.
docker-compose run --rm wp-cli wp option update permalink_structure "/%category%/%year%/%monthnum%/%day%/%postname%/" --skip-themes --skip-plugins
