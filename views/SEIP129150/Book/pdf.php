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
$html=<<<EOD

<!DOCTYPE html>
<html>
<head>
    
</head >
<body>
    <h1>Book List</h1>

    <div>
        <table class="table">
            <thead>
            <tr>
                <td>
                    SL#
                </td>
                <td>
                    ID
                </td>
                <td>
                    Title
                </td>
            </tr>
            <tr>
            $trs;
            </tr>
            
        </table>


    </div>

</body>
</html>

EOD;





$mpdf = new Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output("booklist.pdf",'D');
?>