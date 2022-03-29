FROM node:17

# Create app directory
WORKDIR /usr/src/app

# Install app dependencies
# A wildcard is used to ensure both package.json and package-lock.json are copied
# where available
COPY ./Codetrics/package*.json ./

RUN npm install

# Bundle app source code
COPY ./Codetrics/ .
# Expose port 3000
EXPOSE 3000


# Change to Codetrics directory
WORKDIR /usr/src/app/Codetrics

CMD ["node", "server.js"]