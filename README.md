# FTMS
To setup the API:<br/>
	&emsp;1. place the project into the web-access folder(e.g. for debian and ubuntu is /var/www/...)<br/>
	&emsp;2. install "Composer" in the project folder.(https://getcomposer.org/download/)<br/>
	&emsp;3. create a file called "composer.json" in the project folder and add following:<br/>
	&emsp;&emsp;{ <br/>
	&emsp;&emsp;&emsp;"require": { <br/>
	&emsp;&emsp;&emsp;&emsp;"slim/slim": "^3.0", <br/>
	&emsp;&emsp;&emsp;&emsp;"palanik/corsslim": "dev-slim3" <br/>
	&emsp;&emsp;&emsp;} <br/>
	&emsp;&emsp;} <br/>
	&emsp;4. direct to the project folder, run "sudo php composer.phar install" to install framework<br/>
	&emsp;5. It's optional but it's better to add SSL Certificate and set a VirtualHost for the project dir in the server<br/>
	&emsp;6. Port forwarding HTTP port to public network<br/>
