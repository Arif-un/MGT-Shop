<?php
session_start();
if(isset($_SESSION['login'])){

    /* ob_start(); // Turn on output buffering
    system('ipconfig /all'); //Execute external program to display output
    $mycom=ob_get_contents(); // Capture the output into a variable
    ob_clean(); // Clean (erase) the output buffer
    $findme = "Physical";
    $pmac = strpos($mycom, $findme); // Find the position of Physical text
    $mac=substr($mycom,($pmac+36),17); // Get Physical Address
    //echo $mac;

    if($mac==="4C-72-B9-FE-04-A5"){ */

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shop</title>
    <script src="resource/js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="resource/css/bootstrap.css">
    <link rel="stylesheet" href="resource/css/bootstrap-grid.css">
    <link rel="stylesheet" href="resource/web-fonts-with-css/css/fontawesome-all.css">


</head>
<body>
<div style="margin-top: 5px">
    <img style="display: block;margin-left: auto;margin-right: auto" src="resource/MGT-logo-%5BConverted%5D.png"
         width="100px" height="auto">
    <h2 class="text-muted text-center">MGT SHOP</h2>
</div>
<hr>
<div style="margin-top: -75px">

    <div class="col col-md-auto">
        <a href="controller/logout.php" role="button" class="btn btn-outline-primary btn-lg"
           style="border-radius: 20px;float: right;margin-top:-70px"><?php print_r($_SESSION['login']['username']) ?><br>Log Out <i
                    class="fa fa-sign-out-alt"></i></a>
    </div>
    <div class="row justify-content-md-center" style="margin-top:100px ">
        <div class="col col-md-auto">
            <a href="view/customer/create_cus_invoice.php" role="button" class="btn btn-danger btn-lg"
               style="height: 150px;width: 350px; border-radius: 20px">Create Customer Invoice <i
                    class="far fa-list-alt fa-5x"></i></a>
        </div>
        <div class="col col-md-auto">
            <a href="view/purchase/create_cus_invoice.php" class="btn btn-danger btn-lg"
               style="height: 150px;width: 350px; border-radius: 20px">Create Purchase
                Invoice <i class="fas fa-list-alt fa-5x"></i></a>
        </div>
    </div>

    <div class="row justify-content-md-center" style="margin-top:20px ">
        <div class="col col-md-auto">
            <a href="view/customer.php" role="button" class="btn btn-warning btn-lg"
               style="height: 100px;width: 280px; border-radius: 20px">Add A Customer <i class="fa fa-users fa-4x"></i></a>
        </div>
        <div class="col col-md-auto">
            <a href="view/supplier.php" role="button" class="btn btn-warning btn-lg"
               style="height: 100px;width: 280px; border-radius: 20px">Add A Supplier <i
                    class="fas fa-truck  fa-4x"></i></a>
        </div>
        <div class="col col-md-auto">
            <a href="view/product.php" role="button" class="btn btn-warning btn-lg"
               style="height: 100px;width: 280px; border-radius: 20px">Add A Product <i
                    class="fa fa-cubes fa-4x"></i></a>
        </div>

    </div>

    <div class="row justify-content-md-center" style="margin-top:20px ">
        <div class="col col-md-auto">
            <a href="view/customer/all_transection.php" role="button" class="btn btn-primary btn-lg"
               style="height: 100px;width: 280px; border-radius: 20px">All Customer<br>Transaction <i
                    class="fa fa-chart-bar fa-3x"></i></a>
        </div>
        <div class="col col-md-auto">
            <a href="view/customer/monthlySales.php" role="button" class="btn btn-primary btn-lg"
               style="height: 100px;width: 280px; border-radius: 20px">Customer Monthly<br>Report <i
                    class="fa fa-calendar-alt fa-2x"></i></a>
        </div>
        <div class="col col-md-auto">
            <a href="view/customer/total_sales.php" role="button" class="btn btn-primary btn-lg"
               style="height: 100px;width: 280px; border-radius: 20px">Customer Total<br>Report <i
                    class="fa fa-chart-pie fa-2x"></i></a>
        </div>
    </div>
    <div class="row justify-content-md-center" style="margin-top:20px ">
        <div class="col col-md-auto">
            <a href="view/purchase/all_transection.php" role="button" class="btn btn-success btn-lg"
               style="height: 100px;width: 280px; border-radius: 20px">All Supplier<br>Transaction <i
                    class="fa fa-chart-bar fa-3x"></i> </a>
        </div>
        <div class="col col-md-auto">
            <a href="view/purchase/monthlySales.php" role="button" class="btn btn-success btn-lg"
               style="height: 100px;width: 280px; border-radius: 20px">Supplier Monthly<br>Report <i
                    class="fa fa-calendar-alt fa-2x"></i></a>
        </div>
        <div class="col col-md-auto">
            <a href="view/purchase/total_sales.php" role="button" class="btn btn-success btn-lg"
               style="height: 100px;width: 280px; border-radius: 20px">Supplier Total<br>Report <i
                    class="fa fa-chart-pie fa-2x"></i></a>
        </div>
    </div>
    <div class="row justify-content-md-center" style="margin-top:20px ">
        <div class="col col-md-auto">
            <a href="view/user.php" role="button" class="btn btn-success btn-lg"
               style="height: 50px;width: 100px; border-radius: 20px">User <i
                        class="fa fa-users"></i></a>
        </div>
    </div>

</div>


<script src="resource/js/bootstrap.bundle.js"></script>
<script src="resource/js/bootstrap.js"></script>
</body>
</html>

<?php }
/* else echo "<h1> Please Contact With your vendor <br> arifunctg@gmail.com</h1>";
} */
else{
header('Location:index.html');
}
?>