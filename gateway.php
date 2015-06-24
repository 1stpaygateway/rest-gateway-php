<?php global $apiUrl, $result, $status, $version;
    class Transaction implements JsonSerializable {
        /**
        * Transaction class: Ties into the PHP JSON Functions & makes them easily available to the Blaze class.
        * Using the class like so: $a = json_encode(new Transaction($txnarray), JSON_PRETTY_PRINT)
        * Will produce json data that the gateway should understand.
        */
    public function __construct(array $array) {
        $this->array = $array;
    }

    public function jsonSerialize() {
        return $this->array;
        }
    }


class Blaze{
    /**
    * Blaze Class: A library of functions used to call the 1stPayBlaze web service.
    * This class is required for every PHP web page making a call to 1stPayBlaze. 
    * This class/file contains all allowed executable methods.
    * Please refer to the gateway documentation web page for specifics on what parameters to use for each call.
    * Last modified: 6/15/2015
    * @author Patrick Petrino
    * @version 1.0.0
    *
    *
    */
    public function __construct(){
        global $apiUrl, $result, $status;
        $this->version = "1.0.0";
        $this->apiUrl = "https://secure.1stpaygateway.net/secure/1stPayClientProxy/Gateway/Transaction/";
        $this->result = array();
        $this->status = "";
        //apiUrl, result, status have to be declared globally this way, otherwise not all the functions can see it.
  }

    public function createAuth($transactionData, $callBackSuccess, $callBackFailure){
        $apiRequest = $this->apiUrl . "Auth";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
    }
    public function createAuthUsing1stPayVault($transactionData, $callBackSuccess, $callBackFailure){
        $apiRequest = $this->apiUrl ."AuthUsingVault";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
    }
    public function closeBatch($transactionData, $callBackSuccess, $callBackFailure){
        $apiRequest = $this->apiUrl . "CloseBatch";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
    }
    public function createCredit($transactionData, $callBackSuccess, $callBackFailure){
        $apiRequest = $this->apiUrl . "Credit";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
    }
    public function createCreditRetailOnly($transactionData, $callBackSuccess, $callBackFailure){
        $apiRequest = $this->apiUrl . "CreditRetailOnly";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
    }
    public function createCreditRetailOnlyUsing1stPayVault($transactionData, $callBackSuccess, $callBackFailure){
        $apiRequest = $this->apiUrl ."CreditRetailOnlyUsingVault";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
    }
    public function query($transactionData, $callBackSuccess, $callBackFailure){
        $apiRequest = $this->apiUrl . "Query";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
    }
    public function createSale($transactionData, $callBackSuccess, $callBackFailure){
        $apiRequest = $this->apiUrl . "Sale";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
    }
    public function createSaleUsing1stPayVault($transactionData, $callBackSuccess, $callBackFailure){
        $apiRequest = $this->apiUrl . "SaleUsingVault";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
    }
    public function createReAuth($transactionData, $callBackSuccess, $callBackFailure){
        $apiRequest = $this->apiUrl . "ReAuth";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
    }
    public function createReDebit($transactionData, $callBackSuccess, $callBackFailure){
        $apiRequest = $this->apiUrl . "ReDebit";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
    }
    public function createReSale($transactionData, $callBackSuccess, $callBackFailure){
        $apiRequest = $this->apiUrl . "ReSale";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
    }
    public function performSettle($transactionData, $callBackSuccess, $callBackFailure){
        $apiRequest = $this->apiUrl . "Settle";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
    }
    public function applyTipAdjust($transactionData, $callBackSuccess, $callBackFailure){
        $apiRequest = $this->apiUrl ."TipAdjust";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
    }
    public function performVoid($transactionData, $callBackSuccess, $callBackFailure){
        $apiRequest = $this->apiUrl . "Void";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
    }
    public function performPartialVoid($transactionData, $callBackSuccess, $callBackFailure){
        $apiRequest = $this->apiUrl . "VoidPartial";
        performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
    }
         /*************************************************************************************
                                        ACH METHODS
         *************************************************************************************/

    public function performAchVoid($transactionData, $callBackSuccess, $callBackFailure){
        $apiRequest = $this->apiUrl ."AchVoid";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
    }
    public function createAchCredit($transactionData, $callBackSuccess, $callBackFailure){
        $apiRequest = $this->apiUrl . "AchCredit";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
    }
    public function createAchDebit($transactionData, $callBackSuccess, $callBackFailure){
        $apiRequest = $this->apiUrl . "AchDebit";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
    }
    public function createAchCreditUsing1stPayVault($transactionData, $callBackSuccess, $callBackFailure){
        $apiRequest = $this->apiUrl . "AchCreditUsingVault";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
    }
    public function createAchDebitUsing1stPayVault($transactionData, $callBackSuccess, $callBackFailure){
        $apiRequest = $this->apiUrl . "AchDebitUsingVault";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
    }
    public function getAchCategories($transactionData, $callBackSuccess, $callBackFailure){
        $apiRequest = $this->apiUrl . "AchGetCategories";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
    }
         /*************************************************************************************
                                        VAULT METHODS
         *************************************************************************************/
    public function createVaultContainer($transactionData, $callBackSuccess, $callBackFailure) {
        $apiRequest = $this->apiUrl . "VaultCreateContainer";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
        }
    public function createVaultAchRecord($transactionData, $callBackSuccess, $callBackFailure) {
        $apiRequest = $this->apiUrl . "VaultCreateAchRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
        }
    public function createVaultCreditCardRecord($transactionData, $callBackSuccess, $callBackFailure) {
        $apiRequest = $this->apiUrl . "VaultCreateCCRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
        }
    public function createVaultShippingRecord($transactionData, $callBackSuccess, $callBackFailure) {
        $apiRequest = $this->apiUrl . "VaultCreateShippingRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
        }
    public function deleteVaultContainerAndAllAsscData($transactionData, $callBackSuccess, $callBackFailure) {
        $apiRequest = $this->apiUrl . "VaultDeleteContainerAndAllAsscData";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
        }
    public function deleteVaultAchRecord($transactionData, $callBackSuccess, $callBackFailure) {
        $apiRequest = $this->apiUrl . "VaultDeleteAchRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
        }
    public function deleteVaultCreditCardRecord($transactionData, $callBackSuccess, $callBackFailure) {
        $apiRequest = $this->apiUrl . "VaultDeleteCCRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
        }
    public function deleteVaultShippingRecord($transactionData, $callBackSuccess, $callBackFailure) {
        $apiRequest = $this->apiUrl . "VaultDeleteShippingRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
        }
    public function updateVaultContainer($transactionData, $callBackSuccess, $callBackFailure) {
        $apiRequest = $this->apiUrl . "VaultUpdateContainer";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
        }
    public function updateVaultAchRecord($transactionData, $callBackSuccess, $callBackFailure) {
        $apiRequest = $this->apiUrl . "VaultUpdateAchRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
        }
    public function updateVaultCreditCardRecord($transactionData, $callBackSuccess, $callBackFailure) {
        $apiRequest = $this->apiUrl ."VaultUpdateCCRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
        }
    public function updateVaultShippingRecord($transactionData, $callBackSuccess, $callBackFailure) {
        $apiRequest = $this->apiUrl . "VaultUpdateShippingRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
        }
    public function queryVaults($transactionData, $callBackSuccess, $callBackFailure) {
        $apiRequest = $this->apiUrl . "VaultQueryVault";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
        }
    public function queryVaultForCreditCardRecords($transactionData, $callBackSuccess, $callBackFailure) {
        $apiRequest = $this->apiUrl . "VaultQueryCCRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
        }
    public function queryVaultForAchRecords($transactionData, $callBackSuccess, $callBackFailure) {
        $apiRequest = $this->apiUrl . "VaultQueryAchRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
        }
    public function queryVaultForShippingRecords($transactionData, $callBackSuccess, $callBackFailure) {
        $apiRequest = $this->apiUrl . "VaultQueryShippingRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
        }
    public function generateTokenFromCreditCard($transactionData, $callBackSuccess, $callBackFailure) {
        $apiRequest = $this->apiUrl . "GenerateTokenFromCreditCard";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
        }
    public function getCreditCardFromToken($transactionData, $callBackSuccess, $callBackFailure) {
        $apiRequest = $this->apiUrl . "GetCreditCardFromToken";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->status >= 500 && $this->status <= 599){call_user_func ($callBackFailure);}
        if ($this->status >= 400 && $this->status <= 499){call_user_func ($callBackFailure);}
        if ($this->status >= 200 && $this->status <= 299){call_user_func ($callBackSuccess);}
        }
    
         /*************************************************************************************
                                        PROCESSING REQUEST
         *************************************************************************************/

    protected function performRequest($data, $apiRequest, $callBackSuccess, $callBackFailure){
            /**
            * performRequest: this function is responsible for actually submitting the gateway request.
            * It also parses the response and sends it back to the original call.
            * The function works as follows: 
            * 1. Set up input data so the gateway can understand it
            * 2. Set up cURL request. Note that since this is SOAP we have to pass very specific options.
            * Also note that since cURL is picky, we have to turn off SSL verification. We're still transmitting https, though.
            * 3. Parse the response based on the information returned from the gateway and return it as an array.
            * The resulting array is stored in $this->result in the Blaze object.
            */
        try{
        if ($data == NULL){$data = array(); }
        $url = $apiRequest;
        $this->result = array();
        $jsondata = json_encode(new Transaction($data),JSON_PRETTY_PRINT);
        $jsondata = utf8_encode($jsondata);
        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $jsondata);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array(
        "Content-type: application/json; charset-utf-8",
        'Content-Length: ' . strlen($jsondata)));
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($curl_handle);
        $this->status = curl_getinfo($curl_handle,CURLINFO_HTTP_CODE);
        if(connection_aborted()){
            //This will handle aborted requests that PHP can detect, returning a result that indicates POST was aborted.
           $this->result = array(
                    'isError' => TRUE,
                    'errorMessages' => "Request Aborted",
                    'isValid' => FALSE,
                    'validations' => array(),
                    'action' => "gatewayError");
            return $this->result;
        }
     $jresult = (json_decode($response, TRUE));
     $case = strtolower($jresult["action"]);
     if ($jresult["isSuccess"]){
            if($jresult["data"]["isPartial"] == TRUE){
                //Set up partial order results
                //PHP development environment warns when this variable doesn't exist.
                //But most PHP configurations for production environments won't warn isPartial doesn't exist
                        $this->result = array(
                        "isPartial" => TRUE,
                        "partialOrder" => array(
                            "partialId" => $jresult["data"]["partialId"],
                            "amountRemaining" => $jresult["data"]["originalFullAmount"] - $jresult["data"]["partialAmountApproved"],
                            "originalFullAmount" => $jresult["data"]["originalFullAmount"],
                            "amountApproved" => $jresult["data"]["partialAmountApproved"]),
                        "orderId" => $jresult["data"]["orderId"],
                        "authCode" => $jresult["data"]["authCode"]);
                        return $this->result; }
            else{foreach($jresult["data"] as $key => $value){
                    $this->result[$key] = $value;}
                    //$this->result = array(
                    //"isSuccess" => TRUE,
                    //"data" => $jresult["data"]);
                    //return $this->result; 
                    }
            return $this->result;
     }
      if ($jresult["validationHasFailed"]){
                $this->result = array(
                'isError' => FALSE,
                'errors' => $jresult["errorMessages"],
                'isValid' => FALSE,
                'validations' => $jresult["validationFailures"]);
                return $this->result;
             }
        if (curl_errno($curl_handle) == 28 ){
                //This will handle timeouts as per cURL error definitions.
               $this->result = array(
                    'isError' => TRUE,
                    'errorMessages' => "Request Timed Out",
                    'isValid' => FALSE,
                    'validations' => array(),
                    'action' => "gatewayError"); 
                return $this->result;
        }

        if ($jresult["isError"]){
                //This will handle the errors. May need to do further checking on response.
                $this->result = array(
                    'isError' => TRUE,
                    'errors' => $jresult["errorMessages"],
                    'isValid' => FALSE,
                    'validations' => $jresult["validationFailures"]);
                return $this->result; }
        return $this->result;} 
        catch (Exception $e){var_dump($e->getMessage());}
        }
}
$Blaze = new Blaze();
?>
