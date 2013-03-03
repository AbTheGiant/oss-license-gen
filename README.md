Open Source Software License Generator (webapp)
===============================================

An easy way to generate your app LICENSE file

How to Install
--------------

Install Composer:

    http://getcomposer.org/

Get the app:  

    composer create-project keep/oss-gen

Run the server (php 5.4):

    php -S localhost:8080 -t /path/to/public_dir


How to use
----------

From a terminal execute:  

    curl http://localhost:8080/generate/{license_name} -d licenser="Jessé Alves Galdino" -d year="2013" > LICENSE

or

From your browser:  

    http://localhost:8080/generate/{license_name}/{licenser}/{year}

Available Licenses
------------------

* MIT (http://opensource.org/licenses/MIT)
* more to come, soon

LICENSE
-------

MIT licensed code