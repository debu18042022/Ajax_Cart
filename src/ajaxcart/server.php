<?php
session_start();
if(!isset($_SESSION['cart'])){
    $_SESSION['cart']=array();
}

include "config.php";

if(isset($_POST['info'])){
    $index=$_POST['info'];
    $price=$store[$index]['price'];
    echo $price;
    if($_SESSION['cart'][$index]==''){
        $_SESSION['cart'][$index]=$store[$index];
    }
    else{
        $_SESSION['cart'][$index]['quantity']+=1;
        $quantity = $_SESSION['cart'][$index]['quantity'];
        $_SESSION['cart'][$index]['price']=$price*intval($quantity);
    }
}
if(isset($_POST['index'])){
    $index=$_POST['index'];
     unset($_SESSION['cart'][$index]);
}

    echo "<table><tr><th>Id</th><th>Name</th><th>Price</th><th>Quantity</th><th>Action</th></tr>";
    foreach($_SESSION['cart'] as $key => $value){
        echo "<tr><td>".$value['id']."</td><td>".$value['name']."</td><td>".$value['price']."</td><td>".$value['quantity']."</td><td><a id=".$key." class='deleteitem' href='#'>Delete</a></td></tr>";
    } 
    echo "</table>";


?>
<!-- <script>
    $('.deleteitem').click(function(){
     var x=$(this).id();
     console.log(x);
     $(this).parents('tr').remove();
    });
</script>  -->

 



