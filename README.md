# Malevolent Plutonium

Malevolent Plutonium is a custom server and tools project themed around a zombies experience for Call of Duty: Black Ops II. It provides a game server backend and a companion website with leaderboards, news, guides, and utility features.



https://github.com/user-attachments/assets/c7c1a924-c827-48be-bbc6-8b9220b9e836


## Prerequisites

    - PHP 8.2+
    - MYSQL 8.x+
    - Composer Version 2

## Website Setup Tutorial

    1. git clone https://github.com/DDDDec/MalevolentPlutonium.git
    2. cd malevolentwebsite
    3. copy .env.example .env
    4. composer install
    5. php artisan migrate
    6. php artisan key:generate
    7. php artisan serve

## Scripts Setup Tutorial

    1. create the same directory design into your /scripts/zm folder
    2. compile the scripts and drop them into their designated folders
    3. remove the -compiled from all compiled file names


```
Copy and paste this inside of all your plutonium configuration files

///////////////////////////////////
// MALEVOLENT DATABASE SETTINGS  //
///////////////////////////////////
set mysql_host "127.0.0.1"       //
set mysql_user "root"            //
set mysql_pass ""                //
set mysql_port 3306              //
set mysql_db "malevolentwebsite" // 
///////////////////////////////////
```

## Plugin Setup Tutorial

    1. copy MalevolentPlugin.dll from the 'MalavolentPlugin' folder
    2. paste MalevolentPlugin.dll inside the plugins folder for your servers 

## License

Malevolent is provided under the license specified in the repository’s `LICENSE` file.


