<?php
         $menu_id=$_GET['menu_id'];
         if($menu_id==1)
            {
                header("Location:mobile.php");
                exit;
            }
         else if($menu_id==2)
           {
                header("Location:electricity.php");
                exit;
            }
         else if($menu_id==3)
            {
                header("Location:landline.php");
                exit;
            } 
         else if($menu_id==4)
            {
                header("Location:broadband.php");
                exit;
            }
        else if($menu_id==4)
            {
                header("Location:gas.php");
                exit;
            }
        else if($menu_id==4)
            {
                header("Location:water.php");
                exit;
            }
         
?>
