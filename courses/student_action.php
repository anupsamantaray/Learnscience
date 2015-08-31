<?php
include_once("../function.php");
if(isset($_POST['submit']))
{
     if ($_SESSION['slno'])
     {
        $slno=$_SESSION['slno'];
        $phone=htmlentities($_REQUEST['phone']);
        $pass=htmlentities($_REQUEST['pass']);
        $confirm=htmlentities($_REQUEST['confirm']);
        $current=htmlentities($_REQUEST['current']);
        $level=htmlentities($_REQUEST['level']);
        
        
        $fetch=mysql_query("select * from `login` where `slno`='$slno'");
        $res=mysql_fetch_array($fetch);
        $currentpass=$res['password'];
        if($level=="")
        {
           $level=$res['level'];  
        }
        //echo "update `login` set `level`='$level' where `slno`='$slno'";
         mysql_query("update `login` set `level`='$level' where `slno`='$slno'")or die(mysql_query());
        if($pass==$confirm && $currentpass==$current)
        {
            //echo "update `login` set `phone`='$phone',`pass`='$pass' where `slno`='$slno'";
        mysql_query("update `login` set `phone`='$phone',`password`='$pass',`level`='$level' where `slno`='$slno'")or die(mysql_query());
        $msg="sucessfully updated";
        }else{ $msg="Enter correct Data";}
     }
}
header("location:student_detail.php?msg=$msg");
?>