<?php  

include_once('../dbconfig/config.php');


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LMS || Today sales</title>
	<link rel="website icon" type="png" href="../avatars/logobs.png">
	<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.css">
	<style type="text/css">
		

		.table 
   		{
   			max-width: 75%;
   			margin-left: 20px;

   		}

		.table thead
   		{
   			background-color: #515448;
   			color: white;
   			font-size: 13px;

   		}




	</style>
</head>
<body>

	<?php include_once('../includes/navbar.php') ?>

	<div class="container"><h4 style=" margin:30px; color: grey; margin-left: 1px;">Today sales</h4></div>

	<div class="container me-5">
		<table class="table table-bordered fw-semilight ms-1 tab-1 ms-5 me-1">
  <thead>
    <tr>
      <th scope="col">Employee</th>
      <th scope="col">Amount</th>
      

    </tr>
  </thead>
  <tbody >
  	<?php  

  	$currentDate = date('Y-m-d');
  	$sql = "SELECT DISTINCT servedby, SUM(price) AS total FROM orderitems WHERE completed = 1 AND DATE(completed_date) = '$currentDate' GROUP BY servedby";
  	$res = mysqli_query($conn, $sql);

  	if (!$res) {
  		// code...
  		echo "error in sql" . mysqli_error($conn);
  	}

  	while ($row = mysqli_fetch_assoc($res)) {
  		// code...
  	$sql = "SELECT servedby, SUM(initialPayment) AS initialPaymentSum
        FROM (
          SELECT servedby, MAX(initialPayment) AS initialPayment
          FROM orderitems
          WHERE DATE(order_date) = '$currentDate'
          GROUP BY servedby, initialPayment
        ) AS subquery
        GROUP BY servedby";


        $res = mysqli_query($conn,$sql);
        $initial_sum = mysqli_fetch_assoc($res);
  
  	?>
    <tr >
      <td><?php echo $row['servedby'] ?></td>
      <td><?php echo $row['total'] + $initial_sum['initialPaymentSum'] ?></td>
    </tr>
    <tr>
      <td>Total</td>
      <td><?php echo $row['total'] + $initial_sum['initialPaymentSum']?></td>
    </tr>
    
  </tbody>
<?php } ?>
</table>
</div>

</body>
</html>