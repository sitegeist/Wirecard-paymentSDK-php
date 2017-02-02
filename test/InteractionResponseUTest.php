<?php
/**
 * Shop System Plugins - Terms of Use
 *
 * The plugins offered are provided free of charge by Wirecard Central Eastern Europe GmbH
 * (abbreviated to Wirecard CEE) and are explicitly not part of the Wirecard CEE range of
 * products and services.
 *
 * They have been tested and approved for full functionality in the standard configuration
 * (status on delivery) of the corresponding shop system. They are under General Public
 * License Version 3 (GPLv3) and can be used, developed and passed on to third parties under
 * the same terms.
 *
 * However, Wirecard CEE does not provide any guarantee or accept any liability for any errors
 * occurring when used in an enhanced, customized shop system configuration.
 *
 * Operation in an enhanced, customized configuration is at your own risk and requires a
 * comprehensive test phase by the user of the plugin.
 *
 * Customers use the plugins at their own risk. Wirecard CEE does not guarantee their full
 * functionality neither does Wirecard CEE assume liability for any disadvantages related to
 * the use of the plugins. Additionally, Wirecard CEE does not guarantee the full functionality
 * for customized shop systems or installed plugins of other vendors of plugins within the same
 * shop system.
 *
 * Customers are responsible for testing the plugin's functionality before starting productive
 * operation.
 *
 * By installing the plugin into the shop system the customer agrees to these terms of use.
 * Please do not use the plugin if you do not agree to these terms of use!
 */

namespace WirecardTest\PaymentSdk;

use Wirecard\PaymentSdk\InteractionResponse;
use Wirecard\PaymentSdk\StatusCollection;

class InteractionResponseUTest extends \PHPUnit_Framework_TestCase
{
    private $redirectUrl = 'http://www.example.com/redirect';

    private $rawData = '{\'raw\': \'data\'}';

    private $transactionId = '42';
    private $statusCollection;

    /**
     * @var InteractionResponse
     */
    private $response;

    public function setUp()
    {
        $this->statusCollection = new StatusCollection();
        $this->response = new InteractionResponse(
            $this->rawData,
            $this->statusCollection,
            $this->transactionId,
            $this->redirectUrl
        );
    }

    public function testGetRawResponse()
    {
        $this->assertEquals($this->rawData, $this->response->getRawData());
    }

    public function testGetStatusCollection()
    {
        $this->assertEquals($this->statusCollection, $this->response->getStatusCollection());
    }

    public function testGetRedirectUrl()
    {
        $this->assertEquals($this->redirectUrl, $this->response->getRedirectUrl());
    }

    public function testGetTransactionId()
    {
        $this->assertEquals($this->transactionId, $this->response->getTransactionId());
    }
}
