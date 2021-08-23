<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
class Driver
{
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function insertdriver($driverName,$driverNo)
    {
        if (empty($driverName)  || empty($driverNo))
        {
            $drivermsg="Any Feild must not be empty!";
            return $drivermsg;
        }else {
            $query = "select *from tb_driver where driver_number='$driverNo'";
            $result = $this->db->select($query);

          if($result==false)
            {
                $InsertQuery="INSERT INTO tb_driver(driver_name,driver_number,joiningdate) VALUES('$driverName','$driverNo',NOW())";
                $InsertResult=$this->db->insert($InsertQuery);
                if($InsertResult)
                {
                    $drivermsg="Driver Inserted..";
                    return $drivermsg;
                }
            }
            else
            {

                    $drivermsg="Driver No Alreadly Exists!";
                    return $drivermsg;


            }
        }
    }


    public function updateDriver($id,$driverName,$driverNumber)
    {
        if (empty($driverName) ||empty($driverNumber))
        {
            $drivermsg="DirverNo or DriverName must not be empty!";
            return $drivermsg;
        }else
        {
            $query="select *from tb_driver where driver_number='$driverNumber'";
            $result=$this->db->select($query);


          if($result)
            {
                $InsertQuery="update tb_driver set driver_name='$driverName'  where driver_id='$id'";
                $InsertResult=$this->db->insert($InsertQuery);
                if($InsertResult)
                {
                    $drivermsg="Driver No already Exist Other Things Updated..";
                    return $drivermsg;
                }
            }
            else
            {
                $InsertQuery="update tb_driver set driver_name='$driverName', driver_number='$driverNumber'  where driver_id='$id'";
                $InsertResult=$this->db->insert($InsertQuery);
                if($InsertResult)
                {
                    $drivermsg="Driver Updated..";
                    return $drivermsg;
                }
            }
        }
    }


    public function getByAll()
    {
        $query="select *from tb_driver";
        $result=$this->db->select($query);
        return $result;
    }
    public function getExpense()
    {
        $query="select *from vendorbalance";
        $result=$this->db->select($query);
        return $result;
    }

    public function getById($id)
    {
        $query="select *from tb_driver where driver_id='$id'";
        $result=$this->db->select($query);
        if($result)
        {
            return $result;
        }else false;
    }
    public function getBalanceById($id)
    {
        $query="select * from vendorbalance where id='$id'";
        $result=$this->db->select($query);
        if($result)
        {
            return $result;
        }else false;
    }
    public function getByVId($id)
    {
        $query="select *from vehicle where id='$id'";
        $result=$this->db->select($query);
        if($result)
        {
            return $result;
        }else false;
    }

    public function deleteAll()
    {
        $query="delete From tb_driver";
        $result=$this->db->delete($query);
        $query1="TRUNCATE tb_bus";
        $result1=$this->db->delete($query1);
        if($result==true && $result1==true)
        {
            $msg="<span class='sucess'>Driver Delete..!</span>";
            return $msg;
        }else
        {
            $msg="<span class='error'>Check Your Driver..!</span>";
            return $msg;
        }
    }
    public function deleteDriver($id)
    {
        $query="DELETE FROM tb_driver where driver_id='$id'";
        $result=$this->db->delete($query);
        if($result)
        {
            $msg="<span class='sucess'>Driver Delete..!</span>";
            return $msg;
        }else
        {
            $msg="<span class='error'>Check Your Driver..!</span>";
            return $msg;
        }

    }







    //vendor

    public function insertVendor($name,$company,$contact)
    {
        if (empty($name)  || empty($company) || empty($contact))
        {
            $drivermsg="Any Feild must not be empty!";
            return $drivermsg;
        }else {
            $query = "select *from vendor where contact='$contact'";
            $result = $this->db->select($query);

            if($result==false)
            {
                $InsertQuery="INSERT INTO vendor(name,company,contact) VALUES('$name','$company','$contact')";
                $InsertResult=$this->db->insert($InsertQuery);
                if($InsertResult)
                {
                    $drivermsg="Vendor Inserted..";
                    return $drivermsg;
                }
            }
            else
            {

                $drivermsg="Vendor No Alreadly Exists!";
                return $drivermsg;


            }
        }
    }

    public function getAllVender()
    {
        $query="select *from vendor";
        $result=$this->db->select($query);
        return $result;
    }
    public function getAllVehicle()
    {
        $query="select * from vehicle";
        $result=$this->db->select($query);
        return $result;
    }

    public function deleteVendor()
    {
        $query="delete From vendor";
        $result=$this->db->delete($query);
        $query1="TRUNCATE Vendor";
        $result1=$this->db->delete($query1);
        if($result==true && $result1==true)
        {
            $msg="<span class='sucess'>Driver Delete..!</span>";
            return $msg;
        }else
        {
            $msg="<span class='error'>Check Your Driver..!</span>";
            return $msg;
        }
    }
    public function deleteVonder($id)
    {
        $query="DELETE FROM vendor where id='$id'";
        $result=$this->db->delete($query);
        if($result)
        {
            $msg="<span class='sucess'>Vendor Delete..!</span>";
            return $msg;
        }else
        {
            $msg="<span class='error'>Check Your Vendor..!</span>";
            return $msg;
        }

    }

    public function editBalance($date,$detail,$id)
    {

        $update="update vendorbalance set date='$date', detail='$detail' where id='$id'";
        $this->db->update($update);
        return "Balance Detail Updated";

    }

    public function getVendorById($id)
    {
        $query="select *from vendor where id='$id'";
        $result=$this->db->select($query);
        if($result)
        {
            return $result;
        }else false;
    }

    public function editVendor($name,$company,$contact,$id)
    {
        if (empty($name) ||empty($company) ||empty($contact))
        {
            $drivermsg="Field must not be empty!";
            return $drivermsg;
        }else
        {
            $query="select *from vendor where contact='$contact'";
            $result=$this->db->select($query);


            if($result)
            {
                $InsertQuery="update vendor set name='$name',company='$company'  where id='$id'";
                $InsertResult=$this->db->insert($InsertQuery);
                if($InsertResult)
                {
                    $drivermsg="Vendor No already Exist Other Things Updated..";
                    return $drivermsg;
                }
            }
            else
            {
                $InsertQuery="update vendor set name='$name',company='$company',contact='$contact'  where id='$id'";
                $InsertResult=$this->db->insert($InsertQuery);
                if($InsertResult)
                {
                    $drivermsg="Vendor Updated..";
                    return $drivermsg;
                }
            }
        }
    }


    //for expense
    function insertExpense($date,$vehicle,$driver,$expenseDetail,$amount)
    {
        $res=$this->db->select("select * from vehicle where id='$vehicle'");
        $vendors=$res->fetch_assoc();
        $vendor=$vendors['vendor'];

        $q="INSERT INTO `expense`(`date`, `expense`, `vehicle`, `driver`, `amount`, `vendor`) 
        VALUES ('$date','$expenseDetail','$vehicle','$driver','$amount','$vendor')";
        $result=$this->db->insert($q);
        if($result)
            return "Expense Inserted";

    }

    public function getExpenseById($id)
    {
        $query="select *from expense where id='$id'";
        $result=$this->db->select($query);
        return $result;
    }


    function updateExpense($date,$vehicle,$driver,$expenseDetail,$amount,$id)
    {
        $res=$this->db->select("select * from vehicle where id='$vehicle'");
        $vendors=$res->fetch_assoc();
        $vendor=$vendors['vendor'];
        $query="UPDATE `expense` SET `date`='$date',`expense`='$expenseDetail',`vehicle`='$vehicle',`driver`='$driver',`amount`='$amount',`vendor`='$vendor' WHERE id='$id'";
        $result=$this->db->update($query);
        if($result)
            return "Expense Updated";
        else
            return "Expense Not Updated";
    }


    function addBalance($date,$detail,$vendor,$amount,$status)
    {
        date_default_timezone_set("Asia/Riyadh");
        $today=date('Y-m-d');
        $select="select * from vendorbalance where vendor='$vendor' order by id DESC";
        $result=$this->db->select($select);
        if($result)
        {
            $data=$result->fetch_assoc();
            if($status==1)
            {
                $b=$data['openBalance']-$amount;
                $select="INSERT INTO `vendorbalance`(`entryDate`,`date`, `vendor`, `detail`, `amount`, `openBalance`, `status`) VALUES ('$today','$date','$vendor','$detail','$amount','$b','$status')";
                $result=$this->db->insert($select);
            }else
            {
                $b=$data['openBalance']+$amount;
                $select="INSERT INTO `vendorbalance`(`entryDate`,`date`, `vendor`, `detail`, `amount`, `openBalance`, `status`) VALUES ('$today','$date','$vendor','$detail','$amount','$b','$status')";
                $result=$this->db->insert($select);
            }

            return "Your Balance Added";

        }else
        {
            if($status==1)
            {

                $amount1=0-$amount;
            $select="INSERT INTO `vendorbalance`(`entryDate`,`date`, `vendor`, `detail`, `amount`, `openBalance`, `status`) VALUES ('$today','$date','$vendor','$detail','$amount','$amount1','$status')";
            $result=$this->db->insert($select);
            return "Your Balance Added";
            }else
            {
                $amount1=0+$amount;
                $select="INSERT INTO `vendorbalance`(`entryDate`,`date`, `vendor`, `detail`, `amount`, `openBalance`, `status`) VALUES ('$today','$date','$vendor','$detail','$amount','$amount1','$status')";
                $result=$this->db->insert($select);
                return "Your Balance Added";
            }
        }
    }

    function delBalance($id)
    {
        $query1="select * FROM vendorbalance where id='$id'";
        $result1=$this->db->delete($query1);
        $result2=$result1->fetch_assoc();

        $query="DELETE FROM vendorbalance where id='$id'";
        $result=$this->db->delete($query);



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


}

?>