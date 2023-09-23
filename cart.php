<?php
session_start();
include 'connect.php';

if(isset($_POST['add_to_cart'])){
    if(isset($_SESSION['cart1'])){
        $session_array_id = array_column($_SESSION['cart1'], "id");

        if(!in_array($_GET['id'], $session_array_id)){
            $session_array = array(
                'id' => $_GET['id'],
                "name" => $_POST['name'],
                "price" => $_POST['price'],
                "quantity" => $_POST['quantity']

            );
            $_SESSION['cart1'][]= $session_array;
        }

    }
    else{
        $session_array = array(
        'id' => $_GET['id'],
        "name" => $_POST['name'],
        "price" => $_POST['price'],
        "quantity" => $_POST['quantity']
    );

        $_SESSION['cart1'][]= $session_array;
    }
}



if(isset($_POST['placeOrder'])){

	if(!empty($_SESSION['cart1'])){

		foreach($_SESSION['cart1'] as $key => $value){
			$acc_name1 = $_POST['accname'];
			$acc_email1 = $_POST['accemail'];
		  $id1 = $value['id'];
		  $name1 = $value['name'];
		  $price1 = $value['price'];
		  $qty1 = $value['quantity'];
		  $total1 = number_format($value['price'] * $value['quantity'],2);
	  
		  $query2 = ("insert into itemorder values ('', '$acc_name1','$acc_email1','$id1', '$name1', '$price1', '$qty1', '$total1',NOW())");
		  
		mysqli_query($conn, $query2);
	  
		
	  
	  }

	
	$email = $_POST['email'];
	$address = $_POST['address'];
	$holderName = $_POST['holderName'];
	$cardNumber = $_POST['cardNumber'];
	$exMonth = $_POST['exMonth'];
	$exYear = $_POST['exYear'];
	$cvv = $_POST['cvv'];


	$query1 = ("insert into placeorder values ('',  '$holderName','$address', '$email','$cardNumber', '$exMonth', '$exYear', '$cvv',NOW())");
    
  mysqli_query($conn, $query1);

  echo"
  <script>alert('Place Order Successfully');
  window.location.href ='cart.php?success';</script>";

  
  }
	else{
		echo "<script>alert('Please Add Items to Cart');
		window.location.href ='cart.php?error';</script";
	
  }
}

if(isset($_POST['logout'])){
	
	echo"
	<script>alert('Logout Successfully');
	window.location.href ='login.php?success';</script>";
}



?>

<html>
    <head>

        <title>
            Cart
        </title>
		<script src="log.js"></script>
        <link rel="stylesheet" href="cart.css">
		<style>
            body{background-image: url(login.png);}
		.box{
		max-width:95%;
		dispaly: flex;
		flex-direction: column;
		aligh-items:center;
		justify-content:space-between;
		
		border-radius:5px;
		padding:15px;
		
		}
		
		.add_to_cart{
		width:100%;
		position:relative;
		border:none;
		border-radius:5px;
		background-color:goldenrod;
		padding: 7px 25px;
		cursor:pointer;
		color:white;
		}
		
		.add_to_cart:hover{
		background-color:#333;
		}
		
		.body{
		display:flex;
		}
		
		.item{
		border:1px solid goldenrod;
		height:350px;
		width:175px;
		text-align:center;
		display:flex;
		padding:15px;
		
		}

		
		
		h2{
		color:red;
		text-align:center;
		}
            h5{
                color: #fff;
                font-size: 1rem;
            }
		
		img{
		height:175px;
		width:175px;
		object-fit:cover;
		object-position:center;
		}
		
		.itemlist{
		
		display:flex;
		flex-direction: row;
		justify-content: space-around;
		flex-flow: wrap;
		
		}
		.itemlist.active{
			
    		transform: translate(0%,72%) scale(1);
    		transition: top 0ms ease-in-out 200ms,
                            opacity 200ms ease-in-out 0ms,
                            transform  20ms ease-in-out 0ms;
		}
		
		.items{
		padding:20px;
		}
		
		.sidecart{
		width:5%;
		flex-direction: flex-end;
		aligh-items:center;
		justify-content:space-between;
		
		border-radius:5px;
		padding:15px;
        visibility: hidden;
		}
        .sidecart.active{
		width:45%;
		flex-direction: flex-end;
		aligh-items:center;
		justify-content:space-between;
		border:1px solid goldenrod;
		border-radius:5px;
		padding:15px;
        visibility: visible;
		}
		
		.table-content{
		border-collapse:collapse;
		margin:25px 0;
		font-size:0.4cm;
		min-width:400px;
		border-radius: 5px 5px 0 0;
		position: absolute;
		}
		
		.table-content tr th{
		background-color: #009879;
		color: #ffffff;
		text-align: left;
		font-weight: bold;
		}
		
		.table-content th,
		.table-content td{
		padding: 12px 15px;
		}
		
		.table-content tbody tr{
		border-bottom:1px solid #dddddd;
		}
		
		.table-content tbody tr {
		background-color: #009879;
		}
		
		
		.table-content tbody tr:last-of-type{
		border-bottom: #009879;
		}
		
		button{
			height:20px;
		background-color: red;
		color: #fff;
		text-decoration: none;
		border-radius: 5px;
		border:none;
		}
		
		.clear{
		width:70px;
		background-color: goldenrod;
		color: #fff;
		text-decoration: none;
		border:none;
		border-radius: 5px;
		}
		
		.buy{
		margin-top:5px;
		width:150px;
		height:40px;
		background-color: green;
		color: #fff;
		text-decoration: none;
		border-radius: 5px;
		border:none;
		}
            
        .buy1{
		margin-top:5px;
		width:150px;
		height:40px;
		background-color: red;
		color: #fff;
		text-decoration: none;
		border-radius: 5px;
		border:none;
		}


.container{
	position:absolute;
	
	opacity:0;
    transform: translate(-50%,-50%) scale(1);
    transition: top 0ms ease-in-out 200ms,
                            opacity 200ms ease-in-out 0ms,
                            transform  20ms ease-in-out 0ms;
}

.container.active{
    color: #fff;
    background-color: #000;
	visibility:visible;
	opacity:1;
    transform: translate(0%,0%) scale(1);
    transition: top 0ms ease-in-out 200ms,
                            opacity 200ms ease-in-out 0ms,
                            transform  20ms ease-in-out 0ms;
}

input{
    width: 100%;
    border:none;
    outline: none;
    padding: 10px;
}

            .row{
                width: 600px;
                padding: 30px;
                padding-left: 200px;
            }
           



.submit-btn{
  width: 50%;
  padding:12px;
  font-size: 17px;
  background: #27ae60;
  color:#fff;
  margin-top: 5px;
  cursor: pointer;
}

.submit-btn:hover{
  background: #2ecc71;
}
.foot{
	display:flex;
}
.closebtn{
	width: 50%;
  padding:12px;
  font-size: 17px;
  background-color: red;
  color:#fff;
  margin-top: 5px;
  cursor: pointer;
}
.closebtn:hover{
	background-color: orange;
}
		
.loginfo {
	display: flex;
	justify-content:flex-end;
}	

.info{
	padding: 10px 20px;
	color:#fff;
	background-color: orange;

}

.info1{
	visibility:hidden;
	margin-top:-2%;
}

.logout{
	margin-top:20px;
		width:150px;
		height:40px;
		background-color: red;
		color: #fff;
		text-decoration: none;
		border:none;
		}
.cart{
	margin-top:20px;
		width:150px;
		height:40px;
		background-color: yellow;
		color: red;
		text-decoration: none;
		border:none;
    font-size: 0.9rem;
		}
		
	
		
		
		</style>

        
    </head>
    <body bgcolor="#000">
	

	<div class="container">
					<form action="" method="post" autocomplete="off">
							<input type="text" class="info1" id="logname" name="accname" value="<?php echo $_SESSION['username']; ?>">
							<input type="email" class="info1" id="logemail" name="accemail" value="<?php echo $_SESSION['email']; ?>" >
							

						<div class="row">

							<div class="col">

								<h1 class="title">billing address</h1>

								
								<div class="inputBox">
									<span>Name on Card Holder :</span>
									<input type="text" placeholder="Disanayaka Dasun" name="holderName" required value="<?php echo $_SESSION['username']; ?>">
								</div><br>
                                  <div class="inputBox">
									<span>Email :</span>
									<input type="text" placeholder="No:1 abc road,Sri lanka" name="email"required value="<?php echo $_SESSION['email']; ?>">
								</div><br>
                                <div class="inputBox">
									<span>Address :</span>
									<input type="text" placeholder="No:1 abc road,Sri lanka" name="address"required>
								</div><br>
                               
								<div class="inputBox">
									<span>Credit card number :</span>
									<input type="number" placeholder="1111-2222-3333-4444" name="cardNumber" required>
								</div><br>
								<div class="inputBox">
									<span>Exp month :</span>
									<input type="text" placeholder="january" name="exMonth" required>
								</div><br>

								<div class="flex">
									<div class="inputBox">
										<span>Exp year :</span>
										<input type="number" placeholder="2022" name="exYear" required>
									</div><br>
									<div class="inputBox">
										<span>CVV :</span>
										<input type="number" placeholder="1234" name="cvv" required>
									</div><br>
								</div>

							</div>

						

						<div class="foot">
						<input type="submit" value="Place Order" class="submit-btn" name="placeOrder">
						<input type="submit" value="Close" class="closebtn">
                            
                            
						</div>
                     </div>
						

					</form>
					
				
                        
                </div>
		
        <div class="body">

			<div class="box">
				<div class="nav">
					
					<div>
						<div class="loginfo"> 
							
							<h3 class="info" id="logname" ><?php echo "welcome ".$_SESSION['username']; ?></h3>
							<h3 class="info" id="logemail"  ><?php echo $_SESSION['email']; ?></h3>
							<a href="login.php"><input type="submit"  name="logout" class="logout" value="Logout"></a>
                            <input type="submit" id="cart1" name="cart" class="cart" value="Cart" >
                            
							
							
						</div>
					
                        <h2>Shopping Items</h2>
					</div>
						
						
						
						
				</div>
						
				<div class="itemlist">

                        
                    <?php
                            

                        $query = "select * from cart";
                        $result = mysqli_query($conn, $query);

                        while ($row =mysqli_fetch_array($result)){?>
						<div class="items">
                            <div class="item">
                                <form action="cart.php?id=<?=$row['id'] ?>" method="post">
                                    <img src="<?= $row['image'] ?>" style='height: 150px;' alt="">
                                    <h5 class="text3" ><?= $row['name'] ?></h5>
                                            <h5 class="text3" >Rs:<?= number_format($row['price'],2); ?></h5>
                                            <input type="hidden" name="name" value="<?= $row['name'] ?>">
                                            <input type="hidden" name="price" value="<?= $row['price'] ?>">
                                            <input type="number" name="quantity" value="1" class="qty"><br><br>
                                            <input type="submit" name="add_to_cart" class="add_to_cart" value="Add to cart">
                                </form>

                            </div>
						</div>
                        <?php }

                    ?>
                </div>
			</div>

                    
                    
            <div class="sidecart">
                <h2>Selected Items</h2>
                <div class="classtable">
                    <?php
                        $output = "";
                        $output .= "
                        <table class='table-content'>
                        <tr>
                        <th>ID</th>
                        <th>ITEM NAME</th>
                        <th>PRICE</th>
                        <th>QUANTITY</th>
                        <th>TOTAL PRICE</th>
                        <th>ACTION</th>
                        </tr>
                        ";

                        if(!empty($_SESSION['cart1'])){
                            $total = 0;
                            foreach($_SESSION['cart1'] as $key => $value){
                            $output .= "
                            <tr>
                            <td>".$value['id']."</td>
                            <td>".$value['name']."</td>
                            <td>".$value['price']."</td>
                            <td>".$value['quantity']."</td>
                            <td>Rs: ".number_format($value['price'] * $value['quantity'],2)."</td>
                            <td><a href='cart.php?action=remove&id=".$value['id']."'>
                            <button>Remove</button>
                            </a>
                            </td>
                            ";
                                    
                                   
                            $total = $total + $value['quantity'] * $value['price'];
                        	}

                            $output .= "
                                <tr>
                                <td colspan='3'></td>
                                <td><b>Total Price</b></td>
                                <td>Rs: ".number_format($total,2)."</td>
                                <td>
                                <a href='cart.php?action=clearall'>
                                <button class='clear'>Clear all</button></a>
								
                                </td>
                                ";
                        }

                        echo $output;
						
                	?>
					
					
					<button id="open" class="buy">Place Order</button>
                    <button id="cartclose" class="buy1">Close</button>
					

					
					

				
					
				</div>

				
            </div>

			
			
		</div>

		

        

        <?php
        if (isset($_GET['action'])){
            if ($_GET['action'] == "clearall"){
                unset($_SESSION['cart1']);
            }
			
			
			

            if ($_GET['action'] == "remove"){
                foreach ($_SESSION['cart1'] as $key => $value){
                    if ($value['id'] == $_GET['id']){
                        unset($_SESSION['cart1'][$key]);
                    }
                }
            }
		}
        ?>

<script>

           

document.querySelector("#open").addEventListener("click", function(){
	document.querySelector(".container").classList.add("active");
})



document.querySelector(".container .closebtn").addEventListener("click", function(){
	document.querySelector(".container").classList.remove("active");
})

document.querySelector("#open").addEventListener("click", function(){
	document.querySelector(".itemlist").classList.add("active");
})



document.querySelector(".container .closebtn").addEventListener("click", function(){
	document.querySelector(".itemlist").classList.remove("active");
})
    
document.querySelector("#cart1").addEventListener("click", function(){
	document.querySelector(".sidecart").classList.add("active");
})
    
document.querySelector("#cartclose").addEventListener("click", function(){
	document.querySelector(".sidecart").classList.remove("active");
})








</script>
		
        
            
    </body>
</html>

