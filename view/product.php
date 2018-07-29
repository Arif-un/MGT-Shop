<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../resource/css/bootstrap.css">
    <link rel="stylesheet" href="../resource/css/bootstrap-grid.css">
    <link rel="stylesheet" href="../resource/css/datatable.min.css">
    <link rel="stylesheet" href="../resource/web-fonts-with-css/css/fontawesome-all.min.css">

</head>
<body>
<div class="lds-hourglass no_print" style="width: 100%;height:200%;" id="loadingDiv"></div>
<h3 class="text-muted text-center" style="margin-top:20px">Add a New Product</h3>
<a role="button" href="../index.php" class="btn btn-primary" style="margin: 20px;position: absolute"><i
            class="fa fa-undo"></i> Dashboard</a>

<hr>

<div class="alert alert-primary text-center fade-in" role="alert" style="width: 500px;margin: auto;display: none"
     id="alrt">
    <strong>Successful !! </strong>
</div>
<form action="../controller/product_ctrl.php" method="post" class="form-control">
    <div class="row justify-content-md-center" style="margin-top:70px ">


        <div class="input-group mb-3 col col-md-auto">
            <div class="input-group-prepend">
                <span class="input-group-text">Product Name</span>
            </div>
            <input id="pdct_name" name="pd_name" onchange="checkProductExist()" type="text" class="form-control"
                   aria-describedby="inputGroup-sizing-default" style="width: 300px" placeholder="Name" value=""
                   required>
        </div>
        <div class="input-group mb-3 col col-md-auto">
            <div class="input-group-prepend">
                <span class="input-group-text">Unit</span>
            </div>
            <input id="unit" name="unit" type="text" class="form-control" aria-describedby="inputGroup-sizing-default"
                   style="width: 150px" placeholder="KG,LITER,Pieces" required>
        </div>
    </div>
    <div class="row justify-content-md-center" style="margin-top:20px ">
        <div class="input-group mb-3 col col-md-auto">
            <div class="input-group-prepend">
                <span class="input-group-text">Product Code</span>
            </div>
            <input id="pd_code" name="pd_code" type="text" class="form-control"
                   aria-describedby="inputGroup-sizing-default" placeholder="001E" value="" required>
        </div>
        <div class="input-group mb-3 col col-md-auto">
            <div class="input-group-prepend">
                <span class="input-group-text">Price</span>
            </div>
            <input id="price" name="price" type="text" class="form-control" aria-describedby="inputGroup-sizing-default"
                   placeholder="00.0 AED">
        </div>
    </div>

    <div class="row justify-content-md-center" style="margin-top:20px ">
        <button id="save" type="submit" class="btn btn-info" style="width: 100px"> SAVE</button>
    </div>
</form>
<hr>

<div class="" style="margin: 15px">
    <table id="example" class="display table table-hover table-active " cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Serial</th>
            <th>Product Name</th>
            <th>Product Code</th>
            <th>Unit</th>
            <th>Price</th>
            <th>Operations</th>
        </tr>
        </thead>

        <tbody>

        <?php
        include_once "../model/product.php";
        $obj = new product();
        $all_data = $obj->all();
        $sl = 0;
        foreach ($all_data as $data) {
            $sl++;
            ?>
            <tr>
                <td><?php echo $sl ?></td>
                <td><?php echo $data['product_name'] ?></td>
                <td><?php echo $data['Product_code'] ?></td>
                <td><?php echo $data['unit'] ?></td>
                <td><?php echo $data['price'] ?></td>
                <td>
                    <button id="<?php echo $data['id'] ?>" onclick="update(this)" class="btn btn-outline-info" style="border-radius: 100%" data-toggle="modal"
                            data-target="#myModal"><i
                                class="fa fa-pencil-alt"></i>
                    </button>
                    <button onclick="getInfo(this)" class="btn btn-outline-danger" style="border-radius: 100%" data-toggle="modal"
                            data-target="#myModal_del"><i class="fa fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>

</div>

<!-- The Modal DELETE -->
<div class="modal fade" id="myModal" style="height: 100%">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->

            <div class="modal-body">
                <form action="../controller/product_ctrl.php" method="post">
                    <input type="hidden" id="u_id" name="u_id">
                    <div class="row justify-content-md-center">

                        <div class="input-group mb-3 col col-md-auto">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Product Name</span>
                            </div>
                            <input id="u_pd_name" name="u_pd_name" type="text" class="form-control"
                                   aria-describedby="inputGroup-sizing-default" style="width: 300px" placeholder="Name"
                                   required >
                        </div>
                        <div class="input-group mb-3 col col-md-auto">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Unit</span>
                            </div>
                            <input id="u_unit" name="u_unit" type="text" class="form-control"
                                   aria-describedby="inputGroup-sizing-default"
                                   style="width: 150px" placeholder="KG,LITER,Pieces" required>
                        </div>
                    </div>
                    <div class="row justify-content-md-center" style="margin-top:20px ">
                        <div class="input-group mb-3 col col-md-auto">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Product Code</span>
                            </div>
                            <input id="u_pd_code" name="u_pd_code" type="text" class="form-control"
                                   aria-describedby="inputGroup-sizing-default" placeholder="001E" required>
                        </div>
                        <div class="input-group mb-3 col col-md-auto">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Price</span>
                            </div>
                            <input id="u_price" name="u_price" type="text" class="form-control"
                                   aria-describedby="inputGroup-sizing-default" placeholder="00.0 AED">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="float: right">Save</button>
                </form>
            </div>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">

            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

    </div>
</div>

<div class="modal fade" id="myModal_del">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ">Delete</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body text-danger">
                <b>Are You sure want to delete : <span id="pd" class="text-muted"></span></b>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button onclick="delete_pd()" type="button" class="btn btn-primary" data-dismiss="modal">Delete</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>


<script src="../resource/js/jquery.js"></script>
<script src="../resource/js/datatable.min.js"></script>
<script src="../resource/js/bootstrap.bundle.js"></script>
<script src="../resource/js/bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>

<script>
    <?php
    if (isset($_SESSION['msg']) && $_SESSION['msg'] === 1) {
        echo " $(document).ready(function () {
        document.getElementById(\"alrt\").style.display = \"block\";
        $(\"#alrt\").fadeOut(2000);
    });";

        $_SESSION['msg'] = 0;
    }?>

</script>

<script>
    function checkProductExist() {
        var pd_name = document.getElementById("pd_name").value;
        var pd_code = document.getElementById("pd_code").value;
        console.log(pd_name);
        var post_key = {"chekPdEx": "key", "pdct_name": pd_name, "pdct_code": pd_code};
        $.ajax({
                url: '../controller/product_ctrl.php',
                type: 'post',
                data: post_key,
                //dataType: 'JSON',
                success: function (msg) {
                    if (msg === "") {
                        document.getElementById("save").disabled = false;
                    }
                    else {
                        document.getElementById("save").disabled = true;
                        alert("Product Already Exist");
                        console.log(msg);
                    }
                    //alert(sum);

                }

            }
        )
    }
</script>
<script>
    function update(element) {
        var id=element.id;
        var rowNUm = element.parentNode.parentNode.rowIndex;
        var table = document.getElementById("example");
        //var in_no=table.rows[rowNUm].cells[1].innerHTML;
        document.getElementById("u_pd_name").value = table.rows[rowNUm].cells[1].innerHTML;
        document.getElementById("u_pd_code").value = table.rows[rowNUm].cells[2].innerHTML;
        document.getElementById("u_unit").value = table.rows[rowNUm].cells[3].innerHTML;
        document.getElementById("u_price").value = table.rows[rowNUm].cells[4].innerHTML;

        document.getElementById("u_id").value = id;
    }

    function getInfo(element) {

        var rowNUm = element.parentNode.parentNode.rowIndex;

        var table=document.getElementById("example");
        var pd=table.rows[rowNUm].cells[1].innerHTML;
        //console.log(in_no);

        document.getElementById("pd").innerHTML = pd;

    }

    function delete_pd() {
        var pd= document.getElementById("pd").innerHTML;
        var post_key = {"pd_del": pd};
        $.ajax({
                url: '../controller/product_ctrl.php',
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

    <?php
    if (isset($_SESSION['msg']) && $_SESSION['msg'] === 1) {
        echo " $(document).ready(function () {
        document.getElementById(\"alrt\").style.display = \"block\";
        $(\"#alrt\").fadeOut(3000);
    });";

        $_SESSION['msg'] = 0;
    }?>
</script>

</body>
</html>