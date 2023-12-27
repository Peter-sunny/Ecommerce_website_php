<?php
include_once 'db-connect.php';
include_once 'session.php';

    
                                     $mysqli->query ("DELETE  FROM newsmaker");
                                     // $stmt4->execute();
                                        
                                     $mysqli->query ("ALTER TABLE newsmaker AUTO_INCREMENT = 1");


                     $stmt4->close();
                  
               ?>