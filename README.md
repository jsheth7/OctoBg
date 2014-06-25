#OctoBg background changer

### What does OctoBg do?

This script downloads a random Octocat (from https://octodex.github.com/) and sets it as your background image.

### Requirements:

* PHP 5.3+
* composer ( https://getcomposer.org/ )
* Mac OS X (for now)

### Installation

    git clone https://github.com/jsheth7/OctoBg.git
    
    #If you don't have composer installed, install it as follows:
    curl -sS https://getcomposer.org/installer | php
    
    #Install needed libraries as follows:
    php composer.phar install
   
### Usage:

Set your background to be centered (for best results): 

    System Preferences -> Desktop & Screensaver -> Center
 
Run it like this:

    php run.php
  
Tip: set it up as a cronjob, to have it change your background every day!
