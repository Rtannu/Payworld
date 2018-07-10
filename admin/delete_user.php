<?php
       
       session_start();
       if(!isset($_SESSION['session_id']))
          header("Location:admin_login.php");
       
?>
<html>
      <head>
            <title>Admin Panel</title>
            <link rel="stylesheet" type="text/css" href="style/mystyle.css">
      </head>
      <body>
            <div id="header">
                <h1>Admin Panel</h1>
            </div>
            <div id="logout">
                <a href="admin_logout.php">logout</a>
            </div>
            <div class="content">
                 <div id="left">
                      <?php
                         include_once'connectivity.php';
                         try{
                              $database=new Connection();
                              $db=$database->openConnection();
                              $stm=$db->prepare("select * from admin_menu");
                              $stm->execute();
                              $stm->setFetchMode(PDO::FETCH_ASSOC);
                              while($data=$stm->fetch())
                                    {
                                       $menu_name=$data['adm_menu_name']; 
                                       $menu_id=$data['adm_menu_id'];
                                       ?>
                                       <ul>
                                             <a href="admin_menu.php?menu_id=<?php echo $menu_id?>"><li><?php echo $menu_name ?></li></a>
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
                       <table width="50%" bgcolor="A56883" align="center">
                             <tr>
                                  <td colspan="6"><center><b><font size="5">User Details</font></b></center></td>
                             </tr>
                             <tr>
                                  <td>serial no</td>
                                  <td>Name</td> 
                                  <td>Email id</td>
                                  <td>Phone number</td>
                                  <td>password</td>
                                  <td>Wallet Amount</>
                                  <td>Delete</td>
                             </tr>
                             <?php
                                  $count=0;
                                  $stm=$db->prepare("select * from customer_info");
                                  $stm->execute();
                                  $stm->setFetchMode(PDO::FETCH_ASSOC);
                                  while($data=$stm->fetch())
                                      {   
                                          $count++;
                                          $user_name=$data['name'];
                                          $email_id=$data['email_id'];
                                          $phone_no=$data['phone_no'];
                                          $pwd=$data['pwd'];
                                          $amount=$data['amount'];
                             ?>
                                  <tr>
                                      <td><?php echo $count;?></td>
                                      <td> <?php echo $user_name;?> </td>
                                  
                                  
                                      <td> <?php echo $email_id;?> </td>
                                  
                                  
                                      <td> <?php echo $phone_no;?> </td>
                                  
                                  
                                      <td> <?php echo $pwd;?> </td>
                                  
                                  
                                      <td> <?php echo $amount;?> </td>
                                      <td><a href="delete_user_details.php?id=<?php echo $email_id;?>">Delete	</td>
                                  </tr>
                             <?php
                                     }
                             ?>
                       </table>
                 </div>
            </div>
            <div id="footer">
            </div>
      </body>
</html>
