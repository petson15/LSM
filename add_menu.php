<?php

    session_start();
    //unset($_SESSION['cart']);
    include_once('./dbconfig/config.php');

    $express_amount = 0;
    $item = mysqli_escape_string($conn, $_POST['item']); 
    $price = mysqli_escape_string($conn, $_POST['price']);
    $quantity =  mysqli_escape_string($conn, $_POST['quantity']);
    $telephone = mysqli_escape_string($conn, $_POST['telephone']);
    $customerName = mysqli_escape_string($conn, $_POST['customerName']);
    $sex = mysqli_escape_string($conn, $_POST['sex']);
    $paymentMethod = mysqli_escape_string($conn, $_POST['paymentMethod']);
    $id = mysqli_escape_string($conn, $_POST['id']);
    $express_amount = mysqli_escape_string($conn, $_POST['express']);
    $total = 0;
    $initial_payment = mysqli_escape_string($conn,$_POST['initial_payment']);
 


 

if (isset($_POST['item']) && isset($_POST['price']) && isset($_POST['quantity'])) {
    $item = mysqli_escape_string($conn, $_POST['item']); 
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $telephone = mysqli_escape_string($conn, $_POST['telephone']);
    $customerName = mysqli_escape_string($conn, $_POST['customerName']); 
    $sex = $_POST['sex'];
    $paymentMethod = $_POST['paymentMethod'];
    $express_amount = $_POST['express'];
    $initial_payment = $_POST['initial_payment'];
    $_SESSION['express'] = $_POST['express'];

    $id = $_POST['id'];
    $total = 0;

    $data = [
        'item' => $item,
        'price' => $price,
        'quantity' => $quantity,
        'telephone' => $telephone,
        'customerName' => $customerName,
        'sex' => $sex,
        'paymentMethod' => $paymentMethod,
        'id' => $id,
        'express' => $express_amount,
        'initialPay' => $initial_payment,


    ];

    // Store the data in the session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $_SESSION['cart'][] = $data;

    // Output the cart data
   // var_dump($_SESSION['cart']);
}


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./fonts/all.css">
     <script type="text/javascript" src="./js/jquery.js"></script>

    <title></title>
    <style type="text/css"> 
        table {
            margin: 20px auto;
            width: 40%;
        }
    </style>
</head>
<script type="text/javascript">
    
    // Function to unset the session using AJAX


    // Function to unset a single item from the session using AJAX
    
  $(document).ready(function() {
    $(".btn-place").click(function() {
        let sex = $("select[name='sex']").val();
        let telephone = $("input[name='tel']").val();
        let paymentMethod = $("select[name='pay-method']").val();
        let customerName = $("input[name='cus-name']").val();
        let express = $("select[name='express']").val();


        $.ajax({
            url: "place-order.php",
            method: "POST",
            data: {
                telephone: telephone,
                customerName: customerName,
                sex: sex,
                paymentMethod: paymentMethod,
                express: express
            },
            success: function(data) {
                $(".place").html(data);
            },
            error: function(xhr, status, error) {
                console.log("AJAX request error:", status, error);
            }
        });
    });
});



       function clearSession() {
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();
    
  
    // Set up the request
    xhr.open('GET', 'clear-session.php', true);
  
    // Define the callback function 
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Success - do something if needed
                 location.reload();
                
            } else {
                // Error - handle appropriately
                console.log('Error clearing session');
            }
        } 
    };

  
  
    // Send the request
    xhr.send();


}




</script>
<body>

   

    <div>
     <?php

    $total = 0;
    $express =0;
    $output = "";
    $output .= "<form method='POST' action='pos-order.php'>
        <table class='my-4' style='width: 65%; margin: 100px auto;'>
            <tr>
                <td>Item</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Total</td>
            </tr>";

    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            $output .= "
            <tr>
                <td>".$value['item']."</td>
                <td>".$value['price']."</td>
                <td>".$value['quantity']."</td>
                <td>".number_format($value['price'] * $value['quantity'])."</td>
            </tr>";
            $total += $value['quantity'] * $value['price'];
        }
        $express_amount = $total * ($express_amount/100);
        $total += $express_amount;
        $_SESSION['total'] = $total;

        $output .= "
            <tr>
                <td colspan='2'></td>
                <td><b>Total</b></td>
                <td>".number_format($total, 2)."</td>
                <input type='hidden' name='total' value='".$total."'>
                <td>
                    <a href='javascript:void(0);' onclick='clearSession();'>
                        <button type='button' class='btn btn-warning btn-sm text-white' style='width: 80px;'>Clear All</button>
                    </a>
                </td>
            </tr>
            <tr>
            <td colspa='1'></td>
            
                <td>

    <button class='btn btn-place text-white' style='background-color: blueviolet;'' type='submit' name='place_order'>Place Order</button>


                </td>
            </tr>
        ";
     
 
    }

    $output .= "</table></form>";



    echo $output;
    $express_amount = 0;



    ?>
       
</div>

      <div class="place"></div> 

</body>
</html>