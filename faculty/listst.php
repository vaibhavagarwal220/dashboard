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
  <title>Faculty Access</title>
  <?php include 'include.inc.php';?>



    </head>

  <body>


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
    <span class="mdl-layout-title"><?php 
        $q="SELECT * FROM PROF WHERE TEACHER_ID=".$_SESSION['unamefac']."";
        $x=$db->query($q);
        $y=$x->fetch_all(MYSQLI_ASSOC);
        foreach($y as $row)
        {
          $n=$row['NAME'];
        }

      echo $n;

      ?></span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="facultyy.php"><i class="material-icons">dashboard</i> Dashboard</a>
      <a class="mdl-navigation__link" href="editinfo.php"><i class="material-icons">line_weight</i> Edit Info</a>
    

    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content"><!-- Your content goes here -->
      

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
      <th class="mdl-data-table__cell--non-numeric">Info</th>
 
 
 
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
                  <td class=\"mdl-data-table__cell--non-numeric\">".$row['INFO']."</td>
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

