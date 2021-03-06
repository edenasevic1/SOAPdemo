<?php 
	require_once "lib/nusoap.php";

	function getProd($category){
		if($category == "books"){
			return join(",", array(
				"The WordPress Anthology",
				"PHP Master: Write Cutting Edge Code",
				"Build Your Own Website the Right Way"));
		}
		else if($category == "phone"){
			return join(", ", array(
				"Android",
				"iPhone",
				"WinPhone"));
		}
		else {
			return "No products listed under that category";
		}
	}
	if(!isset($HTTP_RAW_POST_DATA)) $HTTP_RAW_POST_DATA = file_get_contents('php://input');
	$server = new soap_server();
	$server->configureWSDL("productlist", "urn:productlist");

	$server->register("getProd",
		array("category" => "xsd:string"),
		array("return" => "xsd:string"),
		"urn:productlist",
		"urn:productlist#getProd",
		"rpc",
		"encoded",
		"Get a listing of products by category");
	$server->service($HTTP_RAW_POST_DATA);
?>