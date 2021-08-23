<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');

class Bus
{
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function insertBus($busPlateNo,$type)
    {
        if (empty($busPlateNo)  ||  empty($type))
        {
            $busmsg="Any Filed must not be empty!";
            return $busmsg;
        }else
        {
            $query="select *from vehicle where plateNo='$busPlateNo'";
            $result=$this->db->select($query);
            if($result==false)
            {
                $InsertQuery="INSERT INTO vehicle(plateNo,type) VALUES('$busPlateNo','$type')";
                $InsertResult=$this->db->insert($InsertQuery);
                if($InsertResult)
                {
                    $busmsg="Vehicle Inserted..";
                    return $busmsg;
                }
            }
            else
            {
                $busmsg="Vehicle Alreadly Exists!";
                return $busmsg;
            }
        }
    }

    public function updateBus($busPlateNo,$type,$id)
    {
        if (empty($busPlateNo) ||  empty($type))
        {
            $busmsg="Any Filed must not be empty!";
            return $busmsg;
        }else
        {

            $query2="select *from vehicle where plateNo='$busPlateNo'";
            $resultPlateNo=$this->db->select($query2);

            if($resultPlateNo)
            {
                $InsertQuery = "update vehicle set type='$type' where id='$id'";
                $InsertResult = $this->db->insert($InsertQuery);
                if ($InsertResult)
                {
                    $busmsg = "Vehicle Plate No Already Exist So Only Other Info Updated..";
                    return $busmsg;
                }
            }else
            {
                $InsertQuery = "update vehicle set plateNo='$busPlateNo',type='$type' where id='$id'";
                $InsertResult = $this->db->insert($InsertQuery);
                if ($InsertResult)
                {
                    $busmsg = "Vehicle Updated..";
                    return $busmsg;
                }
            }

        }
    }

    public function getById($id)
    {
        $query="select *from vehicle where id='$id'";
        $result=$this->db->select($query);
        return $result;
    }

    public function getVendorById($id)
    {
        $query="select *from vendor where id='$id'";
        $results=$this->db->select($query);
        $result=$results->fetch_assoc();
        return $result['name'];
    }

    public function getByBusNo($busNo)
    {
        $query="select *from tb_bus where bus_no='$busNo'";
        $result=$this->db->select($query);
        if($result!=false)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
    public function getByBusPlateNo($busPlateNo)
    {
        $query="select *from tb_bus where bus_plateNo='$busPlateNo'";
        $result=$this->db->select($query);
        if($result!=false)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }

    public function getAlBuses()
    {
        $query="select *form vehicle";
        $result=$this->db->select($query);
        return $result;
    }

    public function getByAll()
    {
        $query="select * From vehicle";
        $result=$this->db->select($query);
        return $result;

    }

   public function deleteAll()
   {
       $query="TRUNCATE vehicle";
       $result=$this->db->delete($query);
       if($result)
       {
           $msg="<span class='sucess'>vehicle Delete..!</span>";
           return $msg;
       }else
       {
           $msg="<span class='error'>vehicle Your Driver..!</span>";
           return $msg;
       }
   }
   public function deleteBus($id)
    {
        $query="DELETE FROM vehicle where id='$id'";
        $result=$this->db->delete($query);
        if($result)
        {
            $msg="<span class='sucess'>vehicle Delete..!</span>";
            return $msg;
        }else
        {
            $msg="<span class='error'>Check Your vehicle..!</span>";
            return $msg;
        }

    }

    //view expense

    public function GetMyExpense()
    {
        $query="select expense.* ,vehicle.plateNo,vehicle.type,tb_driver.driver_name   From expense  
    INNER JOIN vehicle ON expense.vehicle=vehicle.id
     INNER JOIN tb_driver ON expense.driver=tb_driver.driver_id";
        $result=$this->db->select($query);
        return $result;

    }

    public function delExpense($id)
    {
        $query="DELETE FROM expense where id='$id'";
        $result=$this->db->delete($query);
        if($result)
        {
            $msg="<span class='sucess'>expense Delete..!</span>";
            return $msg;
        }else
        {
            $msg="<span class='error'>Check Your expense..!</span>";
            return $msg;
        }
    }



}

?>