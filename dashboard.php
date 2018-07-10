<?php
      session_start();
       if(!isset($_SESSION['session_id']))
          header("Location:index.php");
       
?>
<html>
      <head>
            <title>Dashboard</title>
            <link rel="stylesheet" type="text/css" href="style/mystyle.css">
      </head>
      <body>
            <div id="header">
                 <a href="dashboard.php"><h1 align="left">payworld</h1></a>
                 
                 <form align="right"   action="log_out.php">
                     <label class="logoutLblPos">
                       <input  type="submit"  style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #FFFFC0; border: 3pt ridge lightgrey"value="log out">
                       
                     </label>
                 </form>

                 <form align="right"   action="view_profile.php">                    
                       <input  type="submit"  style="font-face: 'Comic Sans MS'; font-size: larger; color: teal; background-color: #FFFFC0; border: 3pt ridge lightgrey"value="View profile">                    
                 </form>
                 
            </div>
            
            </div>
            <div class="content">
                
                <div id="left">
                   <?php
                         include_once'connectivity.php';
                         try{
                              $database=new Connection();
                              $db=$database->openConnection();
                              $stm=$db->prepare("select * from menu");
                              $stm->execute();
                              $stm->setFetchMode(PDO::FETCH_ASSOC);
                              while($data=$stm->fetch())
                                    {
                                       $menu_name=$data['menu_name']; 
                                       $menu_id=$data['menu_id'];
                                       ?>
                                       <ul>
                                             <a href="menu.php?menu_id=<?php echo $menu_id?>"><li><?php echo $menu_name ?></li></a>
                                       </ul>
                                   <?php }                              
                            }
                         catch(PDOExecption $e)
                            {
                              echo "there is some problem in connection";
                            }

                   ?>
                    
                </div>

                 

                <div id="right">
                       <p align="center"><?php echo "welcome     ".$_SESSION['session_id'];?></p>
                       <table width="50%" bgcolor="0099CC" align="center">
                         <tr>
                             <td colspan="2"><center><font size="4">your wallet</font></center></td>
                         </tr>
                         <tr>
                              <td>Balance</td>
                              <?php
                              $id=$_SESSION['session_id'];
                              try{    
                              $stm=$db->prepare("select * from customer_info where email_id=:id");
                              $stm->bindParam(":id",$id);
                              $stm->execute();
                              $stm->setFetchMode(PDO::FETCH_ASSOC);
                              while($data=$stm->fetch())
                                  {
                                    $wallet=$data['amount'];
                                  } 
                            }catch(PDOExecption $e)
                              {
                              echo "there is some problem in connection";
                              }
                              ?>
                           <td><?php echo $wallet;?> </td>
                         </tr>
                         <tr>
                             <td colspan="2"><center><input type="submit" name="add_money" value="add money"></center></td>
                         <tr>
                       </table>
                </div>
            </div>


            <div id="footer">
            </div>
      </body>
</html>
