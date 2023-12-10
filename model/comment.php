<?php
    include_once 'model/pdo.php';

   function comment_add($MaTK, $MaSP, $NoiDung){
    pdo_execute("INSERT INTO binhluan(`MaTK`,`MaSP`,`NoiDung`)
    VALUES (?,?,?)",$MaTK,$MaSP,$NoiDung);
   }

   function comment_getByProduct($MaSP){
    return pdo_query("SELECT * FROM binhluan bl INNER JOIN taikhoan tk
    ON bl.MaTK = tk.MaTK WHERE bl.MaSP = ?",$MaSP);
   }

   function get_comment(){
    return pdo_query("SELECT * FROM binhluan bl INNER JOIN taikhoan tk
    ON bl.MaTK = tk.MaTK");
   }
   
?>