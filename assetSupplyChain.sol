pragma solidity ^0.4.23;

contract assetSupplyChain{
    
    // Variables
    string public assetName = "Undefined";
    string public assetModel = "Undefined";
    string public assetColor = "Undefined";
    string public assetID = "Undefined";
    string public assetDesc = "Undefined";   
    string public assetStatus = "Undefined";
    
    // Setter Functions
    function setAssetName(string newAssetName){
        assetName = newAssetName;
    }
    function setAssetModel(string newAssetModel){
        assetModel = newAssetModel;
    }
    function setAssetColor(string newAssetColor){
        assetColor = newAssetColor;
    }
    function setAssetID(string newAssetID){
        assetID =  newAssetID;
    }
    function setAssetDesc(string newAssetDesc){
        assetDesc = newAssetDesc;
    }
    
    // Getter Functions
    function PortA(string newAssetName, string newAssetModel, string newAssetColor, string newAssetID, string newAssetDesc, string lockedStatus) returns (string) {
        assetName = newAssetName;
        assetModel = newAssetModel;
        assetColor = newAssetColor;
        assetID = newAssetID;
        assetDesc = newAssetDesc;
        
        if(keccak256(lockedStatus) == keccak256("yes")){
            assetStatus = "Authorization Denied";
        }else {
            assetStatus = "Authorization Granted. Sent to Inspection at Port B";
        }
        
    }
    
    function PortB() returns (string){
        if(keccak256(assetName) == keccak256("UPhone")){
            assetStatus = "This Asset (UPhone)is an illegal product";
        }else {
            assetStatus = "Asset is inspected and ready to be exported to Port C";
        }
    }
    
    function PortC() returns (string){
        if(keccak256(assetName) == keccak256("UPhone")){
            assetStatus = "Illegal Item received. Please contact authorities immediately";
        }else {
            assetStatus = "Asset is recevied at Port C";
        }
    }
    
}