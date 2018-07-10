<?php
        session_start();
        if(!isset($_SESSION['session_id']))
          header("Location:index.php");
?>
<html>
     <head><title>Change Password</title></head>
     <body>
         <form action="" method="post">
          <table width="40%" bgcolor="0099CC" align="center">
                <tr>
                     <td colspan="2"><center><font size="4"><b>password update</b></font></center></td>
                </tr>
                <tr>
                   <td>new password</td>
                   <td><input type="text" name="new_pwd"></td>
                </tr>
                <tr>
                   <td>comfirm password</td>
                   <td><input type="text" name="com_pwd"></td>
                </tr>
                <tr>
                    <td colspan="2"><center><input type="submit" name="submit"></center></td>
                </tr>
          </table>
        </form>
           <?php
                   
                   if(isset($_POST['submit']))
                      {  
                         echo "raj";
                         $new_pwd=$_POST['new_pwd'];
                         $com_pwd=$_POST['com_pwd'];
                         echo $new_pwd;
                         echo $com_pwd;
                         include_once'connectivity.php';
                         $id=$_SESSION['session_id'];
                         try{
                               $database=new Connection();
                               $db=$database->openConnection();
                               $stm=$db->prepare("UPDATE customer_info set pwd='$new_pwd' WHERE email_id='$id' ");
                               $stm->execute();
                               header("Location:log_out.php");
                            }
                          catch(PDOException $e)
                            {
                              echo "There is some problem in connection: ".$e.getMessage();
                            }
                        
                      }
           ?>
                   
     </body>
</html>
