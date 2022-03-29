# Codetrics Demo

## Introduction

This demo is meant to simulate the micro-services archeticture that we designed for Codetrics. The proposed archeticure will have the following layout

1. Front-end hosted in node webserver on Heroku
2. Back-end compile environment hosted on Heroku or Google Cloud Services
3. Back-end database to hold user information hosted on Heroku 

Extensions to Codetrics will present themselves as additions to the front-end microservice, an existing microservice, or a brand new microservice.


## Requirements

### Docker

First, you will need to have docker installed on your computer. The installation process is pretty straightforward for macs and linux, all you have to do is install the program and you are good to go. For windows, things get complicated, you will have to make sure virtualization is enabled on windows and on your BIOS before you can run Docker. 

[Windows Docker Install Guide](https://docs.docker.com/desktop/windows/install/)

[Windows Hyper-V Setup](https://docs.microsoft.com/en-us/virtualization/hyper-v-on-windows/reference/hyper-v-requirements)

[MacOS Docker Install Guide](https://docs.docker.com/desktop/mac/install/)

[Linux Docker Install Guide](https://docs.docker.com/engine/install/)

### Docker Compose

You also need Docker compose to run this demo. The installations for MacOS and Windows have docker-compose pre-installed, but linux installations would need to setup Docker compose. 

[Docker-Compose Install Guide for Linux](https://docs.docker.com/compose/install/)


## Running the Demo

Once you have all the requirements, running the demo is really straightforward. 

1. Make sure you are in the demo directory.
2. Open the Docker app leave it running
3. Open a terminal on your computer and cd to the demo directory
4. Run the following command

``` docker-compose up ```

5. Wait for the docker images to be built and for the containers to run
6. On your favorite web browser, go to localhost:8000 and enjoy the demo
7. When you are done, Press ``` ctrl+c``` and then run ``` docker-compose down``` on your terminal.


Note, running ```docker-compose up``` for the first time will take a while to complete. This is because the images are being built for the first time. After the first time running, the command will complete almost immediately. 

If you would like to learn more about Docker and its capabilities, you can visit [this](https://docs.docker.com/get-started/) page. 