<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PTT WEB SERVICE</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">


 
</head>                  

<body>
       <div style="max-width:100%;width:400px;margin:auto;">
         <h3>ราคานำ้มันวันนี้</h3>
    
         <?php 
         		echo "processing...";
			$client = new SoapClient("http://www.pttplc.com/webservice/pttinfo.asmx?WSDL",
			array(
				"trace"      => 1,		// enable trace to view what is happening
				"exceptions" => 0,		// disable exceptions
				"cache_wsdl" => 0) 		// disable any caching on the wsdl, encase you alter the wsdl server
			);

			
			$params = array(
			   'Language' => "th",
			   'DD' => date('d'),
			   'MM' => date('m'),
			   'YYYY' => date('Y')
			);
			echo "before call";
		    $data = $client->GetOilPrice($params);
			$ob = $data->GetOilPriceResult;
            $xml = new SimpleXMLElement($ob);
           
			echo $data;
               // PRICE_DATE , PRODUCT ,PRICE
            foreach ($xml  as  $key =>$val) {  
				if($val->PRICE != ''){
				  echo $val->PRODUCT .'  '.$val->PRICE.' บาท<br>';
				}
            }
			echo "after call";
         ?>
           
   </div>
  
</body>


    
    
</html>
    