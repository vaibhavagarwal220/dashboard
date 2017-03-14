
<!DOCTYPE html>
<html>
<head>
  <title>Add/Drop Courses</title>

    </head>
  <body>
  <?php 
  require 'connect.php' ;
  require 'core.php' ;
  
  if(!loggedin())
  {
    header('Location:studentlogin.php');
  }
  $title="Add/Drop Courses";
include 'include.inc.php';?>
<br><br><br>
<center>
  <?php
  if(!loggedin()) header("Location:studentlogin.php");
$cour=$db->query("SELECT * FROM sem_courses");

if (!$cour->num_rows)
{   
echo "No Course to show ";
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;
?>

<table class="mdl-data-table mdl-js-data-table mdl-shadow--6dp">
  <thead>
    <tr>
      <th class="mdl-data-table__cell--non-numeric">Course Name</th>
      <th class="mdl-data-table__cell--non-numeric">Course Code</th>
      <th class="mdl-data-table__cell--non-numeric">Slot</th>
      <th class="mdl-data-table__cell--non-numeric">Add/Drop</th>
    </tr>
  </thead>
  <tbody>
    

<?php

foreach($rows as $row)
{
  $cname=$row['NAME'] ;
  $cid=$row['COURSE_ID'];
  $cde=$row['code'];
  $slt=$row['slot'];
//  echo $cid;
 if(hascrs($cid)) echo "
<tr>
      <td class=\"mdl-data-table__cell--non-numeric\">$cname</td>
      <td class=\"mdl-data-table__cell--non-numeric\">$cde</td>
      <td class=\"mdl-data-table__cell--non-numeric\">$slt</td>
      <td class=\"mdl-data-table__cell--non-numeric\">
      <button class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect tst dra rbg\" id=".$cid.">
      DROP
      </button>

      </td>
 </tr>";

else
echo "
<tr>
      <td class=\"mdl-data-table__cell--non-numeric\">$cname</td>
      <td class=\"mdl-data-table__cell--non-numeric\">$cde</td>
      <td class=\"mdl-data-table__cell--non-numeric\">$slt</td>
      <td class=\"mdl-data-table__cell--non-numeric\">
      <button class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect tst adr gbg\" id=".$cid.">
      ADD
      </button>

      </td>
 </tr>";
}
  ?>


    
  </tbody>
</table>

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
        if(result==0) $("#sndiv").text("Slot already filled");
        else $("#sndiv").text(result);
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

