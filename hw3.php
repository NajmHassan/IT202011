<?php
$arr = [1,2,3,4,5,6,7,8,9];

echo "numbers in array are:<br>";
foreach($arr as $num){
    echo "$num <br>";
    }
    
echo "even numbers in array are:<br>"; 
foreach($arr as $num){
 if($num%2==0){
  echo "$num <br>";
  }
}
?>
