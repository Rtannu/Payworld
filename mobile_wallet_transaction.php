<?php
        session_start();
        $id=$_SESSION['session_id'];
        $mobile_number=trim($_POST['number']);
        $mobile_operator=trim($_POST['operator']);
        $mobile_circle=trim($_POST['circle']);
        $amount=trim($_POST['amount']);
        $payment_mode=trim($_POST['payment']);
        $transaction_id=$id.time().uniqid(mt_rand(),true);
        $date =date("y/m/d");
        date_default_timezone_set('Asia/Kolkata');
        $time=date("g:i a");

        include_once'connectivity.php';
        try{
                           
             $database=new Connection();
             $db=$database->openConnection();                          
             $stm=$db->prepare("INSERT INTO mobile_transaction (mobile_payment_transaction_id,recharged_mobile_no,recharged_operator,	recharged_circle,recharged_amount,payment_mode,time,date) VALUES (:transaction_id,:mobile_no,:operator,:circle,:amount,:payment_mod,:current_time,:current_date)");                          
                           $stm->execute(array(':transaction_id'=> $transaction_id,':mobile_no'=>$mobile_number,':operator'=> $mobile_operator,':circle' => $mobile_circle,':amount' => $amount,':payment_mod' => $payment_mode,':current_time' => $time,':current_date'=> $date ));
                          
                           
                           #header("Location:dashboard.php");
                            }
       catch(PDOException $e)
              {
                 echo "There is some problem in connection: ".$e.getMessage();
              }
       try{       
             $stm=$db->prepare("select * from customer_info where email_id=:id");
             $stm->bindParam(":id",$id);
             $stm->execute();
             $stm->setFetchMode(PDO::FETCH_ASSOC);
             while($data=$stm->fetch())
                    {
                        $wallet=$data['amount'];
                    } 
           }
       catch(PDOException $e)
              {
                 echo "There is some problem in connection: ".$e.getMessage();
              }  

        try{
             $wallet=$wallet-$amount;
             $stm=$db->prepare("UPDATE customer_info set amount='$wallet' WHERE email_id='$id'");
             $stm->execute();  
           }
       catch(PDOException $e)
              {
                 echo "There is some problem in connection: ".$e.getMessage();
              } 
        $database->closeConnection();

      
          
              
?>
