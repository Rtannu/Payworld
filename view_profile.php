<?php
       session_start();
       if(!isset($_SESSION['session_id']))
          header("Location:index.php");	 	
?>
<html>
      <head><title>View profile</title></head>
      <body>
          <form method="post" action="password_change.php">
             <table width="50%" bgcolor="0099CC" align="center">
                  <tr>
                      <td colspan="2"><center><font size="4">Profile</font></center></td>
                  <tr>
                  <?php
                      include_once'connectivity.php';
                       $id=$_SESSION['session_id'];
                      try{
                            $database=new Connection();
                            $db=$database->openConnection();
                            $stm=$db->prepare("select * from customer_info where email_id=:id");
                            $stm->bindParam(":id",$id);
                            $stm->execute();
                            $stm->setFetchMode(PDO::FETCH_ASSOC);
                            while($data=$stm->fetch())
                                {
                                   $name=$data['name'];
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
                    <td>name</td>
                    <td><center><?php echo $name;?></center></td>
                </tr>
                <tr>
                    <td>email</td>
                    <td><center><?php echo $email_id;?></center></td>
                </tr>
                 <tr>
                    <td>phone no</td>
                    <td><center><?php echo $phone_no;?></center></td>
                </tr>
                <tr>
                    <td>pwd</td>
                    <td><center><?php echo $pwd;?></center></td>
                </tr>
                <tr>
                    <td>Wallet amount</td>
                    <td><center><?php echo $amount;?></center></td>
                </tr>
                <tr>
                    <td colspan="2"><center><input type="submit" value="forget password?"></center></td>
                </tr>
             <table>
          </form>
          
      </body>
</html>
