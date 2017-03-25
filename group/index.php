
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon" />
<title>Home</title>
</head> 
<body>
<?php

  require 'core.php' ;
  require 'connect.php' ;

  if(!loggedin())
  {
    header('Location:grouplogin.php');
  }
 
   
   $title="Home";
  include 'include.inc.php';

?>
<br><br>
<center>
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
      <button type="button" class="mdl-button" id=npost>POST</button>
      <button type="button" class="mdl-button close" id=cancelb>CANCEL</button>
    </div>
  </dialog>
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


$cour=$db->query("SELECT * FROM group_post where gid=".getid("".$_SESSION['unamegrp'])." ORDER by time DESC");

if (!$cour->num_rows)
{   
echo '<div class=opts>No posts</div>';
  //echo 'Permission granted Enjoy due '  //print_r($per);}
}


$rows=$cour->fetch_all(MYSQLI_ASSOC) ;

//  <a href=show_and_create_post.php?cid=".$cr_id."&fid=".$sn['forum_id']."&uname=".$u_name." > ".$sn['forum_name']."</a>
echo "<div id=feedspost>";
foreach($rows as $row)
{
  $ttl=$row['post_img'] ;
  $ath=$row['post_author'];
  $bdy=$row['post_body'] ;

    $topr=" <div class=\"opts feedgr mdl-shadow--6dp\" >".getposte($ath)." posted in ".getgname($_SESSION['unamegrp'])." <div class=ts>".date("F jS Y H:i:s", strtotime($row['time']))."</div><br>";

$pattern = '@(http(s)?://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@';
   $topr = $topr.preg_replace($pattern, '<a href="http$2://$3" target=_blank>$0</a>', $bdy)."<br>";

   echo nl2br($topr);
    if($ttl!="") echo"<img src=$ttl class=feedimg>";
    echo"<br></div><br>";

}
echo "</div><br><br>";
?>
</center>
    </div>
  </main>
</div>

<script type="text/javascript">
  
      $('#npost').click(function(){
      
        $.post("addpost.php", {dsc:$('#sample5').val(),iurl:$('#sample6').val(),gid:<?php echo getid("".$_SESSION['unamegrp']);?>}, function(result){
        $("#feedspost").prepend(result);
        $('#cancelb').click();

        //alert(result);
    });

       
  });


</script>

</body>
</html>

