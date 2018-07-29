

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../../resource/css/bootstrap.css">
    <link rel="stylesheet" href="../../resource/css/bootstrap-grid.css">
    <link rel="stylesheet" href="../../resource/css/datatable.min.css">
    <link rel="stylesheet" href="../../resource/web-fonts-with-css/css/fontawesome-all.min.css">

</head>
<body>
<div class="lds-hourglass no_print" style="width: 100%;height:200%;" id="loadingDiv"></div>
<h3 class="text-muted text-center" style="margin-top:20px;">Total Sale</h3>

<a role="button" href="../../index.php" class="btn btn-primary" style="margin: 20px;position: absolute"><i
            class="fa fa-undo"></i> Dashboard</a>

<hr>
<form action="monthlySales.php" method="post">
    <div class="alert alert-primary text-center fade-in" role="alert" style="width: 500px;margin: auto; display: none"
         id="alrt">
        <strong>Successfully! </strong> Added !!
    </div>
    <div class="row justify-content-md-center" style="margin-top:70px ">
        <div class="input-group mb-3 col col-md-auto">
            <div class="input-group-prepend">
                <span class="input-group-text">From</span>
            </div>
            <input name="from" type="date" class="form-control" aria-describedby="inputGroup-sizing-default"
                    placeholder="From" required>
        </div>
        <div class="input-group mb-3 col col-md-auto">
            <div class="input-group-prepend">
                <span class="input-group-text">To</span>
            </div>
            <input name="to" type="date" class="form-control" aria-describedby="inputGroup-sizing-default"
                    placeholder="To" required>
        </div>
    </div>

    <div class="row justify-content-md-center" >
        <div class="input-group mb-3 col col-md-auto">
            <div class="input-group-prepend">
                <span class="input-group-text">Customere Name</span>
            </div>
            <input style="width: 500px" name="cus" list="customer" class="form-control" aria-describedby="inputGroup-sizing-default"
                   placeholder="Name" required>
            <datalist id="customer">

                <?php
                include_once "../../model/customer.php";
                $obj = new customer();
                $all_data = $obj->all();
                foreach ($all_data

                as $data){
                ?>
                <option value="<?php echo $data['name'] ?>">

                    <?php } ?>

            </datalist>
        </div>
    </div>


    <div class="row justify-content-md-center" style="margin-top:20px ">
        <button type="submit" class="btn btn-info" style="width: 100px"> Search</button>
    </div>
</form>
<hr>

<?php
include_once "../../model/total_sale.php";
if (isset($_POST['from'])) {
$obj = new total_sale();
$all = $obj->totalDataByDateByCus($_POST['from'], $_POST['to'],$_POST['cus']);
$all_sum = $obj->totalSumByDateByCus($_POST['from'], $_POST['to'],$_POST['cus']);
$sl = 0;
?>
<div class="row justify-content-md-center">
    <div class="col col-md-auto "><h5>Total Transaction : <span class="text-primary"><?php echo $all_sum['tota_tran']?></span></h5></div>
    <div class="col col-md-auto"><h5>Total : <span class="text-primary"><?php echo $all_sum['total']?></span></h5></div>
    <div class="col col-md-auto"><h5>Total Discount : <span class="text-primary"><?php echo $all_sum['total_discount']?></span></h5></div>
    <div class="col col-md-auto"><h5>Total Vat: <span class="text-primary"><?php echo $all_sum['total_vat']?></span></h5></div>
    <div class="col col-md-auto"><h5>Total NET: <span class="text-primary"><?php echo $all_sum['all_total']?></span></h5></h5></div>
</div>

<hr>

<div class="" style="padding: 10px">
    <table id="example" class="display table table-hover table-active table-responsive-md" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Serial</th>
            <th>Invoice No</th>
            <th>Del:In:No</th>
            <th>Date</th>
            <th>Customer Name</th>
            <th>TRN No</th>
            <th>Pay Type</th>
            <th>Total</th>
            <th>Discount</th>
            <th>Vat</th>
            <th>NET Total</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($all as $data) {
            $sl++;
            ?>
            <tr>
                <td><?php echo $sl ?></td>
                <td><?php echo $data['id'] ?></td>
                <td><?php echo $data['delivary_invoice_no'] ?></td>
                <td><?php echo $data['date'] ?></td>
                <td><?php echo $data['cus_name'] ?></td>
                <td><?php echo $data['trn'] ?></td>
                <td><?php echo $data['payment'] ?></td>
                <td><?php echo $data['total'] ?></td>
                <td><?php echo $data['discount'] ?></td>
                <td><?php echo $data['vat'] ?></td>
                <td><?php echo $data['net_total'] ?></td>
                <td>
                    <a href="details_cus_invoice.php?&in_no=<?php echo $data['id'] ?>"
                       class="btn btn-outline-info" style="border-radius: 100%" ><i class="fa fa-pencil-alt"></i></a>

                </td>
            </tr>
        <?php }
        } ?>

        </tbody>
    </table>

</div>


<script src="../../resource/js/jquery.js"></script>
<script src="../../resource/js/datatable.min.js"></script>
<script src="../../resource/js/bootstrap.bundle.js"></script>
<script src="../../resource/js/bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>

<script>
    $(document).ready(function () {

        $("#alrt").fadeOut();

    });
</script>

</body>
</html>