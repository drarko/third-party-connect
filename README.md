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