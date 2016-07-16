<?php
	// config and whatnot
   /*  $config = dirname(__FILE__) . '/hybridauth/config.php'; */
   
	include 'config.php';
    require_once( "/hybridauth/Hybrid/Auth.php" );

	// initialise hybridauth
	$hybridauth = new Hybrid_Auth( $config );
	
	// selected provider name 
	$provider = @ trim( strip_tags( $_GET["provider"] ) );

	// check if the user is currently connected to the selected provider
	if( !  $hybridauth->isConnectedWith( $provider ) ){ 
		// redirect him back to login page
		header( "Location: login.php?error=Your are not connected to $provider or your session has expired" );
	}
?>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="public/css.css" type="text/css">
</head>
<body>  
<table width="90%" border="0" cellpadding="2" cellspacing="2">
  <tr>
    <td valign="top">
		<?php
			include "includes/menu.php"; 
		?>  
		<fieldset>
			<legend>My Contact list</legend>
			<table width="100%">
			<?php
				try{
					// call back the requested provider adapter instance 
					$adapter = $hybridauth->getAdapter( $provider );

					// grab the user contacts list
					$user_contacts = $adapter->getUserContacts();
					
					foreach( $user_contacts as $item ){
						?>
							<tr> 
								<td align="left" valign="top" width="55" >  
									<?php
										if( $item->photoURL ){
									?>
											<a href="<?php echo $item->profileURL; ?>"><img src="<?php echo $item->photoURL; ?>" border="0" width="48" height="48"></a>
									<?php
										}
										else{
									?> 
											<img src="public/avatar.png" width="48" height="48" >
									<?php
										} 
									?>  
								</td>
								<td align="left">  
									<a href="<?php echo $item->profileURL; ?>"><b><?php echo $item->displayName; ?></b></a> <small>(ID:<?php echo $item->identifier; ?>)</small>
									<br /><?php echo $item->description; ?>
									<br /><small><?php echo $item->profileURL; ?></small>
									<br /><hr />
								</td>
							</tr> 
						<?php
					} 

					if( ! count( $user_contacts ) ){
						echo "No contact found!";
					}
				}
				catch( Exception $e ){
					// if code 8 => Provider does not support this feature
					if( $e->getCode() == 8 ){
						echo "Provider does not support this feature. Currently only <b>Facebook, MySpace, Twitter and LinkedIn</b> do support this!
						<br />Please refer to the user guide to know more about each adapters capabilities. <a href='http://hybridauth.sourceforge.net/userguide.html'>http://hybridauth.sourceforge.net/userguide.html</a>";
					}
					else{
						echo "Well, got an error: " . $e->getMessage();
					} 
				} 
			?>
			</table>
      </fieldset> 
	</td>
    <td valign="top" width="250" align="left"> 
		<?php
			include "includes/sidebar.php";
		?>
	</td>
  </tr>
</table>
</body>
</html>