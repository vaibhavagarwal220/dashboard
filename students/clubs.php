<?php
require 'connect.php' ;
  require 'core.php' ;
  
  if(!loggedin())
  {
    header('Location:studentlogin.php');
  }

$val=-1;
$title="";
$title=getgnameid($_GET['grp']);
if(!isset($_GET['grp'])||empty($_GET['grp']))
   header('Location:404.php');
?>
<!DOCTYPE html>
<html>
<head>

<link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon" />
<title>Groups | Dashboard</title>

</head> 
<body>
<?php

  include 'include.inc.php';

  
  if(isgrp($_GET['grp']))
    {
      $val=$_GET['grp'];
   
    }
  else die('<br><br><center class=opts>No such group in our database</center>');
 
$cour=$db->query("SELECT * FROM groups where id=$val");
$rows=$cour->fetch_all(MYSQLI_ASSOC) ;
foreach($rows as $row)
{
  $bdy=$row['descr'] ;

    echo "<br><center class=\"opts mdl-shadow--6dp\"><h6>Group Description</h6><br>$bdy</center>";

}

  if(ispending($_SESSION['uname'],$val)) echo("<br><br><center class=\"opts mdl-shadow--6dp\">Request Pending</center>");
  else if(!ismember($_SESSION['uname'],$val)) echo("<br><br><div id=sndiv><center class=\"opts mdl-shadow--6dp\">You are not a member of this group.<br><br><button class=\"subscr mdl-chip\" id=".$val."><span class=\"mdl-chip__text\"> <i class=\"material-icons alig\">group_add</i> Subscribe</span></button></center></div>");
 
else{
?><br>
<style type="text/css">
  
  .grps,.grps:hover{font-size:15px;color:black !important;background-color:white !important; }

</style>

 <center>
  <button type="button" class="mdl-chip" id=leavegrp>
    <span class="mdl-chip__text"> <i class="material-icons alig">launch</i> Leave Group </span>
</button>
<br><br>
 <button id="show-dialog" type="button"  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">POST <i class="material-icons alig">create</i></button>
  <dialog class="mdl-dialog">
    <h4 class="mdl-dialog__title">New Post</h4>
    <div class="mdl-dialog__content">
      <p>

        <div class="mdl-textfield mdl-js-textfield">
        <textarea class="mdl-textfield__input" type="text" rows= "3" id="sample5" ></textarea>
        <label class="mdl-textfield__label" for="sample5">Content</label>
        </div>

                <div class="mdl-textfield mdl-js-textfield">
        <textarea class="mdl-textfield__input" type="text" rows= "3" id="sample6" ></textarea>
        <label class="mdl-textfield__label" for="sample6">Image URL</label>
        </div>

      </p>
    </div>
    <div class="mdl-dialog__actions">
      <button type="button" class="mdl-button" id=npost onclick="clear()">POST</button>
      <button type="button" class="mdl-button close" id=cancelb>CANCEL</button>
    </div>
  </dialog>
<script type="text/javascript">
  
  function ClearFields() {

     document.getElementById("sample5").value = "";
     document.getElementById("sample6").value = "";
}

</script>


  <script>
    var dialog = document.querySelector('dialog');
    var showDialogButton = document.querySelector('#show-dialog');
    if (! dialog.showModal) {
      dialogPolyfill.registerDialog(dialog);
    }
    showDialogButton.addEventListener('click', function() {
      dialog.showModal();
    });
    dialog.querySelector('.close').addEventListener('click', function() {
      dialog.close();
    });
  </script>
<br><br>

<?php
$cour=$db->query("SELECT * FROM group_post where gid=$val ORDER by time DESC");

if (!$cour->num_rows)
{   
echo "<div class=\"opts feed\">No posts</div>";
}


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;

//  <a href=show_and_create_post.php?cid=".$cr_id."&fid=".$sn['forum_id']."&uname=".$u_name." > ".$sn['forum_name']."</a>
echo "<div id=feedspost>";
foreach($rows as $row)
{
  $ttl=$row['post_img'] ;
  $ath=$row['post_author'];
  $bdy=$row['post_body'] ;
   $gid=$row['gid'] ;

    $topr="<div class=\"opts feedgr mdl-shadow--6dp\">".getposte($ath)." posted in <a href=clubs.php?grp=".$gid.">".getgnameid($gid)."</a> <div class=ts>".date("F jS Y H:i:s", strtotime($row['time']))."</div><br>";

$pattern = '@(http(s)?://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@';
   $topr=$topr.preg_replace($pattern, '<a href="http$2://$3" target=_blank>$0</a>', $bdy)."<br>";

    echo $topr;if($ttl!="") echo "<a href=\"$ttl\" class=feedimg data-lightbox=\"image-$id\" data-title=\"".getposte($ath)." posted in <a href=clubs.php?grp=".$gid.">".getgnameid($gid)."</a><br><br>$bdy<br><br>\"><img src=$ttl class=feedimg></a>";
    echo "</div><br>";

}
echo "</div>";


}

?>

</center>


    </div>
  </main>
</div>

</body>
</html>



<script type="text/javascript">
    $('.subscr').click(function(){
      
        $.post("joingrp.php", {gid:$(this).attr('id')}, function(result){
        $("#sndiv").html("<center class=\"opts mdl-shadow--6dp\">"+result+"</center>");
    });

       
  });

    $('#leavegrp').click(function(){
      
        $.post("leavegrp.php", {gid:<?php echo $val;?>}, function(result){
        $("#sndiv").html("<center class=opts>"+result+"</center>");
        location.reload();
    });

       
  });

    $('#npost').click(function(){
      
        $.post("addpost.php", {dsc:$('#sample5').val(),iurl:$('#sample6').val(),gid:<?php echo $val;?>}, function(result){
        $('#cancelb').click();
        $("#feedspost").prepend(result);


        //alert(result);
    });

       
  });



</script>

