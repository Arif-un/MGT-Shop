
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="../../resource/js/jquery.js"></script>
    <link href="../../resource/css/bootstrap.css" type="text/css" rel="stylesheet" media="screen,projection,">
    <script src="../../resource/js/bootstrap.min.js"></script>
    <!-- <link href="css/css.css" type="text/css" rel="stylesheet" media="print,projection">
     <link href="css/css.css" type="text/css" rel="stylesheet" media="screen,projection">-->

    <link rel="stylesheet" type="text/css" href="../../resource/css/print.css"/>

    <link rel="stylesheet" type="text/css" href="../../resource/css/css.css"/>
    <link rel="stylesheet" type="text/css" href="../../resource/css/sw.css"/>


</head>

<body id="printarea">
<div class="lds-hourglass no_print" style="width: 100%;height:200%;" id="loadingDiv"></div>
<div class="main">

    <div class="head no_screen">
        <img src="../../resource/MGT-logo-%5BConverted%5D.png" height="116px" width="126px" class="no_screen"/>
    </div>
    <div class="head_content no_screen">
        <h1 style=""><b>M G T</b></h1>
        <p>FRUIT AND VEGETABLE SUPPLIER</p>
    </div>
    <hr style="margin-top: 20px" class="no_screen">


    <p>Invoice NO : <span id="in_no"><?php echo $_GET['in_no']?></span></p>


    <p class="right" style="margin-top: -40px">Date : <span id="date"><?php echo $_GET['date'] ?></span></p>
    <p>Customer Name : <span id="cus_name"><?php echo $_GET['cus_name']?></span> </p>
    <p class="right">TRN NO : <span id="trn"><?php echo $_GET['trn']?></span></p>

    <div class="inline">
        <p class="" style="margin-top: -40px">Payment Type : <span id="payment"><?php echo $_GET['payment']?></span></p>
    </div>
    <div style="display: inline-block" class="no_print">
        <p class="inline no_print">Product Name : <input list="product" name="browser" style="width: 200px"
                                                         id="pdt_name" onchange="price_set()">
            <datalist id="product">

                <?php
                include_once "../../model/product.php";
                $objct = new product();
                $al_data = $objct->all();
                foreach ($al_data

                as $data){
                ?>
                <option value="<?php echo $data['product_name'] ?>">

                    <?php } ?>
            </datalist>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </p>

        <p class="inline no_print">Quantity : <input id="quantity" type="text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <p class="inline no_print">Price : <input id="price" type="text" id="price" value=""></p>

        <button type="submit" onclick="tran();addMoreRows();sum();" id="insert" class="no_print btn" title="Press Enter to Insert"> Insert</button>
        <button type="submit" onclick="save();total_tran()" id="save" class="no_print btn"> Save & New</button>

    </div>

    <div style="margin-top: 10px">
        <p class="inline no_print">Product Code : &nbsp;<input type="text" value="" id="code" disabled
                                                               style="border: none;background-color: transparent">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </p>
        <p class="inline no_print" style="padding-left: 38px">Unit : <input type="text" value="" id="unit" disabled
                                                                            style="border: none;background-color: transparent">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </p>
    </div>

    <div style="border: 1px black solid;" class="hight higt">
        <table style="width:100%; " id="tbl" class="table table-hover ">
            <thead>
            <tr>
                <th style="text-align: center;">Serial</th>
                <th style="text-align: center;">Item Code</th>
                <th style="text-align: center;">Description</th>
                <th style="text-align: center;">Unit</th>
                <th style="text-align: center;">Quantity</th>
                <th style="text-align: center;">Rate</th>
                <th style="text-align: center;">Amount</th>
                <th style="text-align: center;" class="no_print">Delete</th>

            </tr>
            </thead>
            <tbody>
            <?php include_once "../../model/p_transection.php";
            $objct = new p_transection();
            $all=$objct->transactions($_GET['date'],$_GET['cus_name'],$_GET['in_no']);
            $serial=1;
            foreach ($all as $item) { ?>
            <tr>
                <td style="text-align: center;"><?php echo $serial++ ?></td>
                <td style="text-align: center;"><?php echo $item['pd_code']?></td>
                <td style="text-align: center;"><?php echo $item['pd_name']?></td>
                <td style="text-align: center;"><?php echo $item['unit']?></td>
                <td style="text-align: center;"><?php echo $item['quantity']?></td>
                <td style="text-align: center;"><?php echo $item['price']?></td>
                <td style="text-align: center;"><?php echo $item['amount']?></td>
                <td style="text-align: center;"><button style="color: #dc3545;" class='button' onclick='getId(this);' data-toggle="modal" data-target="#myModal"><b>&times;</b></button></td>
            </tr>
            <?php }?>

            </tbody>
        </table>
    </div>

    <div class="clearfix ">

        <table class="total_table f_right table_top_margin table table-hover table-bordered">
            <tr>
                <th class="right min_pad">Total:</th>
                <td class="space" style="text-align: center"><b id="total"></b></td>
            </tr>
            <tr>
                <th class="right min_pad">Total Vat (5 % ):</th>
                <td class="space" style="text-align: center"><b id="vat"></b></td>
            </tr>
            <tr>
                <th class="right min_pad">Discount:</th>
                <td class="space"><input id="discount" value="0" style="border: none;text-align: center" onkeyup="discount()"></td>
            </tr>
            <tr>
                <th class="right min_pad">NET Total (AED):</th>
                <td class="space" style="text-align: center"><b id="n_tot">0</b></td>
            </tr>
        </table>


        <p><b>Amount In Word : </b><span id="in_word"></span></p>
        <p><u> </u></p>

        <br>

        <p><b>Payment Term : </b></p>

    </div>
    <div style="margin-top: 50px" class="no_screen">
        <p style="margin-top: 50px">Customer Signature..................</p>
        <p class="right" style="margin-top: -35px">Authorised Signature..................</p>
    </div>

</div>

<div class="modal fade no_print" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title ">Are you Sure to Delete</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body text-danger">
                It Will Delete all <b id="prdt_name"></b>
                <p id="rownum" style="display: none"></p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="delete_tmp();rowss()">Delete</button>
            </div>

        </div>
    </div>
</div>





<script type="text/javascript" >

    /*--This JavaScript method for Print command--*/

    function PrintDoc() {

        var toPrint = document.getElementById('printarea');

        var popupWin = window.open('', '_blank', 'width=350,height=150,location=no,left=200px');

        popupWin.document.open();

        popupWin.document.write('<html><title>::Preview::</title><link rel="stylesheet" type="text/css" href="../../resource/css/print.css" /></head><body onload="window.print()">');

        popupWin.document.write(toPrint.innerHTML);

        popupWin.document.write('</html>');

        popupWin.document.close();

    }

    /*--This JavaScript method for Print Preview command--*/

    function PrintPreview() {

        var toPrint = document.getElementById('printarea');

        var popupWin = window.open('', '_blank', 'width=350,height=150,location=no,left=200px');

        popupWin.document.open();

        popupWin.document.write('<html><title>::Print Preview::</title><link rel="stylesheet" type="text/css" href="Print.css" media="screen"/></head><body">')

        popupWin.document.write(toPrint.innerHTML);

        popupWin.document.write('</html>');

        popupWin.document.close();

    }

</script>

<script type="text/javascript">
    function trn_no() {
        var name = document.getElementById("cus_name").value;
        var xhr;
        if (window.XMLHttpRequest) { // Mozilla, Safari, ...
            xhr = new XMLHttpRequest();
        } else if (window.ActiveXObject) { // IE 8 and older
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
        var data = "c_name=" + name;
        xhr.open("POST", "../../controller/supplier_ctrl.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);
        xhr.onreadystatechange = display_data;

        function display_data() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // alert(xhr.responseText);
                    var rs = JSON.parse(xhr.responseText);
                    //console.log(rs);
                    document.getElementById("trn").value = rs.trn;
                    // var msg = xhr.responseText['0'];
                    //var alrt = document.getElementById("alert_mail");


                } else {
                    alert('There was a problem with the request.');
                }
            }
        }
    }

</script>

<script type="text/javascript">
    function price_set() {
        var name = document.getElementById("pdt_name").value;
        var xhreq;
        if (window.XMLHttpRequest) { // Mozilla, Safari, ...
            xhreq = new XMLHttpRequest();
        } else if (window.ActiveXObject) { // IE 8 and older
            xhreq = new ActiveXObject("Microsoft.XMLHTTP");
        }
        var dat = "pdt_name=" + name;
        xhreq.open("POST", "../../controller/product_ctrl.php", true);
        xhreq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhreq.send(dat);
        xhreq.onreadystatechange = display_dat;

        function display_dat() {
            if (xhreq.readyState === 4) {
                if (xhreq.status === 200) {
                    //alert(xhreq.responseText);
                    var rst = JSON.parse(xhreq.responseText);
                    // console.log(rst);
                    document.getElementById("price").value = rst.price;
                    document.getElementById("code").value = rst.Product_code;
                    document.getElementById("unit").value = rst.unit;
                    // var msg = xhr.responseText['0'];
                    //var alrt = document.getElementById("alert_mail");


                } else {
                    alert('There was a problem with the request.');
                }
            }
        }
    }

</script>

<script type="text/javascript">
    var serial = 0;

    function addMoreRows() {

        var newRow = document.getElementById('tbl').insertRow();

        var pdt_name = document.getElementById("pdt_name").value;
        var code = document.getElementById("code").value;
        var quantity = document.getElementById("quantity").value;
        var unit = document.getElementById("unit").value;
        var price = document.getElementById("price").value;
        var amount = document.getElementById("price").value * document.getElementById("quantity").value;

        serial += 1;
        if (serial > 24) {
            document.getElementById('insert').disabled = true;
        }
        else {document.getElementById('insert').disabled = false;}
        var newCell = newRow.insertCell();
        newCell.innerHTML = "<tr><td>" + serial + "</td></tr>";
        newCell.style.textAlign = "center";

        newCell = newRow.insertCell();
        newCell.innerHTML = "<tr><td >" + code + "</td></tr>";
        newCell.style.textAlign = "center";

        newCell = newRow.insertCell();
        newCell.innerHTML = "<tr><td>" + pdt_name + "</td></tr>";
        newCell.style.textAlign = "center";
        newCell.id = "pd" + serial;

        newCell = newRow.insertCell();
        newCell.innerHTML = "<tr><td >" + unit + "</td></tr>";
        newCell.style.textAlign = "center";

        newCell = newRow.insertCell();
        newCell.innerHTML = "<tr><td >" + quantity + "</td></tr>";
        newCell.style.textAlign = "center";

        newCell = newRow.insertCell();
        newCell.innerHTML = "<tr><td >" + price + "</td></tr>";
        newCell.style.textAlign = "center";

        newCell = newRow.insertCell();
        newCell.innerHTML = "<tr><td >" + amount + "</td></tr>";
        newCell.style.textAlign = "center";

        newCell = newRow.insertCell();
        newCell.innerHTML = "<tr><td><button class='button' onclick='getId(this);' data-toggle=\"modal\" data-target=\"#myModal\"><b>&times;</b></button></td></tr>";
        newCell.style.textAlign = "center";
        newCell.className = "no_print";


        document.getElementById("pdt_name").value = "";
        document.getElementById("code").value = "";
        document.getElementById("quantity").value = "";
        document.getElementById("unit").value = "";
        document.getElementById("price").value = "";

        document.getElementById("pdt_name").focus();
    }
</script>

<script>
    function tran() {
        var invoice_no = document.getElementById("invoice_no").innerHTML;
        var date = document.getElementById("date").innerHTML;
        var cus_name = document.getElementById("cus_name").innerHTML;
        var pdt_name = document.getElementById("pdt_name").value;
        var code = document.getElementById("code").value;
        var quantity = document.getElementById("quantity").value;
        var unit = document.getElementById("unit").value;
        var price = document.getElementById("price").value;
        var amount = document.getElementById("price").value * document.getElementById("quantity").value;
        var payment = document.getElementById("payment").value;

        var final = {
            "invoice_no": invoice_no,
            "date": date,
            "cus_name": cus_name,
            "pdt_name": pdt_name,
            "code": code,
            "quantity": quantity,
            "unit": unit,
            "price": price,
            "amount": amount,
            "payment": payment
        };
        //var a=JSON.stringify(final);
        // console.log(final);
        $.ajax({
            type: "POST",
            url: "../../controller/p_transection_ctrl.php",
            data: final
            //contentType: "application/json; charset=utf-8",
            //dataType: "json"
            /*success: function(data){
                alert(data);
            }*/
        })
    }

</script>

<script>

    function table_tmp() {
        $("#tbl").find("tr:gt(0)").remove();
        $.ajax({
                url: '../../controller/p_transection_ctrl.php',
                type: 'post',
                dataType: 'JSON',
                success: function (response) {
                    // console.log(response);
                    var len = response.length;

                    for (var i = 0; i < len; i++) {
                        var id = response[i].id;
                        var p_code = response[i].pd_code;
                        var p_name = response[i].pd_name;
                        var p_unit = response[i].unit;
                        var p_qun = response[i].quantity;
                        var p_price = response[i].price;
                        var amnt = response[i].amount;

                        var tr_str = "<tr>" +
                            "<td align='center'>" + (i + 1) + "</td>" +
                            "<td align='center'>" + p_code + "</td>" +
                            "<td align='center'>" + p_name + "</td>" +
                            "<td align='center'>" + p_unit + "</td>" +
                            "<td align='center'>" + p_qun + "</td>" +
                            "<td align='center'>" + p_price + "</td>" +
                            "<td align='center'>" + amnt + "</td>" +
                            "</tr>";


                        $("#tbl").append(tr_str);

                    }
                }

            }
        )
    }

</script>

<script>
    function sum() {
        var post_key = {"amnt": "amnt"};
        $.ajax({
                url: '../../controller/p_transection_ctrl.php',
                type: 'post',
                data: post_key,
                //dataType: 'JSON',
                success: function (sum) {
                    //alert(sum);
                    var sum_amount = parseInt(sum);
                    var vat = sum_amount * (5 / 100);
                    var total = sum_amount + (sum_amount * (5 / 100));
                    document.getElementById("total").innerHTML = sum_amount;
                    document.getElementById("vat").innerHTML = vat;
                    document.getElementById("n_tot").innerHTML = total;

                    document.getElementById("discount").value = "";

                    var th = ['', 'thousand', 'million', 'billion', 'trillion'];

                    var dg = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
                    var tn = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];
                    var tw = ['twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];

                    function toWords(s) {
                        s = s.toString();
                        s = s.replace(/[\, ]/g, '');
                        if (s != parseFloat(s)) return 'not a number';
                        var x = s.indexOf('.');
                        if (x == -1) x = s.length;
                        if (x > 15) return 'too big';
                        var n = s.split('');
                        var str = '';
                        var sk = 0;
                        for (var i = 0; i < x; i++) {
                            if ((x - i) % 3 == 2) {
                                if (n[i] == '1') {
                                    str += tn[Number(n[i + 1])] + ' ';
                                    i++;
                                    sk = 1;
                                } else if (n[i] != 0) {
                                    str += tw[n[i] - 2] + ' ';
                                    sk = 1;
                                }
                            } else if (n[i] != 0) {
                                str += dg[n[i]] + ' ';
                                if ((x - i) % 3 == 0) str += 'hundred ';
                                sk = 1;
                            }
                            if ((x - i) % 3 == 1) {
                                if (sk) str += th[(x - i - 1) / 3] + ' ';
                                sk = 0;
                            }
                        }
                        if (x != s.length) {
                            var y = s.length;
                            str += 'point ';
                            for (var i = x + 1; i < y; i++) str += dg[n[i]] + ' ';
                        }
                        return str.replace(/\s+/g, ' ');
                    }

                    var word = toWords(total) + " Only";
                    document.getElementById("in_word").innerHTML = word;


                }

            }
        )
    }
</script>
<script>
    function save() {
        var post_key = {"save": "save"};
        $.ajax({
                url: '../../controller/p_transection_ctrl.php',
                type: 'post',
                data: post_key,
                //dataType: 'JSON',
                success: function (msg) {
                    if (msg === 'success') {
                        location.reload(true);
                    }
                    //alert(sum);

                }

            }
        )
    }
</script>

<script>
    (function () {
        document.addEventListener('keypress', function (event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                document.getElementById("insert").click();
                //alert("ok");
            }
        });
    }());
</script>

<script>
    function total_tran() {
        var invoice_no = document.getElementById("invoice_no").value;
        var trn = document.getElementById("trn").value;
        var date = document.getElementById("date").value;
        var cus_name = document.getElementById("cus_name").value;
        var total = document.getElementById("total").innerText;
        var vatt = document.getElementById("vat").innerText;
        var discount = document.getElementById("discount").value;
        var net_total = document.getElementById("n_tot").innerText;
        var payment = document.getElementById("payment").value;

        var data = {
            "invoice_no": invoice_no,
            "trn": trn,
            "date": date,
            "cus_name": cus_name,
            "total": total,
            "vatt": vatt,
            "discount": discount,
            "net_total": net_total,
            "payment": payment
        };

        //var a=JSON.stringify(final);
        console.log(data);
        $.ajax({
            type: "POST",
            url: "../../controller/p_cus_total_tran_ctrl.php",
            data: data
            //contentType: "application/json; charset=utf-8",
            //dataType: "json"
            /*success: function(data){
                alert(data);
            }*/
        })
    }
</script>
<script>
    function getId(element) {

        var rowNUm = element.parentNode.parentNode.rowIndex;
        //var coNum = element.element.parentNode.cellIndex;

        var pdt = document.getElementById("pd" + rowNUm).innerHTML;
        document.getElementById("prdt_name").innerHTML = pdt;
        document.getElementById("rownum").innerHTML = rowNUm;

        //alert(pdt);
    }

    function delete_tmp() {
        var pdt = document.getElementById("prdt_name").innerHTML;

        var row = document.getElementById("rownum").innerHTML;
        document.getElementById("tbl").deleteRow(row);

        serial-=1;

        var post_key = {"pdt_dlt": pdt};
        console.log(post_key);
        $.ajax({
                url: '../../controller/p_cus_total_tran_ctrl.php',
                type: 'post',
                data: post_key,
                //dataType: 'JSON',
                success: function (msg) {
                    console.log(msg);
                    //alert(sum);

                }

            }
        )
    }

    function rowss() {
        var table = document.getElementById("tbl");
        for (var i = 1, row; row = table.rows[i]; i++) {
            row.cells[0].innerHTML=i;
            serial=i;
            if (serial > 24) {
                document.getElementById('insert').disabled = true;
            }
            else {document.getElementById('insert').disabled = false;}
        }

    }

</script>

<script>
    function discount() {
        var total=parseInt(document.getElementById("total").innerText);
        var vat=parseInt(document.getElementById("vat").innerText);
        var n_tot=total + vat;
        var dis=parseInt(document.getElementById("discount").value);

        var n_total=n_tot-dis;

        document.getElementById("n_tot").innerText=n_total.toString();
        //console.log(n_total);


    }

</script>


</body>
</html>