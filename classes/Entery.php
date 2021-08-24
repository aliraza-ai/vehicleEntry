<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../classes/Bus.php');
include_once ($filepath.'/../classes/Driver.php');
class Entery
{
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }

    public function addJob($driver,$vendor,$refcompany,$vehicle,$pulocation,$dolocation,$jobprice,$expenseprice,$customer,$inDate,$inTime,$outTime,$totalHours,$extraHours,$cash,$serviceType,$remarks)
    {
        $date = new DateTime("now", new DateTimeZone('Asia/Riyadh') );
        date_default_timezone_set("Asia/Riyadh");
        $today=date('Y-m-d');

        if(!$cash)
        {

            $select = "select * from vendorbalance where vendor='$vendor' order by id DESC";
            $result = $this->db->select($select);

            $select1 = "select * from vendorbalance where vendor='$refcompany' order by id DESC";
            $ref = $this->db->select($select1);

            if($ref)
            {
                $reff = $ref->fetch_assoc();
                $bb = $reff['openBalance'] + $expenseprice;
                $select1 = "INSERT INTO `vendorbalance`(`entryDate`,`date`, `vendor`, `detail`, `amount`, `openBalance`,`status`,`time`) VALUES ('$today','$inDate','$refcompany','Trip','$expenseprice','$bb','2','$inTime')";
                $result1 = $this->db->insert($select1);
            }else
            {
                $bb = 0 + $expenseprice;
                $select1 = "INSERT INTO `vendorbalance`(`entryDate`,`date`, `vendor`, `detail`, `amount`, `openBalance`,`status`,`time`) VALUES ('$today','$inDate','$refcompany','Trip','$expenseprice','$bb','2','$inTime')";
                $result1 = $this->db->insert($select1);
            }


            if($result)
              {
                $data = $result->fetch_assoc();
                $b = $data['openBalance'] + $expenseprice;


                $select = "INSERT INTO `vendorbalance`(`entryDate`,`date`, `vendor`, `detail`, `amount`, `openBalance`,`status`,`time`) VALUES ('$today','$inDate','$vendor','Trip','$expenseprice','$b','2','$inTime')";
                $result = $this->db->insert($select);



            } else
            {
                $b = 0 + $expenseprice;

                $select = "INSERT INTO `vendorbalance`(`entryDate`,`date`, `vendor`, `detail`, `amount`, `openBalance`,`status`,`time`) VALUES ('$today','$inDate','$vendor','Trip','$expenseprice','$b','2','$inTime')";
                $result = $this->db->insert($select);

            }

            $insert="INSERT INTO job(date,driver,vendor,refcompany,vehicle,InDate,InTime,OutTime,customer,totalhours,pulocation,dolocation,jobprice,expenseprice,status,extraHours,cash,serviceType,remarks)
VALUES('$today','$driver','$vendor','$refcompany','$vehicle','$inDate','$inTime','$outTime','$customer','$totalHours','$pulocation','$dolocation','$jobprice','$expenseprice','0','$extraHours','$cash','$serviceType','$remarks')";
            $RE=$this->db->insert($insert);
        }
        else
        {

            $insert="INSERT INTO job(date,driver,vendor,refcompany,vehicle,InDate,InTime,OutTime,customer,totalhours,pulocation,dolocation,jobprice,expenseprice,status,extraHours,cash,serviceType,remarks)
VALUES('$today','$driver','$vendor','$refcompany','$vehicle','$inDate','$inTime','$outTime','$customer','$totalHours','$pulocation','$dolocation','$jobprice','$expenseprice','0','$extraHours','$cash','$serviceType','$remarks')";
            $RE=$this->db->insert($insert);
        }



        if($RE)
        {
            $entrymsg = "Job Entry Noted..";
            return $entrymsg;
        }else
        {
            $entrymsg = "Job Not Note!";
            return $entrymsg;
        }


    }

    public function update($driver,$vendor,$refcompany,$vehicle,$pulocation,$dolocation,$jobprice,$expenseprice,$customer,$inDate,$inTime,$outTime,$totalHours,$extraHours,$id,$cash,$serviceType,$remarks,$myId)
    {

            $insert="update job set driver='$driver',vehicle='$vehicle',InDate='$inDate',InTime='$inTime',OutTime='$outTime',customer='$customer',totalhours='$totalHours',pulocation='$pulocation',dolocation='$dolocation',jobprice='$jobprice',expenseprice='$expenseprice' ,extraHours='$extraHours', cash='$cash',serviceType='$serviceType', remarks='$remarks' where id='$id'";
            $RE=$this->db->update($insert);

        if($RE)
        {
            $entrymsg = "Update Job...";
            return $entrymsg;

        }else
        {
            $entrymsg = "Job Not Note!";
            return $entrymsg;
        }


    }


    function getAllEntry()
    {
        $query="select * from job order by id DESC";
        $result=$this->db->select($query);
        return $result;

    }
    function getAllEntryActive()
    {
        $query="select * from job where status='0'";
        $result=$this->db->select($query);
        return $result;

    }
    function getEntryById($id)
    {
        $query="select * from job where id='$id'";
        $result=$this->db->select($query);
        return $result;
    }
    function getDriverById($id)
    {
        $query="select * from tb_driver where driver_id='$id'";
        $result=$this->db->select($query);
        $res=$result->fetch_assoc();
        return $res['driver_name'];
    }
    function getVehicleTypeById($id)
    {
        $query="select * from vehicle where id='$id'";
        $result=$this->db->select($query);
        $res=$result->fetch_assoc();
        return $res['type'];
    }
    function getVendorById($id)
    {
        $query="select * from vendor where id='$id'";
        $result=$this->db->select($query);
        $res=$result->fetch_assoc();
        return $res['name'];
    }
    function getVendorAll()
    {
        $query="select * from vendor";
        $result=$this->db->select($query);
        return $result;
    }
    function getVeichleById($id)
    {
        $query="select * from vehicle where id='$id'";
        $result=$this->db->select($query);
        $res=$result->fetch_assoc();
        return $res['plateNo'];
    }

    function getDriverByVehicle($id)
    {
        $query="select * from vehicle where id='$id'";
        $result=$this->db->select($query);
        $res=$result->fetch_assoc();
        return $res['plateNo'];
    }
    function getVendorByVehicle($id)
    {
        $query="select * from vehicle where id='$id'";
        $result=$this->db->select($query);
        $res=$result->fetch_assoc();
        return $res['vendor'];
    }

    function getVendorAllVehicles($id)
    {
        $query="select * from vehicle where vendor='$id'";
        $result=$this->db->select($query);
        return $result;
    }


    public function getByAllEntry()
    {
        $query="SELECT *FROM tb_entry";
        $result=$this->db->select($query);
        return $result;
    }
    public function getEntryByRouteNO($routeNo)
    {
        $query="SELECT *FROM tb_entry WHERE bus_Route_No='$routeNo'";
        $result=$this->db->select($query);
        return $result;
    }
    public function getEntryByBusNo($busNo)
    {
        $query="SELECT *FROM tb_entry WHERE bus_No='$busNo'";
        $result=$this->db->select($query);
        return $result;
    }
    public function getEntryByDriver($driver)
    {
        $query="SELECT *FROM tb_entry WHERE bus_driver='$driver'";
        $result=$this->db->select($query);
        return $result;
    }
    public function getByDate($date)
    {
        $query="SELECT *FROM tb_entry where Entry_Out_Date='$date'";
        $result=$this->db->select($query);
        return $result;
    }
    public function getByBothDate($sdate,$edate)
    {
        $query="SELECT *FROM tb_entry where Entry_Out_Date>='$sdate' && Entry_Out_Date<='$edate'";
        $result=$this->db->select($query);
        if($result)
        return $result;
        else return false;
    }
    public function getById($id)
    {
        $query="SELECT *FROM tb_entry WHERE entry_id='$id'";
        $result=$this->db->select($query);
        return $result;
    }
    public function getByAll()
    {
        $query="select tb_entry .*,tb_bus.bus_No,tb_bus.bus_plateNo From tb_entry INNER JOIN tb_bus ON tb_entry.bus_id=tb_bus.bus_id";
        $result=$this->db->select($query);
        return $result;
    }
    public function updateEntry($busNo,$driverName,$RouteAddress,$outDate,$InDate,$busPlateNo,$routeNo,$outTime,$InTime,$id,$cnic)
    {
        $query="update tb_entry set bus_No='$busNo', bus_Driver='$driverName', bus_route_address='$RouteAddress',Entry_Out_Date='$outDate',Entry_In_Date='$InDate',bus_plateNo='$busPlateNo',bus_Route_No='$routeNo',OutTime='$outTime',driver_cnic='$cnic',InTime='$InTime' WHERE entry_id='$id'";
        $result=$this->db->update($query);
        if($result)
        {
            $entrymsg = "Entry Updated..";
            return $entrymsg;
        }else
        {
            $entrymsg = "Entry Not Updated..";
            return $entrymsg;
        }
    }


    function delBalance($id)
    {
        $query="DELETE FROM vendorbalance where id='$id'";
        $result=$this->db->delete($query);

        $query1="DELETE FROM vendorbalance where id='$id'";
        $result1=$this->db->delete($query1);
        $result2=$result1->fetch_assoc();

        if($result)
        {
            $query="SELECT * FROM vendorbalance where vendor > '$id'";
            $result=$this->db->select($query);

            if($result)
            {
                while($get=$result->fetch_assoc())
                {


                    if($get['status']==1)
                    {
                        $openBlanace=$get['openBalance']+$result2['amount'];
                    }else
                    {
                        $openBlanace=$get['openBalance']-$result2['amount'];
                    }

                    $id=$get['id'];
                    $update="update vendorbalance set openBalance='$openBlanace' where id='$id' ";
                    $up=$this->db->update($update);

                }
            }

        }
    }

   public function deleteEntry($id)
    {

            $query="SELECT * FROM job where id='$id'";
            $result=$this->db->select($query);

            $get=$result->fetch_assoc();
            $price=$get['jobprice'];
            $vender=$get['vendor'];
            $refcompany=$get['refcompany'];
            $date=$get['date'];
            $time=$get['InTime'];

            $query="DELETE FROM job where id='$id'";
            $result=$this->db->delete($query);

            $query="SELECT * FROM vendorbalance where vendor = '$vender' && entryDate='$date' && time='$time'";
            $resultc=$this->db->select($query);



            $query1="SELECT * FROM vendorbalance where vendor = '$refcompany' && entryDate='$date' && time='$time'";
            $result1=$this->db->select($query1);

            if($resultc)
            {
                $cc=$resultc->fetch_assoc();
                $myId1=$cc['id'];

                $query11="DELETE FROM vendorbalance where id='$myId1'";
                $this->db->delete($query11);

                $q="SELECT * FROM vendorbalance where id > '$myId1' && vendor = '$vender'";
                $rr1=$this->db->select($q);
                if($rr1) {

                    while ($getv = $rr1->fetch_assoc()) {
                        $openBlanace = $getv['openBalance'] - $price;
                        $id = $getv['id'];
                        $update = "update vendorbalance set openBalance='$openBlanace' where id='$id' ";
                        $up = $this->db->update($update);
                    }
                }
            }
            if($result1)
            {
                $cc1=$result1->fetch_assoc();
                $myId2=$cc1['id'];

                $query12="DELETE FROM vendorbalance where id='$myId2'";
                $this->db->delete($query12);

                $q1="SELECT * FROM vendorbalance where id > '$myId2' && vendor = '$refcompany'";
                $rr2=$this->db->select($q1);
                if($rr2)
                {

                while($get1=$rr2->fetch_assoc())
                {
                    $openBlanace1=$get1['openBalance']-$price;
                    $id1=$get1['id'];
                    $update1="update vendorbalance set openBalance='$openBlanace1' where id='$id1' ";
                    $up1=$this->db->update($update1);

                }

                }










            $msg="<span class='sucess'>Entry Delete..!</span>";
            return $msg;
        }else
        {
            $msg="<span class='error'>error Entry Not Deleted..!</span>";
            return $msg;
        }

    }

    function personalReport($parameter,$startDate,$endDate)
    {

            $query="SELECT * from job where date>='$startDate' && date<='$endDate';";
            $RE=$this->db->select($query);
            return $RE;

    }

    function getVendorReport($parameter,$startDate,$endDate)
    {


         $query="SELECT * from job where date>='$startDate' && date<='$endDate' && vendor='$parameter' ";
         $RE=$this->db->select($query);
         return $RE;

    }

    function getRefVendor($parameter,$startDate,$endDate)
    {


        $query="SELECT * from job where date>='$startDate' && date<='$endDate' && vendor='$parameter' ";
        $RE=$this->db->select($query);
        return $RE;

    }

    function VehicleReport($parameter,$startDate,$endDate)
    {

        $query="SELECT job.*, tb_driver.driver_name, vehicle.vendor,vehicle.plateNo,vehicle.type
FROM job
INNER JOIN tb_driver ON job.driver=tb_driver.driver_id
INNER JOIN vehicle ON job.vehicle=vehicle.id where InDate>='$startDate' && InDate<='$endDate' && vehicle='$parameter'";
        $RE=$this->db->select($query);
        return $RE;



    }


    function VendorReport($parameter,$startDate,$endDate)
    {

        $query="SELECT job.*, tb_driver.driver_name, vehicle.vendor,vehicle.plateNo,vehicle.type
FROM job
INNER JOIN tb_driver ON job.driver=tb_driver.driver_id
INNER JOIN vehicle ON job.vehicle=vehicle.id where InDate>='$startDate' && InDate<='$endDate' && vehicle='$parameter'";
        $RE=$this->db->select($query);
        return $RE;



    }


    function getStatement($vendor,$startDate,$endDate)
    {
        $query="SELECT vendorbalance.*,vendor.name FROM vendorbalance
        INNER JOIN vendor ON vendorbalance.vendor=vendor.id where entryDate>='$startDate' && entryDate<='$endDate' && vendor='$vendor'";
        $RE=$this->db->select($query);
        return $RE;

    }

    function getExpense($date,$eDate)
    {
        $query="SELECT * FROM expense where date>='$date' && date<='$eDate'";
        $result=$this->db->select($query);
        return $result;
    }



}
?>