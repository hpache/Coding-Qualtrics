# Coding-Qualtrics
The purpose of this experiment is to be able to ask questions on a potentially global scale about how programmers learn to code and their coding behaviors. This will be done using a Qualtrics survey containing programming questions, where the programmer will be able to work in an online IDE to answer these questions, and where statistics will be collected including number of edits, compiles, which errors occurred, and how long the task took. The ability to continuously collect large amounts of data on coding behaviors is important for future research and can give insight into questions on how programmers learn to code that have not been able to be asked before.

## Contents

* [Installation](#Installation)
* [Built With](#built-with)
* [Developers](#developers)

<br>
<hr>
<br>

## Installation

### Non-M1 Macs

To access this code on your local machine, follow these steps:

1. Clone the repository onto your local machine using terminal:
```
git clone https://github.com/hpache/Coding-Qualtrics.git
```
<br>

2. Navigate into the cloned directory and install the npm dependencies contained in the package.json file by running the following in terminal:
```
npm install
```
<br>

3. Enjoy our content!!

### M1 Macs

Node doesn't like M1 macs since they're on the Arm64 architecture so we need a huge workaround for that.

First, install nvm on your computer
[nvm install](https://tecadmin.net/install-nvm-macos-with-homebrew/)

Follow all the instructions for the method you use to install nvm. If you don't upgrade the path variables, it will never work and you will be angry!

1. Get into zsh with the command:

```
arch -x86_64 zsh
```

2. Then install node using nvm

```
nvm install 17
```

3. Set the install as the default node version

```
nvm alias default 17 ````
```

4. Install the npm dependencies, you can also use yarn if you're into that...

```
npm install
```

5. Enjoy our work!


## Built with

* [Node](https://nodejs.org/en/docs/)
* [Express](https://expressjs.com/)
* [Javascript](https://developer.mozilla.org/en-US/docs/Web/JavaScript)

<br>
<hr>
<br>


## Developers

### Katie Andre

* [Github Account](https://google.com)

***

### Henry Pacheco

* [Github Account](https://github.com/hpache)

***

### Eduardo Sosa

* [Github Account](https://google.com)

***

### Aidan Sweeny

* [Github Account](https://github.com/AidanSweeny)
