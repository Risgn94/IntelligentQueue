<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="jumbotron">
    <h1>Hello <?php echo $_SESSION['FN']; ?></h1>
    <p>Username: <?php echo $_SESSION['user'];?></p>
    <p>Name: <?php echo $_SESSION['FN'] ." ".$_SESSION['LN']; ?></p>
    <p>Her skal der være en masse personlige oplysninger. Gad vide om det kommer til at virke..</p>
</div>

<script>
    window.onload = (function() {document.getElementById('profileButton').style.backgroundColor = "rgba(255, 255, 255, 0.3)";} );
</script>