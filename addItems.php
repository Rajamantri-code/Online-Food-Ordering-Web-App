<?php
include 'connect.php';

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $image = $_POST['image'];

    $query = ("insert into cart values ('', '$name', '$price', '$image')");
    
  mysqli_query($conn, $query);

}

  
  
  echo
  "Sign Up Successfully";



?>
<html>
    <head>
        <title>Add Items</title>
    </head>

<body>
    <form action="" method="post">
    <input type="text" name="name" required>
    <input type="text" name="price" required>
    <input type="text" name="image" required>
    <input type="submit" name="submit" required>
    </form>
</body>

</html>