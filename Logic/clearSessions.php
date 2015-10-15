<?php
  // call removeday() here
    session_unset();
    //session_start();
    session_destroy();
    echo '<script>alert("Php kører");</script>';
    $url = "../?page=Home";
    echo 'Vi kører PHP filen!';
    echo $_SESSION['user'];
    //header( "Location: $url" );
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
