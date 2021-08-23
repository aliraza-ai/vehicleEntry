<?php
include_once ('classes/Entery.php');
include 'lib/session.php';
Session::CheckSession();
if ($_GET['date']==NULL ) {
  //  echo "<script>window.location='entryReport.php'</script>";
}
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
    </style>
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div style="">
    <input id="printpagebutton" type="button" value="Print Report"  onclick="printpage()"/>
<h3>Statement</h3>
    <br>
    <?php
    $date=$_GET['date'];
    $eDate=$_GET['eDate'];
    $parameter=$_GET['p'];
    ?>
    <h3><?php
        $e=new Entery();
       echo $e->getVendorById($parameter);

        ?></h3>
<p><?php if($eDate==null){ $ydate=date_create($date); $xdate=date_format($ydate,"m/d/y"); echo "Starting From: $xdate <br>To: $xdate";}else { $ydate=date_create($date); $xdate=date_format($ydate,"m/d/y"); $idate=date_create($eDate); $uDate=date_format($idate,"m/d/y"); echo "From:&nbsp; $xdate <br> To: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$uDate";}  ?> </p>
</div>
<table width="100%">
    <tr class="c">
        <th style="padding-left: 5px;">S.No.</th>
        <th>Transaction Date</th>
        <th>Trip Date</th>
        <th>Description</th>
        <th>Debit</th>
        <th>Credit</th>
        <th>Balance</th>
    </tr>

    <?php
    $totald=0;
    $totalc=0;
    $balance=0;
            $s=$e->getStatement($parameter,$date,$eDate);
            if($s)
            {
                while ( $stm=$s->fetch_assoc())
                {
                    $balance=$stm['openBalance'];


    ?>
        <tr class="my">
            <td style="padding-left: 5px; min-width: 70px;"><?php echo $stm['id']; ?></td>
            <td style="min-width: 70px;"><?php $exdate=date_create($stm['entryDate']);  echo date_format($exdate,"d-m-Y"); ?></td>
            <td style="min-width: 70px;"><?php $exdate=date_create($stm['date']);  echo date_format($exdate,"d-m-Y"); ?></td>
            <td style="min-width: 130px;"><?php echo $stm['detail']; ?></td>
            <?php
            if($stm['status']==1)
            {
                $totald=+$stm['amount'];
            ?>
            <td style="min-width: 100px;"><?php echo $stm['amount']; ?></td>
            <?php
            }else
            {
            ?>
            <td style="min-width: 100px;"></td>
            <?php
            }
            ?>
            <?php
            if($stm['status']!=2)
            {

                ?>
                <td style="min-width: 100px;"></td>
                <?php
            }else
            {
                $totalc=+$stm['amount'];
                ?>
                <td style="min-width: 100px;color:red;"><?php echo $stm['amount']; ?></td>
                <?php
            }
            if($stm['status']==2)
            {
            ?>

            <td style="min-width: 100px;color:red;"><?php echo $stm['openBalance']; ?></td>
           <?php  }else{ ?>
            <td style="min-width: 100px;"><?php echo $stm['openBalance']; ?></td>
            <?php } ?>
        </tr>
    <tr>
        <?php

        }
        }
        ?>
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
        <th colspan="3"></th>
        <th colspan="1">Total:<?php echo $totald; ?></th>
        <th colspan="1">Total:<?php echo $totalc; ?></th>
        <th colspan="1">Balance:<?php echo $balance; ?></th>
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
