<?php
function format_money($angka){ 
    $hasil =  number_format($angka,0, ',' , '.'); 
    return $hasil; 
}