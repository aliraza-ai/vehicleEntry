<?php
$filepath=realpath(dirname(__FILE__)); 
include_once ($filepath.'/../lib/session.php');
session::checkLogin();
include_once ($filepath.'/../lib/database.php');
class adminlogin 
{   private $db;
	function __construct()
	{
		$this->db=new Database();
	}
	public function adminLogin($adminUser,$adminPass)
    {
        if (empty($adminUser) || empty($adminPass))
        {
            $loginmsg="Username or Password must not be empty!";
            return $loginmsg;
        }else
        {
         $query="select *from tb_user where user_name='$adminUser' AND user_password='$adminPass'";
         $result=$this->db->select($query);
         if($result!=false)
         {
             $value=$result->fetch_assoc();
             session::set("adminlogin",true);
             session::set("adminUser",$value['user_name']);
             session::set("adminId",$value['user_id']);
             session::set("adminPass",$value['user_password']);
             header("Location:dashboard.php");
           
         }
         else
             {
                 $loginmsg="Username or Password are Not Valid!";
                 return $loginmsg;
             }
        }


    }
}


?>