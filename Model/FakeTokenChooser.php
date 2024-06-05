<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\InstantPurchaseMock\Model;

use Magento\Customer\Model\Customer;
use Magento\InstantPurchase\Model\PaymentMethodChoose\PaymentTokenChooserInterface;
use Magento\Store\Model\Store;
use Magento\Vault\Model\CreditCardTokenFactory;

class FakeTokenChooser implements PaymentTokenChooserInterface
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

    public function choose(Store $store, Customer $customer)
    {
        $token = $this->creditCardTokenFactory->create();
        $token->setCustomerId($customer->getId());
        $token->setPublicHash("fake-token");
        return $token;
    }
}
