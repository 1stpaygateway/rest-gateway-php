<?php
    class Transaction implements JsonSerializable {
        /**
        * Transaction class: Ties into the PHP JSON Functions & makes them easily available to the RestGateway class.
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


class RestGateway{
    /**
    * RestGateway Class: A library of functions used to call the REST API web service.
    * This class is required for every PHP web page making a call to 1stPay REST API.
    * This class/file contains all allowed executable methods.
    * Please refer to the gateway documentation web page for specifics on what parameters to use for each call.
    * Last modified: 6/23/2016
    * @version 1.2.0
    *
    *
    */

    public $Result = array();
    public $Status = "";
    private $Url = "https://secure.1stpaygateway.net/secure/RestGW/Gateway/Transaction/";
    private $TestMode = FALSE;
    private $Version = "1.2.0";

    public function __construct(){ }

    public function SwitchEnv()
    {
      // Switch between production and validation
      if($this->Url == "https://secure.1stpaygateway.net/secure/RestGW/Gateway/Transaction/")
      {
        $this->Url = "https://secure-v.goemerchant.com/secure/RestGW/Gateway/Transaction/";
        $this->TestMode = TRUE;
        return TRUE;
      }
      elseif ($this->Url == "https://secure-v.goemerchant.com/secure/RestGW/Gateway/Transaction/")
      {
        $this->Url = "https://secure.1stpaygateway.net/secure/RestGW/Gateway/Transaction/";
        $this->TestMode = FALSE;
        return TRUE;
      }
      else
      {
        $this->Url = "https://secure.1stpaygateway.net/secure/RestGW/Gateway/Transaction/";
        $this->TestMode = FALSE;
        return TRUE;
      }
    }

    public function GetResult()
    {
      return $this->Result;
    }

    public function createAuth($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL){
        $apiRequest = $this->Url . "Auth";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }
    public function createAuthUsing1stPayVault($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL){
        $apiRequest = $this->Url ."AuthUsingVault";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }
    public function closeBatch($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL){
        $apiRequest = $this->Url . "CloseBatch";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }
    public function createCredit($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL){
        $apiRequest = $this->Url . "Credit";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }
    public function createCreditRetailOnly($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL){
        $apiRequest = $this->Url . "CreditRetailOnly";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }
    public function createCreditRetailOnlyUsing1stPayVault($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL){
        $apiRequest = $this->Url ."CreditRetailOnlyUsingVault";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }
    public function query($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL){
        $apiRequest = $this->Url . "Query";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }
    public function createSale($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL){
        $apiRequest = $this->Url . "Sale";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }
    public function createSaleUsing1stPayVault($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL){
        $apiRequest = $this->Url . "SaleUsingVault";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }
    public function createReAuth($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL){
        $apiRequest = $this->Url . "ReAuth";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }
    public function createReDebit($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL){
        $apiRequest = $this->Url . "ReDebit";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }
    public function createReSale($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL){
        $apiRequest = $this->Url . "ReSale";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }
    public function performSettle($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL){
        $apiRequest = $this->Url . "Settle";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }
    public function applyTipAdjust($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL){
        $apiRequest = $this->Url ."TipAdjust";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }
    public function performVoid($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL){
        $apiRequest = $this->Url . "Void";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }
         /*************************************************************************************
                                        ACH METHODS
         *************************************************************************************/

    public function performAchVoid($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL){
        $apiRequest = $this->Url ."AchVoid";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }
    public function createAchCredit($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL){
        $apiRequest = $this->Url . "AchCredit";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }
    public function createAchDebit($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL){
        $apiRequest = $this->Url . "AchDebit";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }
    public function createAchCreditUsing1stPayVault($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL){
        $apiRequest = $this->Url . "AchCreditUsingVault";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }
    public function createAchDebitUsing1stPayVault($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL){
        $apiRequest = $this->Url . "AchDebitUsingVault";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }
    public function getAchCategories($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL){
        $apiRequest = $this->Url . "AchGetCategories";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }
    public function createAchCategories($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL){
        $apiRequest = $this->Url . "AchCreateCategory";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }
    public function deleteAchCategories($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL){
        $apiRequest = $this->Url . "AchDeleteCategory";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }
    public function setupAchStore($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL){
        $apiRequest = $this->Url . "AchSetupStore";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }
         /*************************************************************************************
                                        VAULT METHODS
         *************************************************************************************/
    public function createVaultContainer($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL) {
        $apiRequest = $this->Url . "VaultCreateContainer";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
        }
    public function createVaultAchRecord($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL) {
        $apiRequest = $this->Url . "VaultCreateAchRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
        }
    public function createVaultCreditCardRecord($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL) {
        $apiRequest = $this->Url . "VaultCreateCCRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
        }
    public function createVaultShippingRecord($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL) {
        $apiRequest = $this->Url . "VaultCreateShippingRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
        }
    public function deleteVaultContainerAndAllAsscData($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL) {
        $apiRequest = $this->Url . "VaultDeleteContainerAndAllAsscData";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
        }
    public function deleteVaultAchRecord($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL) {
        $apiRequest = $this->Url . "VaultDeleteAchRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
        }
    public function deleteVaultCreditCardRecord($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL) {
        $apiRequest = $this->Url . "VaultDeleteCCRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
        }
    public function deleteVaultShippingRecord($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL) {
        $apiRequest = $this->Url . "VaultDeleteShippingRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
        }
    public function updateVaultContainer($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL) {
        $apiRequest = $this->Url . "VaultUpdateContainer";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
        }
    public function updateVaultAchRecord($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL) {
        $apiRequest = $this->Url . "VaultUpdateAchRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
        }
    public function updateVaultCreditCardRecord($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL) {
        $apiRequest = $this->Url ."VaultUpdateCCRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
        }
    public function updateVaultShippingRecord($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL) {
        $apiRequest = $this->Url . "VaultUpdateShippingRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
        }
    public function queryVaults($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL) {
        $apiRequest = $this->Url . "VaultQueryVault";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
        }
    public function queryVaultForCreditCardRecords($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL) {
        $apiRequest = $this->Url . "VaultQueryCCRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
        }
    public function queryVaultForAchRecords($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL) {
        $apiRequest = $this->Url . "VaultQueryAchRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
        }
    public function queryVaultForShippingRecords($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL) {
        $apiRequest = $this->Url . "VaultQueryShippingRecord";
        $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
        if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
        if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
        }

  	/*************************************************************************************
                                          MISC METHODS
  	*************************************************************************************/

  	public function modifyRecurring($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL) {
      $apiRequest = $this->Url . "RecurringModify";
      $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
      if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
      if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
      if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }

    public function submitAcctUpdater($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL) {
      $apiRequest = $this->Url . "AccountUpdaterSubmit";
      $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
      if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
      if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
      if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }

    public function submitAcctUpdaterVault($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL) {
      $apiRequest = $this->Url . "AccountUpdaterSubmitVault";
      $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
      if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
      if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
      if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }

    public function getAcctUpdaterReturn($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL) {
      $apiRequest = $this->Url . "AccountUpdaterReturn";
      $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
      if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
      if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
      if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }
    
    public function generateTokenFromCreditCard($transactionData, $callBackSuccess = NULL, $callBackFailure = NULL) {
      $apiRequest = $this->Url . "GenerateTokenFromCreditCard";
      $this->performRequest($transactionData, $apiRequest, $callBackSuccess, $callBackFailure);
      if ($this->Status >= 500 && $this->Status <= 599 && isset($callBackFailure)){call_user_func ($callBackFailure);}
      if ($this->Status >= 400 && $this->Status <= 499 && isset($callBackFailure)){call_user_func ($callBackFailure);}
      if ($this->Status >= 200 && $this->Status <= 299 && isset($callBackSuccess)){call_user_func ($callBackSuccess);}
    }

         /*************************************************************************************
                                        PROCESSING REQUEST
         *************************************************************************************/

    protected function performRequest($data, $apiRequest, $callBackSuccess = NULL, $callBackFailure = NULL){
            /**
            * performRequest: this function is responsible for actually submitting the gateway request.
            * It also parses the response and sends it back to the original call.
            * The function works as follows:
            * 1. Set up input data so the gateway can understand it
            * 2. Set up cURL request. Note that since this is SOAP we have to pass very specific options.
            * Also note that since cURL is picky, we have to turn off SSL verification. We're still transmitting https, though.
            * 3. Parse the response based on the information returned from the gateway and return it as an array.
            * The resulting array is stored in $this->Result in the RestGateway object.
            */
        try{
          if ($data == NULL){$data = array(); }
          $url = $apiRequest;
          $this->Result = array();
          $jsondata = json_encode(new Transaction($data),JSON_PRETTY_PRINT);
          $jsondata = utf8_encode($jsondata);
          $curl_handle = curl_init();
          curl_setopt($curl_handle, CURLOPT_URL, $url);
          curl_setopt($curl_handle, CURLOPT_CUSTOMREQUEST, "POST");
          curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $jsondata);
          curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, TRUE);
          curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array(
          "Content-type: application/json; charset-utf-8",
          "Content-Length: " . strlen($jsondata)));
          curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, FALSE);
          $response = curl_exec($curl_handle);
          $this->Status = curl_getinfo($curl_handle,CURLINFO_HTTP_CODE);
          if(connection_aborted()){
              //This will handle aborted requests that PHP can detect, returning a result that indicates POST was aborted.
             $this->Result = array(
               "isError" => TRUE,
               "errorMessages" => "Request Aborted",
               "isValid" => FALSE,
               "validations" => array(),
               "action" => "gatewayError");
              return $this->Result;
          }
          if (curl_errno($curl_handle) == 28 ){
            //This will handle timeouts as per cURL error definitions.
            $this->Result = array(
              "isError" => TRUE,
              "errorMessages" => "Request Timed Out",
              "isValid" => FALSE,
              "validations" => array(),
              "action" => "gatewayError");
              return $this->Result;
          }
          else{
            $jresult = (json_decode($response, TRUE));
            //$case = strtolower($jresult["action"]);
            $this->Result = $jresult;
            return $this->Result;
          }
        }
        catch (Exception $e){
          return $e->getMessage();
        }
    }
}

$RestGateway = new RestGateway();
