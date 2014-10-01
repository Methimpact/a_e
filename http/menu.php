<?php
global $refresh ;
global $freq ;
include_once('functions.inc.php');
include_once('settings.inc.php');

// this_session_start();
// login_check("quick");


if ( !isset( $settings['update'] ) )
{
    $settings['update'] = false;
}

if ( $settings['lang'] == "no" )
{
    include("lang/no/lang.no.php");
}else{
    include("lang/en/lang.en.php");
}


//
/*
<script type="text/javascript">
              with(document) {
                 var range=getElementById('range'),output=getElementById('range_output'),thumb=false,style;
                 range.onchange=function(){
                    output.innerHTML=this.value;
                 };
                 range.onclick=function(){
                    if(!thumb) {
                       style=createElement('style');
                       style.textContent='input[type="range"]#range::-webkit-slider-thumb{-webkit-appearance:sliderthumb-vertical !important;}';
                       body.appendChild(style);
                       output.innerHTML=this.value;
                       thumb=true;
                    }
                 };
              };

              
        </script>
*/

?>
<script type="text/javascript">

function reRange(newValue)
{
	document.getElementById("re_output").innerHTML=newValue;
}
function reFreq(newValue)
{
	document.getElementById("refreq_output").innerHTML=newValue;
}

</script>

<div class="navbar navbar-default">
    <div class="container">
        <a class="navbar-brand" href="http://mineforeman.com/minepeon/"><small>Beta </small>MinePeon</a>
        <ul class="nav navbar-nav">
          <li><a href="/"><?php echo $lang["status"]; ?></a></li>
          <li><a href="/pools.php"><?php echo $lang["pools"]; ?></a></li>
          <li><a href="/settings.php"><?php echo $lang["settings"]; ?></a></li>
          <li><a href="/plugins.php"><?php echo $lang["plugins"]; ?></a></li> 
          <li><a href="/about.php"><?php echo $lang["about"]; ?></a></li>
          <li><a href="http://minepeon.com/forums/">Forum</a></li>
    <?php 
       if ($handle = opendir('plugins/api_menu/')) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                   $menuadd=simplexml_load_file("plugins/api_menu/" . $entry);
    echo "<li><a href='" . $menuadd->pl_folder . "'>" . $menuadd->Menu_text . "</a></li>";

                }
            }
            closedir($handle);
       }
    ?>
    </ul>
  </div>
    <form method="get" >
        <div class="container">
            
                <span id="re_output"><?php echo $refresh ; ?></span>
                <input id="range" name="range" type="range"  min="0" max="99" step="2" value="<?php echo $refresh ; ?>" onchange="reRange(this.value)" />
                <input type="submit"  value="submit" />
            
            

        </div>
    </form>
    <form method="get" action="/settings.php" >
        <div class="container">
                
                <?php /*<span id="refreq_output"><?php echo $freq ; ?></span>       
                
                     <input type="number" value="<?php echo $freq ; ?>" id="rerangefreq" name="rerangefreq" class="form-control" style="width:100%;" >
                    <span class="input-group-addon">mHz</span> 
                    
                    <input id="rerangefreq" name="rerangefreq" type="text"  min="0" max="500" step="5" value="<?php echo $freq ; ?>" onchange="reFreq(this.value)" /> 
                    
                    
                    */ ?>
                
                 <input id="rerangefreq" name="rerangefreq" type="text" size="10%" value="<?php echo $freq ; ?>"  /> 
                <input type="checkbox"  value="true" name="refreqnrestart"/>restart?
                <input type="submit"  value="go" />
            
            

        </div>
    </form>
</div>
<?php
if ($settings['update'] == "true"){
?>
<div align="center" class="container">
<div class="alert alert-info alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Minepeon:</strong> Update available! <a href="/update.php" class="alert-link">Do you want to update?</a>
</div>
</div>
<?php
}
?>
