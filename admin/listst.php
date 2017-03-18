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
  <title>Student List</title> 

    </head>
  <body>
      <?php include 'include.inc.php';?>
<center>

<h3>Students List</h3>

<br><br>


<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="myInput" onkeyup="myFunction2()">
    <label class="mdl-textfield__label" for="myInput">Search...</label>
  </div>

      <br><br>
<table class="mdl-data-table mdl-js-data-table mdl-shadow--6dp" id=myTable>
  <thead>
    <tr>
      <th>Roll No.</th>
      <th class="mdl-data-table__cell--non-numeric">Name</th>
      <th>Contact</th>
      <th class="mdl-data-table__cell--non-numeric">Address</th>
 
 
 
    </tr>
  </thead>
  <tbody>
 
  <?php

    $stud = "SELECT * FROM Students ";

    $students=$db->query($stud);
    

  if (!$students->num_rows)
  {   
    echo ('NO Student to show ');
  }         
    else
    {

          $rows=$students->fetch_all(MYSQLI_ASSOC);
          

          foreach($rows as $row)
          {

            echo "<tr>
                  <td>".$row['ROLLNO']."</td>
                  <td class=\"mdl-data-table__cell--non-numeric\">".$row['NAME']."</td>
                  <td>".$row['CONTACT']."</td>
                  <td class=\"mdl-data-table__cell--non-numeric\">".$row['ADDRESS']."</td>
                  </tr>";
          }
  
    }


   ?>

  </tbody>
</table>
</center>











    </div>
  </main>
</div>





  
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
</body>
</html>

