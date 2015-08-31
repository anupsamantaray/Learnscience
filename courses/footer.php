<div> <div id="footer">
        <div id="footer_content">
            <div id="footer_leftbar">
                Copyright&copy; <span style="color:rgb(0, 112, 176);">2000 - 2014</span> Education To Go. All rights reserved. The material on this site cannot be reproduced or redistributed unless you have obtained prior written permission from Education To Go. 
            </div>
            <?php if($_SESSION['name']){?>
            <div id="footer_rightbar" style="padding-bottom:8px;">
              <h5 style="border: none; font-weight: normal; margin-top: 0px; margin-bottom: 0px;">feedback</h5>
              <?php
              if(isset($_POST['submit']))
              {
                     $msg=$_REQUEST['mess'];
                     mysql_query("insert into `feedback` set `message`='$msg',`uid`='$_SESSION[slno]'");
              }
              ?>
              <form name="mf" action="" method="post">
              <table>
                     <tr>
                           <td><textarea name="mess" style="height: 10px;"></textarea> <input type="submit" name="submit" value="submit"></td>
                     </tr>
              </table>
              </form>
            </div>
            <?php }?>
            <div id="footer_rightbar">
                <h5 style="border: none; font-weight: normal; margin-top: 0px; margin-bottom: 0px;">Connect with Us</h5>
                <a href="https://www.facebook.com/"><img src="images/facebook.png" style="float: left; width:30px;"/></a>
                <a href="https://twitter.com/"><img src="images/twitter.png" style="float: left; width:30px; margin-left: 5px;"/></a>
                <!--<img src="images/google.png" style="float: left; width:30px; margin-left: 5px;"/>-->
                <a href="https://www.youtube.com/watch?v=mPTh8OEBwEo"><img src="images/youtube.png" style="float: left; width:30px; margin-left: 5px;"/></a>
                <!--<img src="images/pinterest.png" style="float: left; width:30px; margin-left: 5px;"/>--><br /><br /><br />
            </div>
            
        </div>
    </div>
     