<?php

namespace Omnipay\CCAvenue\Message;

/**
 * CCAvenue Purchase Request
 */
class PurchaseRequest extends AuthorizeRequest
{
  public function getTransactionType()
  {
    return 'sale';
  }
}
