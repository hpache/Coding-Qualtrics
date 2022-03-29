# Building from nginx image
FROM nginx

# Copy custom configure file to the default.conf file 
COPY nginx.conf /etc/nginx/conf.d/default.conf
# Copy source code to appropriate location
COPY src /usr/share/nginx/src

# Replace any $PORT variable with the assigned port value given by heroku
CMD sed -i -e 's/$PORT/'"$PORT"'/g' /etc/nginx/conf.d/default.conf && nginx -g 'daemon off;'