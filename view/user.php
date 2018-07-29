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
<div class="alert alert-primary text-center fade-in" role="alert" style="width: 500px;margin: auto;display: none"
     id="alrt">
    <strong>Successful !! </strong>
</div>
<div class="alert alert-danger text-center fade-in" role="alert" style="width: 500px;margin: auto;display: none"
     id="alrt2">
    <strong>Password Not Match !! </strong>
</div>
<a role="button" href="../index.php" class="btn btn-primary" style="margin: 20px;position: absolute"><i
            class="fa fa-undo"></i> Dashboard</a>
<br>
<br>
<br>
<br>
<!--<div class="lds-hourglass no_print" style="width: 100%;height:200%;" id="loadingDiv"></div>
<h3 class="text-muted text-center" style="margin-top:20px">Add a New User</h3>


<hr>

<form action="../controller/product_ctrl.php" method="post" class="form-control">
    <div class="row justify-content-md-center" style="margin-top:70px ">
        <div class="input-group mb-3 col col-md-auto">
            <div class="input-group-prepend">
                <span class="input-group-text">User Name</span>
            </div>
            <input id="pdct_name" name="pd_name" type="text" class="form-control"
                   aria-describedby="inputGroup-sizing-default" style="width: 300px" placeholder="Name" value=""
                   required>
        </div>
    </div>
    <div class="row justify-content-md-center" style="margin-top:70px ">
        <div class="input-group mb-3 col col-md-auto">
            <div class="input-group-prepend">
                <span class="input-group-text">Email</span>
            </div>
            <input id="pdct_name" name="pd_name" type="email" class="form-control"
                   aria-describedby="inputGroup-sizing-default" style="width: 300px" placeholder="Email" value=""
                   required>
        </div>
    </div>
    <div class="row justify-content-md-center" style="margin-top:70px ">
        <div class="input-group mb-3 col col-md-auto">
            <div class="input-group-prepend">
                <span class="input-group-text">Password</span>
            </div>
            <input id="pdct_name" name="pd_name" type="text" class="form-control"
                   aria-describedby="inputGroup-sizing-default" style="width: 300px" placeholder="Name" value=""
                   required>
        </div>
    </div>


    <div class="row justify-content-md-center" style="margin-top:20px ">
        <button id="save" type="submit" class="btn btn-info" style="width: 100px"> SAVE</button>
    </div>
</form>-->
<hr>

<div class="" style="margin: 15px">
    <table id="example" class="display table table-hover table-active " cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Serial</th>
            <th>Email</th>
            <th>User Name</th>
            <th style="display: none">id</th>
            <th>Edit</th>

        </tr>
        </thead>

        <tbody>

        <?php
        include_once "../model/login.php";
        $obj = new login();
        $all_data = $obj->allUser();
        $sl = 0;
        foreach ($all_data as $data) {
            $sl++;
            ?>
            <tr>
                <td><?php echo $sl ?></td>
                <td><?php echo $data->email ?></td>
                <td><?php echo $data->username ?></td>
                <td style="display: none"><?php echo $data->id ?></td>
                <td>
                    <button onclick="update(this)" class="btn btn-outline-info" style="border-radius: 100%"><i
                                class="fa fa-pencil-alt"
                                data-toggle="modal"
                                data-target="#myModal"></i>
                    </button>
                    <!--<button onclick="getInfo(this)" class="btn btn-outline-danger" style="border-radius: 100%"><i class="fa fa-trash-alt" data-toggle="modal"
                                                                                                                  data-target="#myModal_del"></i>
                    </button>-->
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
                <form action="../controller/login_ctrl.php" method="post">
                    <input type="hidden" id="id" value="" name="id">
                    <div class="row justify-content-md-center">

                        <div class="input-group mb-3 col col-md-auto">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Email</span>
                            </div>
                            <input id="email" name="mail" type="text" class="form-control"
                                   aria-describedby="inputGroup-sizing-default" style="width: 300px" placeholder="Mail"
                                    >
                        </div>

                        <div class="input-group mb-3 col col-md-auto">
                            <div class="input-group-prepend">
                                <span class="input-group-text">User Name</span>
                            </div>
                            <input id="user_n" name="name" type="text" class="form-control"
                                   aria-describedby="inputGroup-sizing-default" style="width: 300px" placeholder="Name"
                                    >
                        </div>

                        <div class="input-group mb-3 col col-md-auto">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Old Password</span>
                            </div>
                            <input id="pass" name="oldPass" type="password" class="form-control"
                                   aria-describedby="inputGroup-sizing-default" style="width: 316px" placeholder="Old Password"
                                    >
                        </div>

                        <div class="input-group mb-3 col col-md-auto">
                            <div class="input-group-prepend">
                                <span class="input-group-text">New Password</span>
                            </div>
                            <input onkeyup="chekPass()" id="n_pass" name="newPass" type="password" class="form-control"
                                   aria-describedby="inputGroup-sizing-default" style="width: 308px" placeholder="New Password"
                                    >
                        </div>

                        <div class="input-group mb-3 col col-md-auto">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Confirm New Password</span>
                            </div>
                            <input onkeyup="chekPass()" id="c_pass" name="u_pd_name" type="password" class="form-control"
                                   aria-describedby="inputGroup-sizing-default" style="width: 242px" placeholder="Confirm New Password"
                                    >
                        </div>

                        <p id="alert" style="color: #dc3545;position: absolute;top:285px;display: none">Password Does Not Match !!</p>

                    </div>

                    <button id="s_btn" type="submit" class="btn btn-primary" style="float: right">Save</button>
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
        var rowNUm = element.parentNode.parentNode.rowIndex;
        var table = document.getElementById("example");
        //var in_no=table.rows[rowNUm].cells[1].innerHTML;
        document.getElementById("email").value = table.rows[rowNUm].cells[1].innerHTML;
        document.getElementById("user_n").value = table.rows[rowNUm].cells[2].innerHTML;
        document.getElementById("id").value = table.rows[rowNUm].cells[3].innerHTML;
    }

    function chekPass() {
       var n= document.getElementById("n_pass").value;

        var c=document.getElementById("c_pass").value;
        if(n===c){
            console.log(n);
            document.getElementById("alert").style.display="none";
            document.getElementById("s_btn").disabled=false;
        }
        else {
            console.log("cc");
            document.getElementById("alert").style.display="block";
            document.getElementById("s_btn").disabled=true;
        }

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
    <?php
    if (isset($_SESSION['msg']) && $_SESSION['msg'] === 2) {
        echo " $(document).ready(function () {
        document.getElementById(\"alrt2\").style.display = \"block\";
        $(\"#alrt2\").fadeOut(3000);
    });";

        $_SESSION['msg'] = 0;
    }?>
</script>

</body>
</html>