# A Sticky Menu for Shopware 6

A shopware 6 extension for a sticky menu from _992 pixels_. The navigation menu item _Home_ can also be hidden or can be replaced by a house icon.

## Possible Configurations
 - activate the sticky menu
 - set the position in pixels from which the sticky menu should be active
 - select the viewports in which the sticky menu should be active
 - set the duration of the animation in milliseconds (*1)
 - set the z-index value (*1)
 - set the background color of the sticky menu (*1)
 - set the shadow of the sticky menu (*1)
 - show the navigation menu item _Home_
 - replace the navigation menu item _Home_ with a house icon

## Some changes in the settings within the configuration are not immediately visible in the frontend of the shop
After changing settings specifically for the appearance of the sticky menu (*1), the theme must be recompiled, for example by reassigning the theme to the sales channel in the administration:
1. Click on the current sales channel under "Sales Channels"
2. Click on the tab "Theme"
3. Click on the button "Change theme"
4. Select the current theme
5. Click on the button "Save"
6. Clock on the button "Change theme"

## How to install the extension
### via console (recommended)
1. Download the latest _SschreierStickyMenu-master.zip_.
2. Unzip the zip file and rename the folder to _SschreierStickyMenu_. 
3. Move the folder to the project folder _custom/plugins/_ .
4. Connect to the console via ssh:

```
bin/console plugin:refresh
bin/console plugin:install --activate SschreierStickyMenu
```

### via composer
1. Add the repository URL to the composer.json of the project
```
"repositories": [
    ...,
    {
        "type": "vcs",
        "url": "https://github.com/sschreier/SschreierStickyMenu"
    }
],
```

2. Connect to the console via ssh and install the plugin source code via the command
```
composer require sschreier/sschreierstickymenu
bin/console plugin:refresh
bin/console plugin:install --activate SschreierStickyMenu
```

### via zip upload
1. Download the latest _SschreierStickyMenu-master.zip_.
2. Unzip the zip file and rename the folder to _SschreierStickyMenu_.
3. Zip the folder to _SschreierStickyMenu.zip_.
4. Upload the zip in the Shopware Administration.
5. Install & Activate the extension.

#### Plugin update (zip)
1. Download the latest _SschreierStickyMenu-master.zip_.
2. Unzip the zip file and rename the folder to _SschreierStickyMenu_.
3. Zip the folder to _SschreierStickyMenu.zip_.
4. Upload the zip in the Shopware Administration.
5. Update the extension.

## Images

### default navigation menu

![default navigation menu](https://www.sebastianschreier.de/plugins/sschreierStickymenu/sschreierStickymenu-Image1.jpg)

### default navigation menu with hover about navigation menu item Music

![default navigation menu with hover about navigation menu item Music](https://www.sebastianschreier.de/plugins/sschreierStickymenu/sschreierStickymenu-Image2.jpg)

### sticky navigation menu

![sticky navigation menu](https://www.sebastianschreier.de/plugins/sschreierStickymenu/sschreierStickymenu-Image3.jpg)

### sticky navigation menu with hover about navigation menu item Music

![sticky navigation menu with hover about navigation menu item Music](https://www.sebastianschreier.de/plugins/sschreierStickymenu/sschreierStickymenu-Image4.jpg)

### sticky navigation menu where the navigation menu item _Home_ was replaced by a house icon

![sticky navigation menu where the navigation menu item _Home_ was replaced by a house icon](https://www.sebastianschreier.de/plugins/sschreierStickymenu/sschreierStickymenu-Image5.jpg)

### sticky navigation menu where the navigation menu item _Home_ has been hidden

![sticky navigation menu where the navigation menu item _Home_ has been hidden](https://www.sebastianschreier.de/plugins/sschreierStickymenu/sschreierStickymenu-Image6.jpg)

### extension configuration part 1

![plugin configuration](https://www.sebastianschreier.de/plugins/sschreierStickymenu/sschreierStickymenu-Image7.jpg)

### extension configuration part 2

![plugin configuration](https://www.sebastianschreier.de/plugins/sschreierStickymenu/sschreierStickymenu-Image8.jpg)
