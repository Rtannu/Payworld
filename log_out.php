<?php
       session_start();
       if(isset($_SESSION['session_id']))
              {
                  unset($_SESSION['session_id']);
                  header("Location:login.php");
              }
?>
