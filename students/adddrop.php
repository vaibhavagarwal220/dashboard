   <?php


  require 'connect.php' ;
  require 'core.php' ;
  
  if(!loggedin())
  {
    header('Location:studentlogin.php');
  }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
<?php include 'include.inc.php';?>

   
    </head>

 
  <body >

<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">IIT Mandi</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. -->
      <nav class="mdl-navigation mdl-layout--large-screen-only">
        <a class="mdl-navigation__link" href="logout.php"><i class="material-icons">launch</i> Log Out</a>
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">
    <?php 

    $query_res=$db->query("SELECT NAME from students where ROLLNO='".@$_SESSION['uname']."' ");
    $rows=$query_res->fetch_all(MYSQLI_ASSOC) ;

    foreach($rows as $row)
      {
        $nm=$row['NAME'] ;
        echo $nm;
      }

    ?></span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="studentt.php"><i class="material-icons">dashboard</i> Dashboard </a>
      <a class="mdl-navigation__link" href="sedit.php"><i class="material-icons">line_weight</i> Edit Info</a>
      
    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">

<br><br><br>
<center class=opts>
<div id=spn></div>
 <h4> My Courses </h4>

  <?php
  if(!loggedin()) header("Location:studentlogin.php");
$cour=$db->query("SELECT * FROM sem_courses");

if (!$cour->num_rows)
{   
echo "No Course to show ";
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;


foreach($rows as $row)
{
  $cname=$row['NAME'] ;
  $cid=$row['COURSE_ID'];
//  echo $cid;
 if(hascrs($cid)) echo "$cname<br> 
  <button class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect tst dra rbg\" id=".$cid.">
DROP
</button><br><br>";

else
  echo "$cname<br> 
  <button class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect tst adr gbg\" id=".$cid.">
  ADD
</button><br><br>";

}
  ?>  </center>
<br>


<div id="etoast" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text" id=sndiv></div>
  <button class="mdl-snackbar__action" type="button"></button>
</div>

<script>

  var snackbarContainer = document.querySelector('#etoast');
  var x = $('.tst');

  x.click(function() {
    
    var data = {message: $('#sndiv').text(),timeout:1000};
    snackbarContainer.MaterialSnackbar.showSnackbar(data);
  });

</script>


    </div>
  </main>
</div>




<script type="text/javascript">
  $('button').click(function(){

    if($(this).hasClass('dra'))
    {
        $.post("delcrs.php", {cid:$(this).attr('id')}, function(result){
        $("#sndiv").text(result);
    });

                            $(this).removeClass('rbg');
        $(this).removeClass('dra');
         $(this).text("ADD")

        $(this).addClass('gbg');
        $(this).addClass('adr');

       
//        alert($(this).attr('class'));

    }
    else if($(this).hasClass('adr'))
    {   
        $.post("addcrs.php", {cid:$(this).attr('id')}, function(result){
        $("#sndiv").text(result);
    });

               $(this).removeClass('gbg');
        $(this).removeClass('adr');
        $(this).text("DROP")

         $(this).addClass('rbg');
        $(this).addClass('dra');

        
      
  //      alert($(this).attr('class'));      
    }

  });


</script>
</body>
</html>

