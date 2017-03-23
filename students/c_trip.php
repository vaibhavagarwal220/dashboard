   <?php


  require 'connect.php' ;
  require 'core.php' ;
  
if(isset($_POST['depdate'])&&isset($_POST['dest']))
{
  $dte=date('Y-m-d',strtotime($_POST['depdate']));
  $dest=$_POST['dest'];
  if(!empty($dte)&&!empty($dest))
  {

$sql = "INSERT INTO trips(ROLLNO,dest,doj) VALUES('".$_SESSION['uname']."','".$dest."','".$dte."')";
         
        if($result = $db->query($sql))
          header("Location:depart.php"); 
        else header("Location:planatrip.php");       

  }
  else header("Location:planatrip.php");

}
else header("Location:planatrip.php");

?>
