<?php

/**
 * Copyright 2017 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

/**
 * Class Amazon_MCF_Helper_Data
 */
class Amazon_MCF_Helper_Data extends Mage_Core_Helper_Abstract
{

    const CONFIG_APPLICATION_NAME = 'Amazon MCF Magento 1 Connector';
    const CONFIG_APPLICATION_VERSION = '0.1.0';

    /**
     * Config Paths
     */
    const CONFIG_PATH_ENABLED = 'amazon_mcf/credentials/enable';
    const CONFIG_PATH_DEBUG = 'amazon_mcf/developer/debug';
    const CONFIG_PATH_ENDPOINT = 'amazon_mcf/credentials/marketplace_endpoint';
    const CONFIG_PATH_MARKETPLACE = 'amazon_mcf/credentials/marketplace';
    const CONFIG_PATH_MARKETPLACE_CUSTOM
        = 'amazon_mcf/credentials/marketplace_custom';
    const CONFIG_PATH_SELLER_ID = 'amazon_mcf/credentials/seller_id';
    const CONFIG_PATH_ACCESS_KEY_ID = 'amazon_mcf/credentials/access_key_id';
    const CONFIG_PATH_SECRET_ACCESS_KEY = 'amazon_mcf/credentials/secret_access_key';
    const CONFIG_PATH_CLIENT_ID = 'amazon_mcf/credentials/client_id';
    const CONFIG_PATH_CLIENT_SECRET = 'amazon_mcf/credentials/client_secret';
    const CONFIG_PATH_TITLE = 'amazon_mcf/options/title';
    const CONFIG_PATH_SEND_AMAZON_SHIP_CONFIRMATION
        = 'amazon_mcf/options/send_amazon_ship_confirmation';
    const CONFIG_PATH_DISPLAY_ESTIMATED_ARRIVAL
        = 'amazon_mcf/onsite_delivery_options/display_estimated_arrival';
    const CONFIG_PATH_DISPLAY_DELIVERY_ESTIMATOR_PDP
        = 'amazon_mcf/onsite_delivery_options/enable_delivery_estimator_pdp';
    const CONFIG_PATH_DEFAULT_STANDARD_SHIPPING_COST
        = 'amazon_mcf/onsite_delivery_options/default_standard_shipping_cost';
    const CONFIG_PATH_DEFAULT_EXPEDITED_SHIPPING_COST
        = 'amazon_mcf/onsite_delivery_options/default_expedited_shipping_cost';
    const CONFIG_PATH_DEFAULT_PRIORITY_SHIPPING_COST
        = 'amazon_mcf/onsite_delivery_options/default_priority_shipping_cost';
    const CONFIG_PATH_USE_AMAZON_SHIPPING_FEES
        = 'amazon_mcf/onsite_delivery_options/use_amazon_shipping_fees';
    const CONFIG_PATH_PACKING_SLIP_COMMENT
        = 'amazon_mcf/options/amazon_packing_slip_comment';
    const CONFIG_PATH_LOG_API_REQUEST_RESPONSE = 'amazon_mcf/developer/log_api';
    const CONFIG_PATH_LOG_ORDER_INVENTORY_PROCESSING
        = 'amazon_mcf/developer/log_order_inventory_processing';
    const CONFIG_PATH_AMAZON_CARRIER_ENABLED = 'carriers/amazon_mcf_carrier/active';

    /**
     * Custom Variable Paths
     */
    const CORE_VAR_INVENTORY_SYNC_TOKEN = 'amazon_mcf_inventory_sync_token';
    const CORE_VAR_INVENTORY_SYNC_RUNNING = 'amazon_mcf_inventory_sync_running';
    const CORE_VAR_INVENTORY_SYNC_PAGE = 'amazon_mcf_inventory_sync_page';
    const CORE_VAR_ORDER_SYNC_TOKEN = 'amazon_mcf_order_sync_token';
    const CORE_VAR_ORDER_SYNC_RUNNING = 'amazon_mcf_order_sync_running';
    const CORE_VAR_ORDER_SYNC_PAGE = 'amazon_mcf_order_sync_page';

    /**
     * Log File
     */
    const FILE_PATH_LOG_API = 'amzn_api.log';
    const FILE_PATH_LOG_ORDER_INVENTORY = 'amzn_order_inventory.log';

    /**
     * Amazon Order Submission Status
     * new/attempted/fail - Order has not yet been successfully submitted to Amazon
     * The rest are Amazon order states
     * invalid - these last three the order is not going to be fulfilled by Amazon
     */
    const ORDER_STATUS_NEW = 'new';
    const ORDER_STATUS_ATTEMPTED = 'attempted';
    const ORDER_STATUS_FAIL = 'fail';
    const ORDER_STATUS_RECEIVED = 'received';
    const ORDER_STATUS_PLANNING = 'planning';
    const ORDER_STATUS_PROCESSING = 'processing';
    const ORDER_STATUS_COMPLETE = 'complete';
    const ORDER_STATUS_COMPLETE_PARTIALLED = 'complete_partialled';
    const ORDER_STATUS_INVALID = 'invalid';
    const ORDER_STATUS_CANCELLED = 'cancelled';
    const ORDER_STATUS_UNFULFILLABLE = 'unfulfillable';

    /**
     * Endpoint and Marketplace IDs by country
     */
    protected $endpoints = array(
        'CA' => 'https://mws.amazonservices.com',
        'MX' => 'https://mws.amazonservices.com',
        'US' => 'https://mws.amazonservices.com',
        'BR' => 'https://mws.amazonservices.com',
        'DE' => 'https://mws-eu.amazonservices.com',
        'ES' => 'https://mws-eu.amazonservices.com',
        'FR' => 'https://mws-eu.amazonservices.com',
        'IT' => 'https://mws-eu.amazonservices.com',
        'UK' => 'https://mws-eu.amazonservices.com',
        'IN' => 'https://mws.amazonservices.in',
        'AU' => 'https://mws.amazonservices.com.au',
        'JP' => 'https://mws.amazonservices.jp',
        'CN' => 'https://mws.amazonservices.com.cn',
    );

    protected $marketplaceIds = array(
        'CA' => 'A2EUQ1WTGCTBG2',
        'MX' => 'A1AM78C64UM0Y8',
        'US' => 'ATVPDKIKX0DER',
        'BR' => 'A2Q3Y263D00KWC',
        'DE' => 'A1PA6795UKMFR9',
        'ES' => 'A1RKKUPIHCS9HS',
        'FR' => 'A13V1IB3VIYZZH',
        'IT' => 'APJ6JRA9NG5V4',
        'UK' => 'A1F83G8C2ARO7P',
        'IN' => 'A21TJRUUN4KGV',
        'AU' => 'A39IBJ37TRP1C6',
        'JP' => 'A1VC38T7YXB528',
        'CN' => 'AAHKV2X7AFYLW',
    );

    /**
     * Retrieve application name
     *
     * @return string
     */
    public function getApplicationName()
    {
        return self::CONFIG_APPLICATION_NAME;
    }

    /**
     * Retrieve application version
     *
     * @return string
     */
    public function getApplicationVersion()
    {
        return self::CONFIG_APPLICATION_VERSION;
    }

    /**
     * Get country endpoint URL based on country code
     *
     * @param  $countryCode
     * @return mixed|string
     */
    public function getEndpointForCountry($countryCode)
    {
        $endpoint = 'https://mws.amazonservices.com';

        if (isset($this->endpoints[$countryCode])) {
            $endpoint = $this->endpoints[$countryCode];
        }

        return $endpoint;
    }

    /**
     * Checks if Multi Channel Fulfillment is enabled and sufficiently configured
     *
     * @param  null $store
     * @return bool
     */
    public function isEnabled($store = null)
    {
        return Mage::getStoreConfig(self::CONFIG_PATH_ENABLED, $store)
            && $this->verifyConfig($store);
    }

    /**
     * Retrieves debug setting
     *
     * @param  null $store
     * @return mixed
     */
    public function isDebug($store = null)
    {
        return Mage::getStoreConfig(self::CONFIG_PATH_DEBUG, $store);
    }

    /**
     * Retrieve endpoint for store setting
     *
     * @param  null $store
     * @return mixed|string
     */
    public function getEndpoint($store = null)
    {
        $marketplace = $this->getMarketplace();

        if ($marketplace == 'custom') {
            list($marketplaceId, $endpoint)
                = explode(';', $this->getMarketplaceCustom($store));
            return $endpoint;
        }

        return $this->getEndpointForCountry($this->getMarketplace());
    }

    /**
     * Retrieve marketplace for store setting
     *
     * @param  null $store
     * @return mixed
     */
    public function getMarketplace($store = null)
    {
        return Mage::getStoreConfig(self::CONFIG_PATH_MARKETPLACE, $store);
    }

    /**
     * Retrieves custom marketplace
     *
     * @param  null $store
     * @return mixed
     */
    public function getMarketplaceCustom($store = null)
    {
        return Mage::getStoreConfig(
            self::CONFIG_PATH_MARKETPLACE_CUSTOM,
            $store
        );
    }

    /**
     * Retrieve store marketplace ID
     *
     * @param  null $store
     * @return mixed
     */
    public function getMarketplaceId($store = null)
    {
        $marketplace = $this->getMarketplace();

        if ($marketplace == 'custom') {
            list($marketplaceId, $endpoint)
                = explode(';', $this->getMarketplaceCustom($store));
            return $marketplaceId;
        }

        return $this->marketplaceIds[$marketplace];
    }

    /**
     * Get marketplace ID by country code
     *
     * @param  $countryCode
     * @return mixed|string
     */
    public function getMarketplaceIdForCountry($countryCode)
    {
        $marketplaceId = 'ATVPDKIKX0DER';

        if (isset($this->marketplaceIds[$countryCode])) {
            $marketplaceId = $this->marketplaceIds[$countryCode];
        }

        return $marketplaceId;
    }

    /**
     * Get seller ID by store ID
     *
     * @param  null $store
     * @return mixed
     */
    public function getSellerId($store = null)
    {
        return Mage::getStoreConfig(self::CONFIG_PATH_SELLER_ID, $store);
    }

    /**
     * Retrieve access key by store ID
     *
     * @param  null $store
     * @return mixed
     */
    public function getAccessKeyId($store = null)
    {
        return Mage::helper('core')
            ->decrypt(
                Mage::getStoreConfig(self::CONFIG_PATH_ACCESS_KEY_ID, $store)
            );
    }

    /**
     * Retrieve secret Access ID by store id
     *
     * @param  null $store
     * @return mixed
     */
    public function getSecretAccessKey($store = null)
    {
        return Mage::helper('core')
            ->decrypt(
                Mage::getStoreConfig(
                    self::CONFIG_PATH_SECRET_ACCESS_KEY,
                    $store
                )
            );
    }

    /**
     * Get client ID by store ID
     *
     * @param  null $store
     * @return mixed
     */
    public function getClientId($store = null)
    {
        return Mage::getStoreConfig(self::CONFIG_PATH_CLIENT_ID, $store);
    }

    /**
     * Get client secret ID by store ID
     *
     * @param  null $store
     * @return mixed
     */
    public function getClientSecret($store = null)
    {
        return Mage::getStoreConfig(self::CONFIG_PATH_CLIENT_SECRET, $store);
    }

    /**
     * Retrieves estimate display setting by store ID
     *
     * @param  null $store
     * @return mixed
     */
    public function getDisplayEstimatedArrival($store = null)
    {
        return Mage::getStoreConfig(
            self::CONFIG_PATH_DISPLAY_ESTIMATED_ARRIVAL, $store
        );
    }

    /**
     * Retrieves delivery estimate settings by store ID
     *
     * @param  null $store
     * @return mixed
     */
    public function getDisplayDeliveryEstimatorPdp($store = null)
    {
        return Mage::getStoreConfig(
            self::CONFIG_PATH_DISPLAY_DELIVERY_ESTIMATOR_PDP, $store
        );
    }

    /**
     * Retrieve amazon shipping fee setting by store ID
     *
     * @param  null $store
     * @return mixed
     */
    public function getUseAmazonShippingFees($store = null)
    {
        return Mage::getStoreConfig(
            self::CONFIG_PATH_USE_AMAZON_SHIPPING_FEES, $store
        );
    }

    /**
     * Retrieve default shipping cost setting by store ID
     *
     * @param  null $store
     * @return mixed
     */
    public function getDefaultStandardShippingCost($store = null)
    {
        return Mage::getStoreConfig(
            self::CONFIG_PATH_DEFAULT_STANDARD_SHIPPING_COST, $store
        );
    }

    /**
     * Retrieve default expedited shipping cost setting by store ID
     *
     * @param  null $store
     * @return mixed
     */
    public function getDefaultExpeditedShippingCost($store = null)
    {
        return Mage::getStoreConfig(
            self::CONFIG_PATH_DEFAULT_EXPEDITED_SHIPPING_COST, $store
        );
    }

    /**
     * Retrieve default priority shipping cost setting by store ID
     *
     * @param  null $store
     * @return mixed
     */
    public function getDefaultPriorityShippingCost($store = null)
    {
        return Mage::getStoreConfig(
            self::CONFIG_PATH_DEFAULT_PRIORITY_SHIPPING_COST, $store
        );
    }

    /**
     * Retrieve log API settings via Store ID
     *
     * @param  null $store
     * @return mixed
     */
    public function getLogApi($store = null)
    {
        return Mage::getStoreConfig(
            self::CONFIG_PATH_LOG_API_REQUEST_RESPONSE, $store
        );
    }

    /**
     * Retrieve log order inventory processing setting by store ID
     *
     * @param  null $store
     * @return mixed
     */
    public function getLogOrderInventoryProcessing($store = null)
    {
        return Mage::getStoreConfig(
            self::CONFIG_PATH_LOG_ORDER_INVENTORY_PROCESSING, $store
        );
    }

    /**
     * Retrieve shipment email settings via store ID
     *
     * @param  null $store
     * @return mixed
     */
    public function sendShipmentEmail($store = null)
    {
        return Mage::getStoreConfig(
            self::CONFIG_PATH_SEND_AMAZON_SHIP_CONFIRMATION, $store
        );
    }

    /**
     * Retrieve packing slip comment by store ID
     *
     * @param  null $store
     * @return mixed|string
     */
    public function getPackingSlipComment($store = null)
    {
        $comment = Mage::getStoreConfig(
            self::CONFIG_PATH_PACKING_SLIP_COMMENT, $store
        );
        if (empty($comment)) {
            $comment = 'Thank you for your order!';
        }
        return $comment;
    }

    /**
     * Retrieve carrier enabled setting via store ID
     *
     * @param  null $store
     * @return mixed
     */
    public function getCarrierEnabled($store = null)
    {
        return Mage::getStoreConfig(
            self::CONFIG_PATH_AMAZON_CARRIER_ENABLED, $store
        );
    }

    /**
     * Log various types of messages to the respective log files
     *
     * @param $string
     * @param null   $store
     */
    public function logApi($string, $store = null)
    {
        if ($this->getLogApi($store)) {
            Mage::log($string, null, self::FILE_PATH_LOG_API);
        }
    }

    /**
     * Log messages to order log
     *
     * @param $string
     * @param null   $store
     */
    public function logOrder($string, $store = null)
    {
        if ($this->getLogOrderInventoryProcessing($store)) {
            Mage::log(
                'Order Update: ' . $string,
                null,
                self::FILE_PATH_LOG_ORDER_INVENTORY
            );
        }
    }

    /**
     * Log messages to inventory log
     *
     * @param $string
     * @param null   $store
     */
    public function logInventory($string, $store = null)
    {
        if ($this->getLogOrderInventoryProcessing($store)) {
            Mage::log(
                'Inventory Update: ' . $string,
                null,
                self::FILE_PATH_LOG_ORDER_INVENTORY
            );
        }
    }

    /**
     * Log errors
     *
     * @param $method
     * @param $e
     * @param null                            $store
     */
    public function logApiError(
        $method,
        $e,
        $store = null
    ) {
        if ($this->getLogApi($store)) {
            $this->logApi(
                'Error in ' . $method . ', response: '
                . $e->getErrorCode() . ': '
                . $e->getErrorMessage() . "\n" . $e->getXML()
            );
        }
    }

    /**
     * Used for paging through orders and inventory to avoid long processing
     * delays and request quota limits
     *
     * @return mixed
     */
    public function getInventoryNextToken()
    {
        $var = Mage::getModel('core/variable')
            ->loadByCode(self::CORE_VAR_INVENTORY_SYNC_TOKEN);

        return $var->getValue('text');
    }

    /**
     * Sets value of next inventory token for future cron job
     *
     * @param  string $value
     * @return mixed
     */
    public function setInventoryNextToken($value = '')
    {
        $var = Mage::getModel('core/variable')
            ->loadByCode(self::CORE_VAR_INVENTORY_SYNC_TOKEN);

        return $var->setPlainValue($value)->save();
    }

    /**
     * Flags inventory process
     *
     * @return mixed
     */
    public function getInventoryProcessRunning()
    {
        $var = Mage::getModel('core/variable')
            ->loadByCode(self::CORE_VAR_INVENTORY_SYNC_RUNNING);

        return $var->getValue('text');
    }

    /**
     * Sets a system variable that triggers the background full inventory sync.
     * If sync is already running, it does not re-start the sync unless $force
     * is set to true.
     *
     * @param  bool $force
     * @return bool
     */
    public function startInventorySync($force = false)
    {
        $updated = false;
        $currentRunning = $this->getInventoryProcessRunning();

        if (!$currentRunning || $force) {
            $this->setInventoryProcessRunning(true);
            $this->setInventoryProcessPage(1);
            $updated = true;
        }

        return $updated;
    }

    /**
     * Sets inventory running flag
     *
     * @param string $value
     */
    public function setInventoryProcessRunning($value = '')
    {
        $var = Mage::getModel('core/variable')
            ->loadByCode(self::CORE_VAR_INVENTORY_SYNC_RUNNING);

        $var->setPlainValue($value)->save();

        return;
    }

    /**
     * Gets current page of inventory process
     *
     * @return int
     */
    public function getInventoryProcessPage()
    {
        $var = Mage::getModel('core/variable')
            ->loadByCode(self::CORE_VAR_INVENTORY_SYNC_PAGE);

        $value = $var->getValue('text');
        if (empty($value)) {
            $value = 1;
        }

        return $value;
    }

    /**
     * Collection pages are 1 indexed
     *
     * @param  int $value
     * @return mixed
     */
    public function setInventoryProcessPage($value = 1)
    {
        $var = Mage::getModel('core/variable')
            ->loadByCode(self::CORE_VAR_INVENTORY_SYNC_PAGE);

        return $var->setPlainValue($value)->save();
    }

    /**
     * Get next order token for cron process
     *
     * @return mixed
     */
    public function getOrderNextToken()
    {
        $var = Mage::getModel('core/variable')
            ->loadByCode(self::CORE_VAR_ORDER_SYNC_TOKEN);

        return $var->getValue('text');
    }

    /**
     * Sets next order token for cron jobs
     *
     * @param  string $value
     * @return mixed
     */
    public function setOrderNextToken($value = '')
    {
        $var = Mage::getModel('core/variable')
            ->loadByCode(self::CORE_VAR_ORDER_SYNC_TOKEN);

        return $var->setPlainValue($value)->save();
    }

    /**
     * Checks order process flag status
     *
     * @return mixed
     */
    public function getOrderProcessRunning()
    {
        $var = Mage::getModel('core/variable')
            ->loadByCode(self::CORE_VAR_ORDER_SYNC_RUNNING);

        return $var->getValue('text');
    }

    /**
     * Set order processing flag status
     *
     * @param  string $value
     * @return mixed
     */
    public function setOrderProcessRunning($value = '')
    {
        $var = Mage::getModel('core/variable')
            ->loadByCode(self::CORE_VAR_ORDER_SYNC_RUNNING);

        return $var->setPlainValue($value)->save();
    }

    /**
     * Get current page or order processing
     *
     * @return int
     */
    public function getOrderProcessPage()
    {
        $var = Mage::getModel('core/variable')
            ->loadByCode(self::CORE_VAR_ORDER_SYNC_PAGE);

        $value = $var->getValue('text');
        if (empty($value)) {
            $value = 1;
        }

        return $value;
    }

    /**
     * Sets order processing flag
     *
     * @param  int $value
     * @return mixed
     */
    public function setOrderProcessPage($value = 0)
    {
        $var = Mage::getModel('core/variable')
            ->loadByCode(self::CORE_VAR_ORDER_SYNC_PAGE);

        return $var->setPlainValue($value)->save();
    }

    /**
     * Verify that config fields have values.
     *
     * @param  null $store
     * @return bool
     */
    protected function verifyConfig($store = null)
    {
        $endpoint = $this->getEndpoint($store);
        $marketplaceId = $this->getMarketplaceId($store);
        $sellerId = $this->getSellerId($store);
        $accessKeyId = $this->getAccessKeyId($store);
        $secretAccessKey = $this->getSecretAccessKey($store);

        // check that none of the required config fields are empty
        return !(
            empty($endpoint)
            || empty($sellerId)
            || empty($marketplaceId)
            || empty($accessKeyId)
            || empty($secretAccessKey)
        );
    }
}
