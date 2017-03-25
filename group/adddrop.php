
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon" />
  <title>Add/Remove Members</title>

    </head>
  <body>
  <?php 
  require 'connect.php' ;
  require 'core.php' ;
  
  if(!loggedin())
  {
    header('Location:grouplogin.php');
  }
  $title="Add/Remove Members";
include 'include.inc.php';?>
<br><br><br>
<center>
  <?php
$cour=$db->query("SELECT * FROM groupdata where gid=".getid("".$_SESSION['unamegrp'])."");

if (!$cour->num_rows)
{   
echo "No Requests to show ";
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;
?>

<table class="mdl-data-table mdl-js-data-table mdl-shadow--6dp">
  <thead>
    <tr>
      <th class="mdl-data-table__cell--non-numeric">Roll No</th>
      <th class="mdl-data-table__cell--non-numeric">Add/Drop</th>
    </tr>
  </thead>
  <tbody>
    

<?php

foreach($rows as $row)
{
  $cname=$row['STID'] ;
//  echo $cid;
 if(ismember($cname,getid("".$_SESSION['unamegrp']))) echo "
<tr>
      <td class=\"mdl-data-table__cell--non-numeric\">$cname</td>
      <td class=\"mdl-data-table__cell--non-numeric\">
      <button class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect tst dra rbg\" id=".$cname.">
      DROP
      </button>

      </td>
 </tr>";

else
echo "
<tr>
      <td class=\"mdl-data-table__cell--non-numeric\">$cname</td>
 
      <td class=\"mdl-data-table__cell--non-numeric\">
      <button class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect tst adr gbg\" id=".$cname.">
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
        $.post("delmem.php", {stid:$(this).attr('id')}, function(result){
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
        $.post("addmem.php", {stid:$(this).attr('id')}, function(result){
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

