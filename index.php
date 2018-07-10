<html>
    <head>
         <title>Register_page</title>
    </head>
   
    <body>
          <form name="login_form" method="post" action="">
               <table width="23%" bgcolor="0099CC" align="center">
                     <tr>
                         <td colspan=2><center><font size=4><b>Register</b></size></center></td>
                     </tr>
                     <tr>
                         <td>name:</td>
                         <td><input type="text" name="user_name" size="25" required></td>
                     </tr>

                     <tr>
                         <td>Mobile_no:</td>
                         <td><input type="text" name="mobile_no" size="25" required></td>
                     </tr>
                     
                      <tr>
                         <td>Email_id:</td>
                         <td><input type="text" name="email_id" size="25" required></td>
                     </tr>                     

                     <tr>
                         <td>Password:</td>
                         <td><input type="password" name="pwd" size="25" required></td>
                     </tr>
                     
                     <tr>
                         <td>Confirm_Password:</td>
                         <td><input type="password" name="com_pwd" size="25" required></td>
                     </tr>
                     
                     <tr>
                          <td colspan=2><center><input type="submit" name="Register"></center></td>
                     </tr>
                     <tr> 
                         <td  colspan=2>Already a member?<a href="login.php" >Sign in</a><td>
                         
                     </tr>
               </table>
             
          </form>



          <?php
               
               
              if(isset($_POST['Register']))
                      {    
                           include_once'connectivity.php';
                           $name=$_POST['user_name'];
                           
                           $mobile_no=trim($_POST['mobile_no']);
                           $email_id=trim($_POST['email_id']);
                           $pwd=trim($_POST['pwd']);
                           $com_pwd=trim($_POST['com_pwd']);
                           
                         try{
                           
                           $database=new Connection();
                           $db=$database->openConnection();
                           
                           $stm=$db->prepare("INSERT INTO customer_info (name,email_id,phone_no,pwd) VALUES (:user_name,:email_id,:phone_no,:pwd)");                          
                           $stm->execute(array(':user_name'=> $name,':email_id'=>$email_id,':phone_no'=> $mobile_no,':pwd' => $pwd));
                          
                           
                           header("Location:login.php");
                            }
                          catch(PDOException $e)
                             {
                               echo "There is some problem in connection: ".$e.getMessage();
                             }
                           
                           
                      }
                    
              
               
          ?>
    </body>
</html>
