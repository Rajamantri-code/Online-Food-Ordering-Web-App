<?php
session_start();
if(isset($_SESSION['log'])){

if(isset($_SESSION['id']) && ($_SESSION['username'])){



?>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <h1 >Hi  <?php $_SESSION['username']; ?></h1>
    </body>
</html>
<?php
}
}
?>
