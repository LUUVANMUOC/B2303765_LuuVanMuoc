<?php
    $a=[344,224,223,7737,9922,-828];
    $b=[-344,-324,123,773,-9922,828];
    $count_a = count($a);
    $count_b = count($b);
    $c=[];
    if($count_a!=$count_b){
        echo "2 mang ko cung do dai";
    }else{
        for($i=0;$i<$count_a;$i++){
            $c[$i]=$a[$i]+$b[$i];
        }
    }
    foreach($a as $i){
        echo $i . '    ';
    }
    echo '<br>';
    foreach($b as $i){
        echo $i . '    ';
    }
    echo '<br>';
    foreach($c as $i){
        echo $i . '    ';
    }
?>