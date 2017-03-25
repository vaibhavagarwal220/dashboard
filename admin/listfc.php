<?php


  require 'connect.php' ;
  require 'core.php' ;
  if(!loggedinadm())
  {
    header('Location:adminloginpage.php');
  }

?>  
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon" />
  <title>Faculty List</title>



    </head>

  <body>
     <?php 
     $title="Search Faculty";
     include 'include.inc.php';?>


<center>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="myInput" onkeyup="myFunction2()">
    <label class="mdl-textfield__label" for="myInput">Search...</label>
  </div>

<br><br>

<table class="mdl-data-table mdl-js-data-table mdl-shadow--6dp" id=myTable>
  <thead>
    <tr>
      <th>Faculty ID</th>
      <th class="mdl-data-table__cell--non-numeric">Name</th>
      <th>Contact</th>
      <th class="mdl-data-table__cell--non-numeric">Address</th>

    </tr>
  </thead>
  <tbody>


<?php

    $prof = "SELECT * FROM PROF ";

    $faculty=$db->query($prof);
    

  if (!$faculty->num_rows)
  {   
    echo ('NO profesor to show ');
  }         
    else
    {

          $rows=$faculty->fetch_all(MYSQLI_ASSOC);
          

          foreach($rows as $row)
          {


            echo "<tr>
            <td>".$row['TEACHER_ID']."</td>
            <td class=\"mdl-data-table__cell--non-numeric\"> ".$row['NAME']."</td>
            <td>".$row['CONTACT']."</td>
            <td class=\"mdl-data-table__cell--non-numeric\"> ".$row['ADDRESS']."</td>

            </tr>
              ";
          }
  
    }


   ?>
  
  </tbody>
</table>
</center>
<br><br>
<script>
function myFunction2() {
    var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td1 = tr[i].getElementsByTagName("td")[1];
    td2 = tr[i].getElementsByTagName("td")[0];
    td3 = tr[i].getElementsByTagName("td")[2];
    td4 = tr[i].getElementsByTagName("td")[3];
    if (td1||td2||td3||td4) {

      if (td1.innerHTML.toUpperCase().indexOf(filter) > -1||td2.innerHTML.toUpperCase().indexOf(filter) > -1||td3.innerHTML.toUpperCase().indexOf(filter) > -1||td4.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } 
      else 
      {
        tr[i].style.display = "none";
      }
    

    }


  }
}
</script>




    </div>
  </main>
</div>








</body>
</html>