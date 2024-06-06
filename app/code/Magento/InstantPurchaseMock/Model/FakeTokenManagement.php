<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\InstantPurchaseMock\Model;

use Magento\Sales\Api\Data\OrderPaymentInterface;
use Magento\Vault\Api\Data\PaymentTokenInterface;
use Magento\Vault\Api\PaymentTokenManagementInterface;
use Magento\Vault\Model\CreditCardTokenFactory;

class FakeTokenManagement implements PaymentTokenManagementInterface
{

    /**
     * @var CreditCardTokenFactory
     */
    private $creditCardTokenFactory;

    /**
     * @param CreditCardTokenFactory $creditCardTokenFactory
     */
    public function __construct(CreditCardTokenFactory $creditCardTokenFactory)
    {
        $this->creditCardTokenFactory = $creditCardTokenFactory;
    }

    public function getListByCustomerId($customerId) {}

    public function getByPaymentId($paymentId) {}

    public function getByGatewayToken($token, $paymentMethodCode, $customerId) {}

    public function getByPublicHash($hash, $customerId)
    {
        $token = $this->creditCardTokenFactory->create();
        $token->setCustomerId($customerId);
        $token->setPublicHash("fake-token");
        return $token;
    }

    public function saveTokenWithPaymentLink(PaymentTokenInterface $token, OrderPaymentInterface $payment) {}
    public function addLinkToOrderPayment($paymentTokenId, $orderPaymentId) {}

}
