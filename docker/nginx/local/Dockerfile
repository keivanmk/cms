FROM nginx:alpine

ARG HOST=_

#RUN apk update && apk add openssl \
#    && openssl req \
#    -x509 \
#    -nodes \
#    -days 365 \
#    -subj "/C=CA/ST=QC/O=Company, Inc./CN=$HOST" \
#    -addext "subjectAltName=DNS:$HOST" \
#    -newkey rsa:2048 \
#    -keyout /etc/ssl/private/nginx-selfsigned.key \
#    -out /etc/ssl/certs/nginx-selfsigned.crt \
#    && apk del openssl

# Copy nginx configuration file into container
COPY nginx.conf /etc/nginx/nginx.conf

# Set host
RUN sed -i "s/:servername/$HOST/g" /etc/nginx/nginx.conf

# Expose http and https ports
EXPOSE 80

# produce verbose output when using higher log levels
CMD ["nginx-debug", "-g", "daemon off;"]