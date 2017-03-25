
<!DOCTYPE html>
<html>
<head>
  <title>Add/Drop Courses</title>
<link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon" />



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
<style type="text/css">
table a{color:brown;}
.adrp{font-size:15px;color:black !important;background-color:white !important; }  
</style>

<br><br><br>
<style type="text/css">
  #tablesrch{overflow:auto;}
</style>
<center>


     <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
    <label class="mdl-button mdl-js-button mdl-button--icon" for="searchtble">
      <i class="material-icons">search</i>
    </label>
    <div class="mdl-textfield__expandable-holder">
      <input class="mdl-textfield__input" type="text" id="searchtble">
      <label class="mdl-textfield__label" for="sample-expandable">Expandable Input</label>
    </div>
  </div>

      <script>
  $(document).ready(function()
{
  $('#searchtble').keyup(function()
  {
    Tablesrchthis($(this).val(),'tablesrch');
  });
});
 

function Tablesrchthis(inputVal,tableid)
{
  var table = $('#'+tableid);
  table.find('tr').each(function(index, row)
  {
    var allCells = $(row).find('td');
    if(allCells.length > 0)
    {
      var found = false;
      allCells.each(function(index, td)
      {
        var regExp = new RegExp(inputVal, 'i');
        if(regExp.test($(td).text()))
        {
          found = true;
          return false;
        }
      });
      if(found == true)$(row).show();else $(row).hide();
    }
  });
}

  </script>



<?php
  

$cour=$db->query("SELECT * FROM sem_courses");

if (!$cour->num_rows)
{   
echo "No Course to show ";
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;
?>

<table class="mdl-data-table mdl-js-data-table mdl-shadow--6dp" id=tablesrch> 
  <thead>
    <tr>
      <th class="mdl-data-table__cell--non-numeric">Course Name</th>
      <th class="mdl-data-table__cell--non-numeric ccde">Course Code</th>
      <th class="mdl-data-table__cell--non-numeric cslt">Slot</th>
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
      <td class=\"mdl-data-table__cell--non-numeric\"><a title=\"Click to view review\" href=review.php?q=$cid>$cname</a></td>
      <td class=\"mdl-data-table__cell--non-numeric ccde\">$cde</td>
      <td class=\"mdl-data-table__cell--non-numeric cslt\">$slt</td>
      <td class=\"mdl-data-table__cell--non-numeric\">
      <button class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect tst dra rbg\" id=".$cid.">
      DROP
      </button>

      </td>
 </tr>";

else
echo "
<tr>
     <td class=\"mdl-data-table__cell--non-numeric\"> <a title=\"Click to view review\" href=review.php?q=$cid>$cname</a></td>
      <td class=\"mdl-data-table__cell--non-numeric ccde\">$cde</td>
      <td class=\"mdl-data-table__cell--non-numeric cslt\">$slt</td>
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

