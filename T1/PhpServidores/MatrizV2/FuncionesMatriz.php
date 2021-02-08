<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            
            $matriz = array();
            function crearMatriz($fil,$col){
                
                for($i = 0; $i < $fil ; $i++){
                    
                  for($j = 0; $j < $col; $j++){
                      $matriz[$i][$j] = rand(1,50);
                  }  
                    
                }
                return $matriz;
            }
            
            function mostrarMatriz($mat){
                
                echo"<table border=1>";
                for($i = 0; $i < count($mat) ; $i++){
                    
                    echo"<tr>";
                    
                  for($j = 0; $j < count($mat[0]); $j++){
                      echo "<td>".$mat[$i][$j]."</td>";
                  }  
                  
                  echo"</tr>";
                    
                }
                
                echo"</table>";
            }
            
            function mostrarSumFilas($mat){
                $sum = array();
                for($i = 0; $i < count($mat) ; $i++){

                    $suma = 0;
                    
                  for($j = 0; $j < count($mat[0]); $j++){
                      $suma = $suma + $mat[$i][$j];
                  }  
                  
                  $sum[$i] = $suma;
                    
                }
                
                return $sum;
            }
            
            function mostrarSumColumnas($mat){
                $sum = array();
                for($j = 0; $j < count($mat[0]) ; $j++){
                    
                    $suma = 0;
                    
                  for($i = 0; $i < count($mat); $i++){
                      $suma = $suma + $mat[$i][$j];
                  }  
                  
                  $sum[$j] = $suma;
                    
                }
                
                return $sum;
                
            }
            
            function sumaTotal($mat){
                $suma = 0;
                for($i = 0; $i < count($mat) ; $i++){
                    
                  for($j = 0; $j < count($mat[0]); $j++){
                      $suma = $suma + $mat[$i][$j];
                  }  
                    
                }
                return $suma;
            }
            
            function sumaDiagonal($mat){
                $suma = 0;
                for($i = 0; $i < count($mat) ; $i++){
                    
                  for($j = 0; $j < count($mat[0]); $j++){
                      if($i == $j){
                         $suma = $suma + $mat[$i][$j]; 
                      }
                  }  
                    
                }
                return $suma;
            }

            function crearMatrizT($mat){
                
                foreach($mat as $fil => $value){
                  foreach($value as $col => $svalue){
                      $matT[$col][$fil] = $svalue;
                  }     
                }
                return $matT;
            }

        ?>
    </body>
</html>