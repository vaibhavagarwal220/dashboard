<?php


  require 'connect.php' ;
  require 'core.php' ;

if(!loggedinfac())
  {
    header('Location:facultylogin.php');
  }
?>


<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon" />
  <title>Students List</title>
    </head>
  <body>
  <?php 
  $title="Students List";
  include 'include.inc.php';?>

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


  $studd=$db->query("SELECT * fROM CourseData WHERE CID=".$_SESSION['unamefac']."");

  $rowss=$studd->fetch_all(MYSQLI_ASSOC) ;
    

  if (!$studd->num_rows)
  {   
    echo ('No Student to show ');
  }         
    else
    {

          

          foreach($rowss as $row1)
          {        
                                $stud = "SELECT * FROM Students where ROLLNO=".$row1['STID']."";
                                $students=$db->query($stud);
                                 $rows=$students->fetch_all(MYSQLI_ASSOC);
                  foreach($rows as $row)
                  {
                  echo "<tr>
                  <td>".$row['ROLLNO']."</td>
                  <td class=\"mdl-data-table__cell--non-numeric\"><a href=\"faculty3.php?sid=".$row['ROLLNO']."&cid=".$_SESSION['unamefac']."\">".$row['NAME']."
                  </a></td>
                  <td>".$row['CONTACT']."</td>
                  <td class=\"mdl-data-table__cell--non-numeric\">".$row['ADDRESS']."</td>
                  </tr>";
                  }
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

