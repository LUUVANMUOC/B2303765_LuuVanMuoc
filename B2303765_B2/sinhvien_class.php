<?php
    class SinhVien {
        private $mssv;
        private $hoten;
        private $ngaysinh;
        function set_mssv($mssv){
            $this->mssv=$mssv;
        }
        function set_hoten($hoten){
            $this->hoten=$hoten;
        }
        function set_ngaysinh($ngaysinh){
            $this->ngaysinh=$ngaysinh;
        }
        function get_mssv(){
            return $this->mssv;
        }
        function get_hoten(){
            return $this->hoten;
        }
        function get_ngaysinh(){
            return $this->ngaysinh;
        }
        function __destruct(){}
        function __construct($mssv,$hoten,$ngaysinh){
            $this->mssv=$mssv;
            $this->hoten=$hoten;
            $this->ngaysinh=$ngaysinh;
        }
        function tinhtuoi(){
            $d1= new DateTime($this->ngaysinh);
            $d2 = new DateTime();
            return $d1->diff($d2)->y;
        }
    }
    $s1= new SinhVien('1','muoc','2005-08-29');
    echo 'MSSV: '.$s1->get_mssv() .' Họ Tên: '.$s1->get_hoten(). ' Tuổi: '.$s1->tinhtuoi();
?>