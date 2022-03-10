FROM node:17

# Create app directory
WORKDIR /usr/src/app

# Install app dependencies
# A wildcard is used to ensure both package.json and package-lock.json are copied
# where available
COPY package*.json ./

RUN npm install

# Bundle app source code
COPY . .
# Expose port 3000
EXPOSE 3000

CMD ["node", "server.js"]