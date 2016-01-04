# Yandex Metrika Grav Plugin

This is [Grav CMS](http://getgrav.org) plugin that helps you implement [Yandex Metrika](https://metrika.yandex.com/) tracking code into your website.

# Installation

Installing the Yandex Metrika plugin can be done in one of two ways.

## GPM Installation (Preferred)

The simplest way to install this plugin is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm) through your system's Terminal (also called the command line).  From the root of your Grav install type:

    bin/gpm install metrika

This will install the Yandex Metrika plugin into your `/user/plugins` directory within Grav. Its files can be found under `/your/site/grav/user/plugins/metrika`.

## Manual Installation

To install this plugin, just [download](https://github.com/helios-ag/grav-metrika/archive/master.zip) the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `yametrika`.

You should now have all the plugin files under

    /your/site/grav/user/plugins/metrika

# Config Defaults

```yaml
  enabled: true
  id: ''
  hash: true # address line hash tracking
  webvisor: true # enable webvisor
```

If you need to change any value, then the best process is to copy the [metrika.yaml](metrika.yaml) file into your `users/config/plugins/` folder (create it if it doesn't exist), and then modify there. This will override the default settings.

# Usage

1. Login to your [Yandex metrika account](https://metrika.yandex.com/).
2. Copy appropriate counter number under counter's name.
3. Paste number (or re-type) into plugin settings.
4. Configure webvisor and hash settings accordingly to your needs.
