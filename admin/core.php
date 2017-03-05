<?php
session_start();

function loggedin()
{
  if(isset($_SESSION['uname'])&&!empty($_SESSION['uname']))
    return true;
  else
  {
    return false;
  }
}

function loggedinadm()
{
  if(isset($_SESSION['unameadm'])&&!empty($_SESSION['unameadm']))
    return true;
  else
  {
    return false;
  }
}

function loggedinfac()
{
  if(isset($_SESSION['unamefac'])&&!empty($_SESSION['unamefac']))
    return true;
  else
  {
    return false;
  }
}

//function onln($uname)
//{
  //$query="SELECT COUNT(*) from online where username='$uname'";
  //$res=mysql_query($query);
  //$rows=mysql_result($res,0,'COUNT(*)');
  //if ($rows==0) return false;
 // else if($rows==1) return true;
//}

/*unction getfield($field)
{
  $query="SELECT $field from user_in where id='".@$_SESSION['uname']."';";
if($query_res=@mysql_query($query))
  {if($fieldres=@mysql_result($query_res,0,$field))
    {
    return $fieldres;
    }
  }
} */

?>