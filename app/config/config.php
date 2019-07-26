<?php
// App Root
define('APPROOT', dirname(dirname(__FILE__)));
define('URL', 'localhost');
define('HTTPS', false);

// URL Root
if(HTTPS) {
	define('URLROOT', 'https://' . URL);
} else {
	define('URLROOT', 'http://' . URL);
}
// Site Name
define('SITENAME', 'Webyflex');
