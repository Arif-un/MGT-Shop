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
<h3 class="text-muted text-center" style="margin-top:20px">Add a New Supplier</h3>
<a role="button" href="../index.php" class="btn btn-primary" style="float: right;margin: 20px"><i class="fa fa-undo"></i> Dashboard</a>
<hr>
<form action="../controller/supplier_ctrl.php" method="post">
    <div class="alert alert-primary text-center fade-in" role="alert" style="width: 500px;margin: auto;display: none"
         id="alrt">
        <strong>Successful !! </strong>
    </div>
<div class="row justify-content-md-center" style="margin-top:70px ">


    <div class="input-group mb-3 col col-md-auto" >
        <div class="input-group-prepend" >
            <span class="input-group-text" >Supplier Name</span>
        </div>
        <input name="name" type="text" class="form-control" aria-describedby="inputGroup-sizing-default" style="width: 500px" placeholder="Name" required>
    </div>
    <div class="input-group mb-3 col col-md-auto">
        <div class="input-group-prepend">
            <span class="input-group-text" >TRN No</span>
        </div>
        <input name="trn" type="text" class="form-control" aria-describedby="inputGroup-sizing-default" style="width: 250px"  required>
    </div>
</div>
<div class="row justify-content-md-center" style="margin-top:10px ">
        <div class="input-group mb-3 col col-md-auto" >
            <div class="input-group-prepend" >
                <span class="input-group-text" >Phone</span>
            </div>
            <input name="phone" type="text" class="form-control" aria-describedby="inputGroup-sizing-default" required>
        </div>
        <div class="input-group mb-3 col col-md-auto">
            <div class="input-group-prepend">
                <span class="input-group-text" >FAX</span>
            </div>
            <input name="fax" type="text" class="form-control" aria-describedby="inputGroup-sizing-default" required>
        </div>
        <div class="input-group mb-3 col col-md-auto">
            <div class="input-group-prepend">
                <span class="input-group-text" >EMAIL</span>
            </div>
            <input name="email" type="email" class="form-control" aria-describedby="inputGroup-sizing-default" required>
        </div>
    </div>

    <div class="row justify-content-md-center" style="margin-top:10px ">
        <div class="input-group mb-3 col col-md-auto" >
            <div class="input-group-prepend" >
                <span class="input-group-text" >Contract Person</span>
            </div>
            <input name="c_person" type="text" class="form-control" aria-describedby="inputGroup-sizing-default" required>
        </div>
        <div class="input-group mb-3 col col-md-auto">
            <div class="input-group-prepend">
                <span class="input-group-text" >Type</span>
            </div>
            <input name="type" type="text" class="form-control" aria-describedby="inputGroup-sizing-default" required >
        </div>
    </div>

    <div class="row justify-content-md-center" style="margin-top:10px ">
        <div class="input-group mb-3 col col-md-auto" >
            <div class="input-group-prepend" >
                <span class="input-group-text" >Adress</span>
            </div>
            <textarea name="adress" type="text" class="form-control" rows="2" cols="80" required></textarea>
        </div>

    </div>



<div class="row justify-content-md-center" style="margin-top:20px ">
    <button type="submit" class="btn btn-info" style="width: 100px"> SAVE </button>
</div>
</form>
<hr>

<div class="" style="margin: 15px">
    <table id="example" class="display table table-hover table-active table-striped" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Serial</th>
            <th>Name</th>
            <th>TRN No</th>
            <th>Phone</th>
            <th>FAX</th>
            <th>Email</th>
            <th>Contact Person</th>
            <th>Adress</th>
            <th>Type</th>
            <th>Operations</th>
            <th style="display: none">id</th>
        </tr>
        </thead>

        <tbody>

        <?php
        include_once "../model/supplier.php";
        $obj= new supplier();
        $all_data=$obj->all();
        $sl=0;
        foreach ($all_data as $data){
            $sl++;
        ?>
        <tr>
            <td><?php echo $sl ?></td>
            <td><?php echo $data['name'] ?></td>
            <td><?php echo $data['trn'] ?></td>
            <td><?php echo $data['phone'] ?></td>
            <td><?php echo $data['fax'] ?></td>
            <td><?php echo $data['email'] ?></td>
            <td><?php echo $data['c_person'] ?></td>
            <td><?php echo $data['adress'] ?></td>
            <td><?php echo $data['type'] ?></td>
            <td>
                <button onclick="up_set(this)" class="btn btn-outline-info" style="border-radius: 100%" data-toggle="modal" data-target="#myModalEdit"><i
                            class="fa fa-pencil-alt"></i></button>
                <button onclick="del_set(this)" class="btn btn-outline-danger" style="border-radius: 100%"  data-toggle="modal" data-target="#myModalDelete"><i
                            class="fa fa-trash-alt"></i></button>
            </td>
            <td style="display: none"><?php echo $data['id'] ?></td>
        </tr>
        <?php } ?>

        </tbody>
    </table>

</div>

<div class="modal fade" id="myModalEdit" style="width: auto">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit</h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form action="../controller/supplier_ctrl.php" method="post" style="margin: 15px">

                <div class="row justify-content-md-center">
                    <input name="u_id" style="display: none">
                    <div class="input-group mb-3 col col-md-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Customer Name</span>
                        </div>
                        <input name="u_name" type="text" class="form-control"
                               aria-describedby="inputGroup-sizing-default" style="width: auto" placeholder="Name"
                               required>
                    </div>
                    <div class="input-group mb-3 col col-md-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text">TRN No</span>
                        </div>
                        <input name="u_trn" type="text" class="form-control"
                               aria-describedby="inputGroup-sizing-default" style="width: 250px" required>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="input-group mb-3 col col-md-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Phone</span>
                        </div>
                        <input name="u_phone" type="text" class="form-control"
                               aria-describedby="inputGroup-sizing-default" required>
                    </div>
                    <div class="input-group mb-3 col col-md-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text">FAX</span>
                        </div>
                        <input name="u_fax" type="text" class="form-control"
                               aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3 col col-md-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text">EMAIL</span>
                        </div>
                        <input name="u_email" type="email" class="form-control"
                               aria-describedby="inputGroup-sizing-default">
                    </div>
                </div>

                <div class="row justify-content-md-center" style="margin-top:10px ">
                    <div class="input-group mb-3 col col-md-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Contract Person</span>
                        </div>
                        <input name="u_c_person" type="text" class="form-control"
                               aria-describedby="inputGroup-sizing-default" required>
                    </div>
                    <div class="input-group mb-3 col col-md-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Type</span>
                        </div>
                       <input name="u_type" type="text" class="form-control">
                    </div>
                </div>

                <div class="row justify-content-md-center" style="margin-top:10px ">
                    <div class="input-group mb-3 col col-md-auto">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Adress</span>
                        </div>
                        <textarea name="u_adress" type="text" class="form-control" rows="2" cols="80"
                                  required></textarea>
                    </div>

                </div>


                <div class="row justify-content-md-center" style="margin-top:20px ">
                    <button type="submit" class="btn btn-info mr-2"> SAVE</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--delete-->
<div class="modal fade" id="myModalDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../controller/supplier_ctrl.php" method="post" style="margin: 15px">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body text-danger">

                    <input name="u_del_id" style="display: none">
                    Are You sure to Delete !!


                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" >Delete</button>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../resource/js/jquery.js"></script>
<script src="../resource/js/datatable.min.js"></script>
<script src="../resource/js/bootstrap.bundle.js"></script>
<script src="../resource/js/bootstrap.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>

<script>
    function up_set(element) {

        var rowNUm = element.parentNode.parentNode.rowIndex;
        var table = document.getElementById("example");
        //var in_no=table.rows[rowNUm].cells[1].innerHTML;
        document.getElementsByName("u_name")[0].value = table.rows[rowNUm].cells[1].innerHTML;
        document.getElementsByName("u_trn")[0].value = table.rows[rowNUm].cells[2].innerHTML;
        document.getElementsByName("u_phone")[0].value = table.rows[rowNUm].cells[3].innerHTML;
        document.getElementsByName("u_fax")[0].value = table.rows[rowNUm].cells[4].innerHTML;
        document.getElementsByName("u_email")[0].value = table.rows[rowNUm].cells[5].innerHTML;
        document.getElementsByName("u_c_person")[0].value = table.rows[rowNUm].cells[6].innerHTML;
        document.getElementsByName("u_type")[0].value = table.rows[rowNUm].cells[8].innerHTML;
        document.getElementsByName("u_adress")[0].value = table.rows[rowNUm].cells[7].innerHTML;
        document.getElementsByName("u_id")[0].value = table.rows[rowNUm].cells[10].innerHTML;
    }

    function del_set(element) {

        var rowNUm = element.parentNode.parentNode.rowIndex;
        var table = document.getElementById("example");
        document.getElementsByName("u_del_id")[0].value = table.rows[rowNUm].cells[10].innerHTML;
    }
</script>

<script>
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