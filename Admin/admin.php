<?php
session_start();
if(!isset($_SESSION['aid'])){
 header("location:index.php"); 
}
?>



<style type="text/css"> 
body {
  background: url('../img/bg.jpg');
  background-repeat: no-repeat;
  background-size: 100%;
  margin-top: 0px;
}

/* Table 2 Style */
table.table2{
    
     font-style: normal;
    font-weight: normal;
    letter-spacing: -1px;
    line-height: 1.2em;
    border-collapse:collapse;
    text-align:center;
}
.table2 thead th, .table2 tfoot td{
       color:#fff;
    background-color:#222;
    font-weight:normal;
    border-right:1px dotted #666;
    border-top:3px solid #666;
    -moz-box-shadow:0px -1px 4px #000;
    -webkit-box-shadow:0px -1px 4px #000;
    box-shadow:0px -1px 4px #000;
    text-shadow:1px 1px 1px #000;
}
.table2 tfoot th{
    padding:10px;
    font-size:18px;
    text-transform:uppercase;
    color:#888;
}
.table2 tfoot td{
      color:#EF870E;
    border-top:none;
    border-bottom:3px solid #666;
    -moz-box-shadow:0px 1px 4px #000;
    -webkit-box-shadow:0px 1px 4px #000;
    box-shadow:0px 1px 4px #000;
}
.table2 thead th:empty{
    background:transparent;
    -moz-box-shadow:none;
    -webkit-box-shadow:none;
    box-shadow:none;
}
.table2 thead :nth-last-child(1){
    border-right:none;
}
.table2 thead :first-child,
.table2 tbody :nth-last-child(1){
    border:none;
}
p{
color: #ffffff;
}
.table2 tbody th{
    text-align:right;
    padding:10px;
    color:#333;
    text-shadow:1px 1px 1px #ccc;
    background-color:#f9f9f9;
}
.table2 tbody td{
    padding:10px;
    background-color:#f0f0f0;
    border-right:1px dotted #999;
    text-shadow:-1px 1px 1px #fff;
        color:#333;
}
.table2 tbody span.check::before{
    content : url(../images/check1.png)
}


</style>
<style type="text/css">
<!--
table.table2 {    
     font-style: normal;
    font-weight: normal;
    letter-spacing: -1px;
    line-height: 1.2em;
    border-collapse:collapse;
    text-align:center;
}
-->
</style>
<link href="../css/flat-ui.css" rel="stylesheet">

        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<center>

          <img height="" width="" src="../img/logo.png">
<br><a href="logout.php">Logout</a>
   <div class="row">
                    <div class="col-xs-12">
                <div class="col-xs-2">
                  .
</div>
                <div class="col-xs-4">
                  <img src="../images/icons/png/Clipboard.png">
                  <div class="row">
                    <div class="col-xs-12">
                      <h2><a href="book.php" class="btn btn-embossed btn-primary">Add Notification</a></h2>
                    </div>
                  </div>
                </div>
                <div class="col-xs-4">
                  <img src="../images/icons/png/Pensils.png">
                   <div class="row">
                    <div class="col-xs-12">
                   <h2><a href="assig.php" class="btn btn-embossed btn-primary">Add Assignments</a></h2>
                    </div>
                  </div>
                </div>
              </div>
<div class="col-xs-2">
                  .
</div>
</div>
