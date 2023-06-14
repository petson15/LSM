<?php  


 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.css">

	<script type="" src="../js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../fonts/all.css">
	<title></title>

	<style type="text/css">
		body
		{
			font-family: sans-serif;
			font-size: 15px;
			margin: 0;
			padding: 0;
		}
			
		.navbar
		{
			background-color:  #4267b2;
		}
		.dropdown-toggle
		{
			margin-right: 90px;
		}

		 .nav-side {
            position: relative;
            top: -49px;
            background-color: #4267b2;
            width: 50px;
            transition: width 0.000001s;

        }

        .nav-side .links
        {

    		display: none;
        }

        .sidebar
        {
        	background-color:  #4267b2;
        	
        }

        .nav-side:hover
        {
        	width: 180px;

        }
        .links
        {
        	padding: 2px;
        	font-size: 12px;
        }

        .nav-side:hover .links
        {
        	display: inline;
        	
        }

        .sidebar li .submenu {
            list-style: none;
            margin: 0;
            padding: 0;
            padding-left: 0rem;
            padding-right: 0rem;
       
        }

        .push-nav {
            z-index: 1;
        }




	</style>




</head>
<body>



		<nav class="navbar navbar navbar-expand-lg navbar-dark push-nav">
        <div class="container-fluid">
            <a class="navbar-brand ms-4" href="../admin/dashboard.php"><img src="../avatars/logobs.png" style=" height: 30px; width: 30px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ms-5 ps-2" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="">order screen</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Inventory
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="purchase.php">Add Purchase</a></li>
                              <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="today-sales.php">Today sales</a></li>
                          

                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search" >
                    <div class="dropdown"  >
                        <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                            <img src="../avatars/avatar.jpeg"  style=" height: 25px; width: 25px; border-radius: 50%; ">
                        </a>

                        <ul class="dropdown-menu me-5">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="change-password.php">Change password</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="pos.php?action=logout">Logout</a></li>
                        </ul>
                    </div>
                    <span class="me-5 text-white"><small><?php //echo $_SESSION['user1']; ?></small></span>
                </form>
            </div>
        </div>
    </nav>

<div style="height: 120vh; float: left; position: fixed; display: block;" class="text-white nav-side">

        <div class="sidebar card py-4 mb-1 my-5">
            <ul class="nav flex-column text-white" id="nav_accordion" style="padding-top: 55px;">
                <li class="nav-item ">
                    <a class="nav-link  text-white" href="dashboard.php"> <i class="fa-brands fa-windows"></i><span class="links">Dashboard</span></a>
                </li>
                <li class="nav-item has-submenu my-2">
                    <a class="nav-link text-white" href="#"> <i class="fa-sharp fa-solid fa-warehouse"></i><span class="links">Inventory</span></a>
                    <ul class="submenu collapse">
                        <li><a class="nav-link text-white" href="purchase.php"><i class="fa-solid fa-cart-shopping"></i><span class="links"> Add purchase</span></a></li>
                        <li><a class="nav-link text-white" href="today-sales.php"><i class="fa-sharp fa-solid fa-money-bill"></i><span class="links">Today sales</span></a></li>
                    </ul>
                </li>
                <li class="nav-item has-submenu my-2">
                    <a class="nav-link text-white" href="#"><i class="fa-solid fa-user-group"></i><span class="links">customer management</a></span>
                    <ul class="submenu collapse">
                        <li><a class="nav-link text-white" href="customers.php"><i class="fa-solid fa-user"></i><span class="links">customers</span></a></li>
                      
                    </ul>
                </li>
                <li class="nav-item my-2">
                    <a class="nav-link text-white" href=""><i class="fa-solid fa-desktop"></i><span class="links">POS</span></a>
                    <ul class="submenu collapse">
                        <li><a class="nav-link text-white" href=""><i class="fa-solid fa-desktop"></i><span class="links">POS-order</span></a></li>
                        <li><a class="nav-link text-white" href=""><i class="fa-solid fa-desktop"></i><span class="links">My orders</span></a></li>
                    </ul>
                </li>
                <li class="nav-item my-2">
                    <a class="nav-link text-white" href=""><i class="fa-solid fa-bars"></i><span class="links">Order management</span></a>
                    <ul class="submenu collapse">
                        <li><a class="nav-link text-white" href=""><i class="fa-solid fa-list"></i><span class="links">orders</span></a></li>
                    </ul>
                </li>
                <li class="nav-item my-2">
                    <a class="nav-link text-white" href=""><i class="fa-solid fa-ellipsis"></i><span class="links">Menu Items</span></a>
                </li>
                <li class="nav-item my-2">
                    <a class="nav-link text-white" href=""><i class="fa-solid fa-user"></i><span class="links">Profile</span></a>
                    <ul class="submenu collapse">
                        <li><a class="nav-link text-white" href=""><i class="fa-solid fa-lock"></i><span class="links">Change password</span></a></li>
                        <li><a class="nav-link text-white" href=""><i class="fa-solid fa-right-from-bracket"></i><span class="links">Logout</span></a></li>
                    </ul>

                </li>
            </ul>
        </div>



    </div>

    </div>



     
    </script> <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.sidebar .nav-link').forEach(function(element) {

                element.addEventListener('click', function(e) {

                    let nextEl = element.nextElementSibling;
                    let parentEl = element.parentElement;

                    if (nextEl) {
                        e.preventDefault();
                        let mycollapse = new bootstrap.Collapse(nextEl);

                        if (nextEl.classList.contains('show')) {
                            mycollapse.hide();
                        } else {
                            mycollapse.show();
                            // find other submenus with class=show
                            var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                            // if it exists, then close all of them
                            if (opened_submenu) {
                                new bootstrap.Collapse(opened_submenu);
                            }
                        }
                    }
                }); // addEventListener
            }) // forEach
        });
        // DOMContentLoaded  end
    </script>


</body>
</html>