=== DFD Reddcoin Tips ===

Contributor: taoteh1221
Donate link: http://www.dragonfrugal.com/open.source/software/dfdreddcointips/

Tags: reddcoin, tips, tipping, cryptocurrency
Requires at least: 3.8
Tested up to: 4.0.1
Stable tag: 1.0.4
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Display Reddcoin tipping and payment widgets on your website, and send and receive Reddcoins with Reddcoin API (ReddAPI.com).

== Description ==

DFD Reddcoin Tips is a Wordpress plugin to display Reddcoin tipping and payment widgets on your website, and send and receive Reddcoins within a built-in password-protected admin console that fully integrates and connects you to the Reddcoin API (ReddAPI.com).

For security of your Reddcoin balances, the API keys are stored with 2 way / 256 bit encryption in the wordpress database for a high level of protection from theft, and are decrypted on-the-fly only when using the command console with your Wordpress password.

== Installation ==

You can install fairly easily doing a search in your plugin admin area, or upload the archive manually...make sure you activate after uploading. After installation, you'll need to create a Reddcoin API account at ReddAPI.com if you wish to send / receive Reddcoins, and also go to "Appearance -> Widgets" in the Wordpress admin area to add a payment badge to your web pages.

== Screenshots ==

1. Widget example #1...
2. Widget example #2...
3. Moused-over widget example...
4. Widget settings options...
5. Main settings options...
6. ReddAPI console...

== Changelog ==

= 9.0.0 =
* 2012-7-27
* Initial release

= 1.0.1 =
* 2014-11-20
* Bug fix related to unused post type in framework template

= 1.0.2 =
* 2014-12-02
* Ported entire codebase out of initial plugin framework for a more lightweight / reliable codebase, while maintaining same exact functionality.
* Added tipping address meta tag, for compatibility with upcoming Reddcoin web wallet (to be released by the Reddcoin dev team very soon).
* Added narrower widget (Widget #2 of 2 total so far).

= 1.0.3 =
* 2014-12-03
* Added 2 way / 256 bit encryption to API keys storage in the database, for high ReddAPI account security. Your Wordpress password is now required to decrypt the API keys on the fly when running commands to connect with the ReddAPI system.

= 1.0.4 =
* 2014-12-10
* Made the narrower tipping badge widget look more like the larger widget, just narrower.
* Made the widgets CSS code reset template-based styling on certain html elements within the widgets, and used inline styling in some cases, to minimize compatibility issues with themes using the widget (please report any unforseen CSS compatibility issues if you notice them, so they can be fixed).
* Added Bitcoin exchange rate display option and USD to Reddcoin value calculator option to all tipping address widgets.