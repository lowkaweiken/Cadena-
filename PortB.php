<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/imperialsofetch.png">
    <title>PORT B | Cadena Supply Chain Tracker</title>
    <!-- Bootstrap Core CSS -->
    <link href="plugins/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
</head>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="web3.min.js"></script>

<script type="text/javascript">
if (typeof web3 !== 'undefined') {
  web3 = new Web3(web3.currentProvider);
} else {
  // set the provider you want from Web3.providers
  web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:8545"));
}
var contractAddress = "0x1930e7f9f65da8ec30f07b0547ff9c1e9259227c";
var ABIArray = [
	{
		"constant": false,
		"inputs": [
			{
				"name": "newAssetName",
				"type": "string"
			},
			{
				"name": "newAssetModel",
				"type": "string"
			},
			{
				"name": "newAssetColor",
				"type": "string"
			},
			{
				"name": "newAssetID",
				"type": "string"
			},
			{
				"name": "newAssetDesc",
				"type": "string"
			},
			{
				"name": "lockedStatus",
				"type": "string"
			}
		],
		"name": "PortA",
		"outputs": [
			{
				"name": "",
				"type": "string"
			}
		],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [],
		"name": "PortB",
		"outputs": [
			{
				"name": "",
				"type": "string"
			}
		],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [],
		"name": "PortC",
		"outputs": [
			{
				"name": "",
				"type": "string"
			}
		],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [
			{
				"name": "newAssetColor",
				"type": "string"
			}
		],
		"name": "setAssetColor",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [
			{
				"name": "newAssetDesc",
				"type": "string"
			}
		],
		"name": "setAssetDesc",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [
			{
				"name": "newAssetID",
				"type": "string"
			}
		],
		"name": "setAssetID",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [
			{
				"name": "newAssetModel",
				"type": "string"
			}
		],
		"name": "setAssetModel",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [
			{
				"name": "newAssetName",
				"type": "string"
			}
		],
		"name": "setAssetName",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "assetColor",
		"outputs": [
			{
				"name": "",
				"type": "string"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "assetDesc",
		"outputs": [
			{
				"name": "",
				"type": "string"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "assetID",
		"outputs": [
			{
				"name": "",
				"type": "string"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "assetModel",
		"outputs": [
			{
				"name": "",
				"type": "string"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "assetName",
		"outputs": [
			{
				"name": "",
				"type": "string"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "assetStatus",
		"outputs": [
			{
				"name": "",
				"type": "string"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	}
];


var balance = 0;
var name = "";
$(document).ready(function($){
	


	//PORT B - Mobile Inspection
	$("#inspection").on("click",function(){
		
			var myContract = web3.eth.contract(ABIArray).at(contractAddress);
			myContract.PortB(function(err,result){
				assetStatus = result;
			})
	});
		$("#getResult").on("click",function(){
		var assetStatus = "";
		var assetName = "";
		var assetModel = "";
		var assetColor = "";
		var assetID = "";
		var assetDesc = "";
		var lockStatus = "";

		const promise = new Promise(function(resolve){

			var myContractResult = web3.eth.contract(ABIArray).at(contractAddress);
			myContractResult.assetStatus(function(err,result){
				assetStatus = result;
				
			})
			myContractResult.assetName(function(err,result){
				assetName = result;
				
			})
			myContractResult.assetModel(function(err,result){
				assetModel = result;
				
			})
			myContractResult.assetColor(function(err,result){
				assetColor = result;
			})
			myContractResult.assetID(function(err,result){
				assetID = result;
				
			})
			myContractResult.assetDesc(function(err,result){
				assetDesc = result;
				resolve();
			})
		});
		promise.then(function(){
			var block = "<br>Status: "+assetStatus+"<br>Asset Name: "+assetName+"<br>Asset Model: "+assetModel+"<br>Asset Color: "+assetColor +"<br>Asset ID: "+assetID+"<br>Asset Description: "+assetDesc;
			$("#infomation_result").html(block).show();
		});
	});
})

</script>
<body>
	
	<div class="container-fluid">
		<h3>PORT B - MiddleMan aka Customs Department</h3>
	<button id="inspection">Inspect</button>
	<button id="getResult">Get Inspection Result</button>
	<div>Status: 
		<span id="infomation_result"></span>
	</div>
	</div>
	

	
	    <!-- jQuery -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="plugins/bower_components/bootstrap/dist/js/tether.min.js"></script>
    <script src="plugins/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <!--Style Switcher -->
	
</body>