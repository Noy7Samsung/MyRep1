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
         <?php 
		 
				$wsdl = 'http://www.pttplc.com/webservice/pttinfo.asmx?wsdl';
	
				$client = new SoapClient($wsdl); 
				
				$methodName = 'CurrentOilPrice'; 
				
				$params = array('Language'=>'EN'); 
				
				$soapAction = 'http://www.pttplc.com/ptt_webservice/CurrentOilPrice'; 
				
				$objectResult = $client->__soapCall($methodName, array('parameters' => $params), array('soapaction' => $soapAction)); 
				
				echo $objectResult->CurrentOilPriceResult;
				echo '<pre>'.$objectResult->CurrentOilPriceResult.'</pre>';
		?>
  
</body>


    
    
</html>
    