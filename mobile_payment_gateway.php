<?php 
                             session_start();
                             if(!isset($_SESSION['session_id']))
                             header("Location:index.php");
                             
                             $payment_mode=trim($_POST['payment']);
                           
                             
                             if($payment_mode==="wallet")
                                {
                                     include'mobile_wallet_transaction.php';
                                     header("Location:dashboard.php");
                                }
                             else if($payment_mode==="card")
                                {
                                    
                                     header("Location:mobile_card_transaction.php");
                                 }
                             else if($payment_mode==="net_banking")
                                {
                                      
                                   header("Location:mobile_netbanking_transaction.php");
                                } 
                             
                              
                          
?>
