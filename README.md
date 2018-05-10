# Task 2: oopTask
This is second Task at Godel technologies. This program shows films now playing in Russian cinemas.

## Getting started
There are two ways to run it. First one:

1)Run web server  
2)Clone repository (master branch);  
3)place cloned files into /www/   
4)run in browser http://localhost/

Second one:

1)Run web server

2)Clone repository (master branch);

3)place cloned files into /www/ 

4)run it in CLI with command "php index.php". You need to be in /www/  to run it properly;

## What to do in program
if you run program in browser:

You will see form with two modes. "Query" mode sends request to "TMDB" database and provides relevant data. Program creates cached files and uploads poster images. "List" mode just opens list of films from cached files which are stored locally. Firstly, "List" mode will show all new films, but if you will activate checkbox, "List" mode will show films with a week release date. 

if you run program in CLI:

You should run script with command "php index.php". It will send request to "TMDB" database and create cached files and upload images.

Note!

Before running in "List" mode for the first time you will need to run "Query" mode in browser or with command "php index.php" in CLI.# lab2
