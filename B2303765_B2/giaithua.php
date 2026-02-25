<?php
    function giaithua($a){
        $kq=1;
        for($a;$a>=1;$a--){
            $kq=$kq*$a;
        }
        return $kq;
    }
    echo "10! = ".giaithua(10);
?>