<?php
       
       session_start();
       if(!isset($_SESSION['session_id']))
          header("Location:admin_login.php");
       
?>
<html>
       <head>
              <title>Admin Panel</title>
       </head>
       <body>
              <form action="" method="post">
                   <table width="40%" bgcolor="A56883" align="center">
                           <tr> 
                               <td colspan=2><center><font size="4">Update</font></center></td>        
                           </tr>
                           <?php
                                 $id=$_GET['id'];
                                 include_once'connectivity.php';
                           try{
                              $database=new Connection();
                              $db=$database->openConnection();
                              $stm=$db->prepare("select * from customer_info where email_id=:id");
                              $stm->bindParam(":id",$id);
                              $stm->execute();
                              $stm->setFetchMode(PDO::FETCH_ASSOC);
                              while($data=$stm->fetch())
                                 {
                                    $name=$data['amount'];
                                    $email_id=$data['email_id'];
                                    $phone_no=$data['phone_no'];
                                    $pwd=$data['pwd'];
                                    $amount=$data['amount'];
                                 }                              
                            }
                          catch(PDOExecption $e)
                            {
                              echo "there is some problem in connection";
                            }
                           ?>
                         <tr>
                            <td><center>name</center><td>
                            <td><center><input type="text" name="user_name" value="<?php echo $name;?>"></center></td>
                         </tr>
                         <tr>
                            <td><center>email id</center><td>
                            <td><center><input type="text" name="email_id" value="<?php echo $email_id;?>"></center></td>
                         </tr>
                         <tr>
                            <td><center>mobile no</center><td>
                            <td><center><input type="text" name="phone_no" value="<?php echo $phone_no;?>"></center></td>
                         </tr>
                         <tr>
                            <td><center>password</center><td>
                            <td><center><input type="text" name="pwd" value="<?php echo $pwd;?>"></center></td>
                         </tr>
                         <tr>
                            <td><center>Wallet money</center><td>
                            <td><center><input type="text" name="amount" value="<?php echo $amount;?>"></center></td>
                         </tr>
                         <tr>
                            <td colspan=2><center><input type="submit" name="update"></center></td>
                         </tr>
                   </table>
              </form>
              <?php
                       if(isset($_POST['update']))
                            {
                                 $name=$_POST['user_name'];
                                 $email_id=$_POST['email_id'];
                                 $phone_no=$_POST['phone_no'];
                                 $pwd=$_POST['pwd'];
                                 $amount=$_POST['amount'];
                                 $sql = "UPDATE customer_info SET name = :user_name, email_id = :email_id,phone_no= :phone_no,pwd = :pwd,amount = :amount WHERE email_id= :id";
                                 $stm=$db->prepare($sql);
                                 $stm->execute(array(':user_name' => $name,':email_id' => $email_id,':phone_no' => $phone_no,':pwd' => $pwd,':amount' => $amount,':id' => $email_id));  
                                 header("Location:index.php");
                            }
              ?>
       </body>
</html>
