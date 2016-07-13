<?php

require_once('../../../vendor/mpdf/mpdf/mpdf.php');
include_once('../../../vendor/autoload.php');
$book=new \App\BITM\SEIP129150\Book\Book();
$allbook=$book->index();
$trs="";
$sl=0;
foreach ($allbook as $book) {
//    var_dump($book);
//    die();
    $sl++;
    $trs.="<tr>";
    $trs.="<td>$sl</td>";
    $trs.="<td>".$book['id']."</td>";
    $trs.="<td>".$book['title']."</td>";
    $trs.="</tr>";


}




$mpdf = new Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();