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
                       <table width="70%" bgcolor="A56883" align="center">
                             <tr>
                                  <td colspan="9"><center><b><font size="5">Mobile Transaction Details</font></b></center></td>
                             </tr>
                             <tr>
                                  <td>Serial no</td>
                                  <td>Transaction id</td> 
                                  <td>Recharge Mobile</td>
                                  <td>Operator</td>
                                  <td>Circle</td>
                                  <td>Amount<td/>
                                  <td>Payment mode</td>
                                  <td>Time</td>
                                  <td>Date</td>
                                  <td>Update</td>
                             </tr>
                             <?php
                                  $count=0;
                                  $stm=$db->prepare("select * from mobile_transaction");
                                  $stm->execute();
                                  $stm->setFetchMode(PDO::FETCH_ASSOC);
                                  while($data=$stm->fetch())
                                      {   
                                          $count++;
                                          $id=$data['mobile_payment_transaction_id'];
                                          $mobile=$data['recharged_mobile_no'];
                                          $operator=$data['recharged_operator'];
                                          $circle=$data['recharged_circle'];
                                          $amount=$data['recharged_amount'];
                                          $payment_mode=$data['payment_mode'];
                                          $time=$data['time'];
                                          $date=$data['date'];
                             ?>
                                  <tr>
                                      <td><?php echo $count;?></td>
                                      <td> <?php echo $id;?> </td>
                                  
                                  
                                      <td> <?php echo $mobile;?> </td>
                                  
                                  
                                      <td> <?php echo $operator;?> </td>
                                  
                                  
                                      <td> <?php echo $circle;?> </td>
                                  
                                  
                                      <td> <?php echo $amount;?> </td>
                                      <td> <?php echo $payment_mode;?> </td>
                                  
                                  
                                      <td> <?php echo $time;?> </td>
                                      <td><?php echo $date;?></td>
                                      <td><a href="mobile_trans_update.php?id=<?php echo $id;?>">Update</td>
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
