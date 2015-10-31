<?php
  // call removeday() here

   //remove PHPSESSID from browser
if ( isset( $_COOKIE[session_name()] ) )
setcookie( session_name(), "", time()-3600, "/" );
//clear session from globals
$_SESSION = array();
//clear session from disk
//session_destroy();
    //header( "Location: $url" );
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header('Location: ../?page=Home');
?>