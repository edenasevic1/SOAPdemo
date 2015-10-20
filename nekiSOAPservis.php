<?php
	//require_once "lib/nusoap.php";

	$params = array(
	  "FromCurrency" => "EUR",
	  "ToCurrency" => "USD"
	);
	$soap = "http://www.webservicex.net/CurrencyConvertor.asmx?WSDL";
	$client = new SoapClient($soap);
	$result = $client->ConversionRate($params);
	print_r($result->ConversionRateResult);

	echo "<br>";

	var_dump($result);
	//$result = $client->call("GetCurrencies");
	//echo "<pre>" . htmlspecialchars($result, ENT_QUOTES) . "</pre>";
?>