<?php
session_start();
if(isset($_SESSION['login'])){
    ?>


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
<h3 class="text-muted text-center" style="margin-top:20px">All Transaction</h3>
<a role="button" href="../../index.php" class="btn btn-primary" style="margin-left: 10px"><i
            class="fa fa-undo"></i> Dashboard</a>
<hr>


<div class="" style="padding:20px">
    <table id="example" class="display table table-hover table-active table-striped table-responsive-md" cellspacing="0"
           width="100%">
        <thead>
        <tr>
            <th>Serial</th>
            <th>Invoice No</th>
            <th>Date</th>
            <th>Customer Name</th>
            <th>TRN No</th>
            <th>Pay Type</th>
            <th>Total</th>
            <th>Discount</th>
            <th>Vat</th>
            <th>NET Total</th>
            <th>Cus:IN:No</th>
            <th>Cus:In:No</th>
            <th>Operation</th>
        </tr>
        </thead>

        <tbody>

        <?php
        include_once "../../model/p_cus_total_tran.php";
        $obj = new p_cus_total_tran();
        $all_data = $obj->all_tran();
        $sl = 0;
        foreach ($all_data as $data) {
            $sl++;
            ?>
            <tr>
                <td><?php echo $sl ?></td>
                <td><?php echo $data['id'] ?></td>
                <td><?php echo $data['date'] ?></td>
                <td><?php echo $data['cus_name'] ?></td>
                <td><?php echo $data['trn'] ?></td>
                <td><?php echo $data['payment'] ?></td>
                <td><?php echo $data['total'] ?></td>
                <td><?php echo $data['discount'] ?></td>
                <td><?php echo $data['vat'] ?></td>
                <td><?php echo $data['net_total'] ?></td>
                <td><?php echo $data['delivary_invoice_no'] ?></td>
                <td><?php echo $data['cus_in_date'] ?></td>
                <td>
                    <a href="details_cus_invoice.php?in_no=<?php echo $data['id'] ?>"
                       class="btn btn-outline-info" style="border-radius: 100%" ><i class="fa fa-pencil-alt"></i></a>

                    <button onclick="getInfo(this)" class="btn btn-outline-danger" style="border-radius: 100%" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-alt"></i></button>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
</div>

<!--////////////    MODAL-->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete Invoice</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
               <b>Are You sure want to delete Invoice No : <p id="in" style="display: inline" class="text-info"></p></b>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal" onclick="delete_invoice()">Yes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
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


        $("#alrt").fadeOut('slow');


</script>

<script>
    function getInfo(element) {

        var rowNUm = element.parentNode.parentNode.rowIndex;
        //var coNum = element.element.parentNode.cellIndex;
        //console.log(rowNUm);

        var table=document.getElementById("example");
        var in_no=table.rows[rowNUm].cells[1].innerHTML;
        //console.log(in_no);

        document.getElementById("in").innerHTML = in_no;
        //document.getElementById("rownum").innerHTML = rowNUm;

        //alert(pdt);
    }

    function delete_invoice() {
        var in_no= document.getElementById("in").innerHTML;
        var post_key = {"dlt_in": in_no};
        $.ajax({
                url: '../../controller/p_cus_total_tran_ctrl.php',
                type: 'post',
                data: post_key,
                //dataType: 'JSON',
                success: function (msg) {
                    if (msg === 'deleted') {
                        location.reload(true);
                    }
                    //alert(sum);

                }

            }
        )
    }


    $('#loadingDiv')
        .hide()  // Hide it initially
        .ajaxStart(function () {
            $(this).show();
        })
        .ajaxStop(function () {
            $(this).hide();
        });
</script>

</body>
</html>

<?php }
else{
    header('Location:../../index.html');
}
?>