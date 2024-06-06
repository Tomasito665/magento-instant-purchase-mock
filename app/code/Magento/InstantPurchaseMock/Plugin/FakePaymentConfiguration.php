<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\InstantPurchaseMock\Plugin;

use Magento\InstantPurchase\Model\QuoteManagement\PaymentConfiguration;
use Magento\Quote\Model\Quote;
use Magento\Vault\Api\Data\PaymentTokenInterface;

class FakePaymentConfiguration
{
    public function aroundConfigurePayment(
        PaymentConfiguration $subject,
        callable $proceed,
        Quote $quote,
        PaymentTokenInterface $paymentToken,
    ): Quote {
        $payment = $quote->getPayment();
        $payment->setQuote($quote);
        $payment->importData(['method' => "checkmo"]);
        return $quote;
    }
}
