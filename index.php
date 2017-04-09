<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PTT WEB SERVICE</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">



<style>

*{margin:0;padding:0;}

                        

</style>

  
</head>                  

<body>
       <div style="max-width:100%;width:400px;margin:auto;">
         <h3>ราคานำ้มันวันนี้</h3>
    
         <?php 
		 
			$curl_h=curl_init();
curl_setopt($curl_h, CURLOPT_URL, "http://www.pttplc.com/en/GetOilPrice.aspx");
curl_setopt($curl_h, CURLOPT_RETURNTRANSFER, true);
$page_c=curl_exec($curl_h);
curl_close($curl_h);

preg_match('/ALPHA\-X 91.+/sim', $page_c, $extr_1);
$extr_1=strip_tags($extr_1[0]);
preg_match('/[1-9][0-9]{0,2}\.[0-9]{0,3}/', $extr_1, $extr_2);
$extr_2=$extr_2[0]*1;
echo('PTT ALPHA-X 91ราคา '.$extr_2.' บาท/ลิตร<br>'."\r\n");

preg_match('/GASOHOL.+/sim', $page_c, $extr_1);
$extr_1=strip_tags($extr_1[0]);
preg_match('/[1-9][0-9]{0,2}\.[0-9]{0,3}/', $extr_1, $extr_2);
$extr_2=$extr_2[0]*1;
echo('PTT GASOHOL 95 ราคา '.$extr_2.' บาท/ลิตร<br>'."\r\n");

preg_match('/GASOHOL 91.+/sim', $page_c, $extr_1);
$extr_1=strip_tags($extr_1[0]);
preg_match('/[1-9][0-9]{0,2}\.[0-9]{0,3}/', $extr_1, $extr_2);
$extr_2=$extr_2[0]*1;
echo('PTT GASOHOL 91 ราคา '.$extr_2.' บาท/ลิตร<br>'."\r\n");

preg_match('/E20 PLUS.+/sim', $page_c, $extr_1);
$extr_1=strip_tags($extr_1[0]);
preg_match('/[1-9][0-9]{0,2}\.[0-9]{0,3}/', $extr_1, $extr_2);
$extr_2=$extr_2[0]*1;
echo('PTT E20 PLUS ราคา '.$extr_2.' บาท/ลิตร<br>'."\r\n");

preg_match('/E85 PLUS.+/sim', $page_c, $extr_1);
$extr_1=strip_tags($extr_1[0]);
preg_match('/[1-9][0-9]{0,2}\.[0-9]{0,3}/', $extr_1, $extr_2);
$extr_2=$extr_2[0]*1;
echo('PTT E85 PLUS ราคา '.$extr_2.' บาท/ลิตร<br>'."\r\n");

preg_match('/DELTA\-X.+/sim', $page_c, $extr_1);
$extr_1=strip_tags($extr_1[0]);
preg_match('/[1-9][0-9]{0,2}\.[0-9]{0,3}/', $extr_1, $extr_2);
$extr_2=$extr_2[0]*1;
echo('PTT DELTA-X ราคา '.$extr_2.' บาท/ลิตร<br>'."\r\n");
         ?>
           
   </div>
  
</body>


    
    
</html>
    