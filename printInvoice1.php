<?php
include_once ('classes/Entery.php');
include 'lib/session.php';
Session::CheckSession();
//if ($_GET['date']==NULL ) {
//  //  echo "<script>window.location='entryReport.php'</script>";
//}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Statement Report</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
        body
        {
            font-family: Arial, Helvetica, sans-serif;
            padding: 20px;

        }

        .title
        {
            text-align: center;
        }
        h2,h4
        {
            margin-bottom: 0px;
            padding-bottom: 0px;
        }
        h4
        {
            margin-top: 10px;
        }

        tr
        {
            text-align: left;

        }
        .c th
        {
            border-top: 2px solid black;
            border-bottom: 2px solid black;
            font-size: 11px;
        }
        .my
        {
            border-bottom: 1px dotted  silver;
            font-size: 13px;
        }
        .end
        {
            border-top: 2px solid black;
            border-bottom: 2px solid   black;
            font-size: 11px;

        }
        tr td:last-child {
            border-bottom:none;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 2px;
            text-align: left;

        }
        b
        {
            font-size: 12px;
        }
        .ss
        {

        }
        .sign
        {
            margin-top: 9%;
        }

        p{
            margin: 0px;
            font-size: 14px;

        }
    </style>
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div style="">
    <input id="printpagebutton" type="button" value="Print Report"  onclick="printpage()"/>

<!--    --><?php
//    $date=$_GET['date'];
//    $eDate=$_GET['eDate'];
//    $parameter=$_GET['p'];
//    $q=$_GET['q'];
//    ?>
    <h3></h3>
<p><?php // if($eDate==null){ $ydate=date_create($date); $xdate=date_format($ydate,"m/d/y"); echo "Starting From: $xdate <br>To: $xdate";}else { $ydate=date_create($date); $xdate=date_format($ydate,"m/d/y"); $idate=date_create($eDate); $uDate=date_format($idate,"m/d/y"); echo "From:&nbsp; $xdate <br> To: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$uDate";}  ?> </p>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <img src="img/logo.png" width="100" height="100">
        </div>
        <div class="col-6 text-right">
            <p>Invoice</p>
            <p><b style="font-size: 15px;">Royal Smart Limousine LLC</b></p>
            <p>Dubai, UAE</p>
            <p>zafar.royal1980@gmail.com</p>
        </div>
    </div>


    <div class="row" style="background-color: ">
        <div class="col-6">

        </div>
        <div class="col-6 text-right">

        </div>
    </div>

</div>



<table width="100%">
    <tr class="c">
        <th style="padding-left: 5px;">Date</th>
        <th>Vehicle Type</th>
        <th>Driver</th>
        <th>Ref. Company</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>PU Location</th>
        <th>DO Location</th>
        <th>Hours</th>
        <th>Extra Hours</th>
        <th>Guest Name</th>
        <th>Job Price</th>
        <th>Give Price</th>
        <th>Cash</th>
        <th>Remarks</th>
    </tr>

 <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    <tr class="end">

    </tr>





</table>
<br>
<br>
<script>
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden'
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        printButton.style.visibility = 'visible';
    }
</script>

</body>
</html>
