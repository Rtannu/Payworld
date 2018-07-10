<?php
       
       session_start();
       if(!isset($_SESSION['session_id']))
          header("Location:admin_login.php");
       
?>
<?php
         $menu_id=$_GET['menu_id'];
         if($menu_id==1)
            {
                header("Location:user_details.php");
                exit;
            }
         else if($menu_id==2)
           {
                header("Location:update_user_detail.php");
                exit;
            }
         else if($menu_id==3)
            {
                header("Location:mobile_transaction_details.php");
                exit;
            } 
         else if($menu_id==4)
            {
                header("Location:update_mobile_transaction.php");
                exit;
            }
        else if($menu_id==6)
            {
               header("Location:delete_user.php");
               exit;
            }
        else if($menu_id==7)
           {
               header("Location:sales_info.php");
               exit;
           }
        else if($menu_id==9)
           {
               header("Location:dashboard.php");
               exit;
           }
        else if($menu_id==10)
           {
               header("Location:search_transaction_id.php");
           }
         
?>
