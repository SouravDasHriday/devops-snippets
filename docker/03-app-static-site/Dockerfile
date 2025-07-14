# Start from a lightweight official NGINX image
FROM nginx:1.23-alpine

# DevOps Best Practice: Labeling your image with maintainer info and version
LABEL maintainer="your-email@example.com"
LABEL version="1.0"

# 1. Copy the custom NGINX configuration file.
# This will overwrite the default config located at /etc/nginx/conf.d/default.conf
COPY nginx.conf /etc/nginx/conf.d/default.conf

# 2. Copy the static website content.
# The content of the local './src' directory will be placed
# in the container's default web root.
COPY ./src/ /usr/share/nginx/html/
