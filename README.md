Third Party Connect
====================

Module for ZF2 which allows the developer to implement Facebook. Twitter, Google and Linked in connect using their own database storage for the user.
layer.

Installation
============

1. Install the module via composer by running:

   ```sh
   php composer.phar require middleout/third-party-connect:dev-master
   ```
   or download it directly from github and place it in your application's `vendor/` directory.
2. Add the `ThirdPartyConnect` module to the module section of your `config/application.config.php`
3. Copy `./vendor/middleout/third-party-connect/config/third-party-connect.local.php.dist` to
   `./config/autoload/third-party-connect.local.php`. Change any settings in it
   according to your needs.


Usage
===========

1. Define your public/private keys in the third-party-connect.local.php
2. Define the permissions for facebook in the same file (you can find the definition in the class FacebookService)
3. Define the route for the return URL.
4. Make an "a" tag with the href like this:
	```<a href="$this->url('third-party-connect', array('controller' => 'authorize', 'action' => 'facebook'), true);">Connect with facebook</a>```

	the action can be one of the following:
		facebook, twitter, linkedin, google

    If you want to show a popup window, set in the config file the "use_popup" to true.

5. In your controller/action retrieve from the service manager one of the following keys (depending on what you did)
	```$serviceManager->get('facebookConnect')```
	```$serviceManager->get('twitterConnect')```
	```$serviceManager->get('googleConnect')```
	```$serviceManager->get('linkedinConnect')```

	and then run on this object the method getUserData()

	this method may return false if there was an error (like decline permissions). It is up to you to treat the error cases due to the fact that you get the information in the URL.
	However there is a method called "hasErrors()" which already knows what to look for in the $_GET for errors.

	all 4 services return the same array of user data (normalized) so you don't have to worry about it.
