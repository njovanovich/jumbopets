Jumbo Pets Test

ABOUT
-----
This part solution is hosted at http://jumbopets.mooo.com/.  You can test it in 
the cloud by the handy interface, or you can choose to try a local install.

INSTALLATION
------------
git clone git@github.com:njovanovich/jumbopets.git

Change database in .emv file to your database details.

composer install

in symfony directory, php bin/console doctrine:schema:update --force
this will 

make sure the /symfony/upload directory is writable to the web server.  
That area saves the upload files.

setup the apache, mount the api directory as an alias eg

<VirtualHost *:80>
        ServerName jumbopets.mooo.com

        ServerAdmin webmaster@localhost
        DocumentRoot /var/www/jumbopets/htmljs

        Alias "/api/" "/var/www/jumbopets/symfony/public/"

        <Directory /var/www/jumbopets/htmljs>
            Options Indexes FollowSymLinks MultiViews
            AllowOverride All
        </Directory>

        <Directory /var/www/jumbopets/symfony/public>
            Options Indexes FollowSymLinks MultiViews
            AllowOverride All
        </Directory>

Enjoy!