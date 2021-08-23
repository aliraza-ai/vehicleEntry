<?php
include_once ('Entery.php');

class report
{
    public function singleReport($date)
    {
        $entry=new Entery();
        $result=$entry->getByDate($date);
        if($result)
        {
            return $result;
        }else
        {
            return false;
        }
    }
    public function bothReport($sDate,$eDate)
    {
        $entry=new Entery();
        $result=$entry->getByBothDate($sDate,$eDate);
        if($result)
        {
            return $result;
        }else
        {
            return false;
        }
    }
}

?>