#OctoBg background changer

### What does OctoBg do?

This script downloads a random Octocat (from https://octodex.github.com/) and sets it as your background image.

### Requirements:

* PHP 5.3+
* composer ( https://getcomposer.org/ )
* Mac OS X (for now)

### Installation

    git clone https://github.com/jsheth7/OctoBg.git

    composer install

    #If you don't have composer installed, install it as follows:
    curl -sS https://getcomposer.org/installer | php
    
    #Install needed libraries as follows:
    php composer.phar install

    cp ./Resources/config_sample.ini ./Resources/config.ini

    #Edit ./Resources/config.ini to contain the path where you want your images saved
   
### Usage:

Set your background to be centered (for best results): 

    System Preferences -> Desktop & Screensaver -> Center
 
Run it like this:

    php run.php
  
Tips: 

* Set it up as a cron job, to have it change your background every day!
* After you've accumulated a significant cache of pictures, you can configure Mac OS X to pull pictures directly from that folder (instead of running the cron job)
