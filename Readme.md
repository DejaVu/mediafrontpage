#MediaFrontPage ![MFP](https://github.com/DejaVu/mediafrontpage/raw/master/media/Programs/mfp.png)

MediaFrontPage is a HTPC Web Program Organiser.
Your HTPC utilises a number of different programs to do certain tasks. What MediaFrontPage does is creates a user specific web page that will be your nerve centre for everything you will need.

![preview thumb](https://github.com/DejaVu/mediafrontpage/raw/master/media/Readme.md/full_screenshot.jpg)

This version of MediaFrontPage is a modification of the [Original](http://www.github.com/mediafrontpage/mediafrontpage) that has got rid of the Frameset and added Dynamic Navigation Menu.

Click [here](http://www.youtube.com/v/SsaebIwAn64) to view it in action

MediaFrontPage can make use of, but is not limited to, the following projects:

![SickBeard](https://github.com/DejaVu/mediafrontpage/raw/master/media/Programs/SickBeard.png)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;![CouchPotato](https://github.com/DejaVu/mediafrontpage/raw/master/media/Programs/CouchPotato.png)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;![SabNZBd](https://github.com/DejaVu/mediafrontpage/raw/master/media/Programs/SabNZBd.png)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;![SubSonic](https://github.com/DejaVu/mediafrontpage/raw/master/media/Programs/SubSonic.png)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;![HeadPhones](https://github.com/DejaVu/mediafrontpage/raw/master/media/Programs/HeadPhones.png)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;![Transmission](https://github.com/DejaVu/mediafrontpage/raw/master/media/Programs/Transmission.png)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;![uTorrent](https://github.com/DejaVu/mediafrontpage/raw/master/media/Programs/uTorrent.png)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;![XBMC](https://github.com/DejaVu/mediafrontpage/raw/master/media/Programs/XBMC.png)

**[SickBeard](http://sickbeard.com/)&nbsp;&nbsp;[CouchPotato](http://couchpotatoapp.com/)&nbsp;&nbsp;&nbsp;[SabNZBd+](http://sabnzbd.org)&nbsp;&nbsp;&nbsp;&nbsp;[SubSonic](http://www.subsonic.org/pages/index.jsp)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[HeadPhones](https://github.com/rembo10/headphones)&nbsp;&nbsp;[Transmission](http://www.transmissionbt.com/)&nbsp;&nbsp;&nbsp;[uTorrent](http://www.utorrent.com/)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[XBMC](http://xbmc.org/)**

## Available Skins

###MFP Original&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MFP Light Theme
![MFP Original](https://github.com/DejaVu/mediafrontpage/raw/master/media/Readme.md/sample_original.jpg) ![MFP Light Theme](https://github.com/DejaVu/mediafrontpage/raw/master/media/Readme.md/sample_lighttheme.jpg)

###Hernandito [XBMC Member](http://forum.xbmc.org/member.php?u=86731)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DPickles [XBMC Member](http://forum.xbmc.org/member.php?u=80823)
![Hernandito](https://github.com/DejaVu/mediafrontpage/raw/master/media/Readme.md/sample_hernandito.jpg)
![DPickles](https://github.com/DejaVu/mediafrontpage/raw/master/media/Readme.md/sample_dpickles.jpg)

###Black Modern Glass&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Space 6

![Black Modern Glass](https://github.com/DejaVu/mediafrontpage/raw/master/media/Readme.md/sample_black_modern_glass.jpg)
![Space 6](https://github.com/DejaVu/mediafrontpage/raw/master/media/Readme.md/sample_space6.jpg)
######Both 'Black Modern Glass' & 'Space 6' were contributed by DejaVu [XBMC Member](http://forum.xbmc.org/member.php?u=68433)

## Dependencies

MediaFrontPage requires an Apache/PHP Webserver to be running on the machine or network and must have PHP Curl configured correctly.


## Bugs

This project is always being updated by like minded individuals and bugs will exist. If you find a bug or have an issue, please create a ticket @ [MediaFrontPage Tickets](http://mediafrontpage.lighthouseapp.com/tickets), and include as much information as possible. If you have any comments or suggestions, please visit us at MediaFrontPages Original home @ [XBMC's Forum](http://forum.xbmc.org/showthread.php?t=83304).

## Install
###Ubuntu Commandline/XBMCLive

1.
SSH or Telnet into your computer - or simply press CTRL F2 and login with you user details.

2.
Clone the Git to the required directory, XBMCLive and Ubuntu = /var/www.

`sudo git clone git://github.com/DejaVu/mediafrontpage.git /var/www`

3.
Ensure file permissions allow your web server to write to the directory.

`sudo chmod 777 /var/www/ -R`

4.
Install PHP-Curl

`sudo apt-get install php5-curl`

5.
Browse to MFP and you shall be greeted with a server check to confirm all dependencies are met. If so, you will be allowed to continue to MFP's settings page to configure it according to your setup.

6.
Done

## List of available Widgets 5th May 2011

* XBMC Control
* XBMC Library
* Coming Episodes
* Hard Drive Status
* Now Playing
* RSS Feed
* SabNZBd Status
* NZB Search
* TrakT Recommended
* Transmission
* uTorrent
* JDownloader (WIP)

There is an Example widget inside the Widget folder that gives an idea on how to create your own.