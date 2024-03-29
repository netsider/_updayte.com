<?php
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------
$config =array(
		"base_url" => "http://updayte.com/test/index.php",
		"providers" => array ( 

			"Google" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "570249173888-d1ooioqvtn2aavcv6du69irlqmgu9sja.apps.googleusercontent.com", "secret" => "FL-Qr3ZrvIezEqvAENXN3xfw" ), 
			),

			"Facebook" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "XXXXXXXXX", "secret" => "XXXXXXXX" ), 
			),

			"Twitter" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "XXXXXXXX", "secret" => "XXXXXXX" ) 
			),
		),
		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => true,
		"debug_file" => "log.txt",
	);
