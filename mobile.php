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
                           $database->closeConnection();
                       

                   ?>
                    
                </div>

                 

                <div id="right">
                       <form method="post" action="mobile_payment_gateway.php">
                       <table width="50%" bgcolor="0099CC" align="center">
                           <tr>
                               <td colspan="2"><center><b><font size="4">Recharge your mobile</font></b></center></td>
                           </tr>
                           <tr>
                               <td>Enter Number</td>
                               <td><input type="text" name="number"></td>
                           </tr>
                           <tr>
                               <td>Operator</td>
                               <td>
                                           <select name="operator">
                                           <?php 
                                                include_once'connectivity.php';
                                                try{
                                                      $database=new Connection(); 
                                                      $db=$database->openConnection();
                                                      $stm=$db->prepare("select * from operator");
                                                      $stm->execute();
                                                      $stm->setFetchMode(PDO::FETCH_ASSOC);
                                                      while($data=$stm->fetch())
                                                            {
                                                              $operator_name=$data['operator_name'];
                                           ?>
                                                              
                                                                     <option><?php echo $operator_name;	?></option>
                                                              
                                                            
                                           <?php
                                                            }
                                                
                                                   }
                                                catch(PDOException $e)
                                                      {
                                                        echo "there is problem in connection";
                                                      } 
                                                $database->closeConnection();	
                                           ?>
                                  </select>
                               </td>
                           </tr>
                           <tr>
                               <td>Circle</td>  
                               <td>
                                    <select name="circle">
                                            <?php
                                                  include_once'connectivity.php';
                                                  try{
                                                       $database=new Connection();
                                                       $db=$database->openConnection();
                                                       $stm=$db->prepare("select * from circle");
                                                       $stm->execute();
                                                       $stm->setFetchMode(PDO::FETCH_ASSOC);
                                                       while($data=$stm->fetch())
                                                            {
                                                               $circle_name=$data['circle_name'];
                                                               ?>
                                                               <option><?php echo $circle_name;?></option>
                                             <?php
                                                            }
                                                     }
                                                   catch(PDOExecption $e)
                                                     {
                                                        echo "there is problem in connection";
                                                     }
                                             ?>
                                    </select>
                               </td> 
                           </tr>
                           <tr>
                               <td>enter amount</td>
                               <td><input type="text" name="amount"></td>
                           </tr>
                           <tr>
                               <td>payment mode</td>
                               <td><input type="radio" name="payment" value="wallet">wallet</td>
                               <td><input type="radio" name="payment" value="card">card</td>
                               <td><input type="radio" name="payment" value="net_banking">net banking</td>
                           </tr>
                           <tr>
                                 <td colspan="2"><center><input type="submit" name="submit"></center></td>
                           </tr>
                           
                       </table>

                </div>
            </div>


            <div id="footer">
            </div>

           



      </body>
</html>
