<?php
      class Connection
                     {
                       private $server="mysql:host=localhost;dbname=payworld";
                       private $user="root";
                       private $pwd="";
                       private $option=array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,);
                       protected $con;
                       
                       public function openConnection()
                             {
                                try
                                  {
                                    $this->con=new PDO($this->server,$this->user,$this->pwd,$this->option);
                                    return $this->con;
                                  }
                                catch(PDOException $e)
                                  {
                                    echo "There is some problem in connection".$e->getMessage(); 
                                  }
                             }
                        
                        public function closeConnection()
                             {
                                $this->con=null;
                             }
                     }
?>
