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
  <title>Faculty List</title>



    </head>

  <body>
     <?php include 'include.inc.php';?>


<center>
<h3>Search Faculty</h3>
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

<script>
function myFunction2() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
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