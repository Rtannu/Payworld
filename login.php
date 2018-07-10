<?php
    session_start();
    
?>
<html>
     <head>
           <title>Login_page</title>
     </head>
     <body>
           <form name="login_form" method="post" action="">
               <table width="23%" bgcolor="0099CC" align="center">
                     <tr>
                         <td colspan=2><center><font size=4><b>Login_page</b></size></center></td>
                     </tr>
                                          
                      <tr>
                         <td>login_id:</td>
                         <td><input type="text" name="id" size="25" placeholder="enter email " required></td>
                     </tr>                     

                     <tr>
                         <td>Password:</td>
                         <td><input type="password" name="pwd" size="25" placeholder="enter password" required></td>
                     </tr>
                                          
                     <tr>
                          <td colspan=2><center><input type="submit" name="login"></center></td>
                     </tr>
                     <tr> 
                         <td  colspan=2>Do you want to register?<a href="index.php" >Register</a><td>
                         
                     </tr>
               </table>
             
          </form>


 <?php
               
               
              if(isset($_POST['login']))
                      {    
                           include_once'connectivity.php'; 
                           $id=trim($_POST['id']);
                           $pwd=trim($_POST['pwd']);
                           $message="login successfully";
                           
                         try
                          {
                           $database=new Connection();
                           $db=$database->openConnection();
                           
                           $count=$db->prepare("SELECT count(*) from customer_info where email_id=:email_id and pwd=:pwd");
                           $count->bindParam(":email_id",$id);  
                           $count->bindParam(":pwd",$pwd);                        
                           $count->execute();
                           $no=$count->fetchColumn();
                           if($no>0)
                              {
                                   
                                   $_SESSION["session_id"]=$id;
                                   header("Location:dashboard.php");
                                   
                              }
                           else
                              {
                                   echo "<script>alert('there is error in login');</script>";
                              }
                           
                          }
                        catch(PDOException $e)
                             {
                               echo "There is some problem in connection: ".$e.getMessage();
                             } 
                            
                           
                           
                      }
                    
              
               
          ?>

     </body>
</html>
