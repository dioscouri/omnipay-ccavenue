<?php
namespace Omnipay\CCAvenue;

use Omnipay\Common\AbstractGateway;
use Omnipay\CCAvenue\Message\PurchaseRequest;
use Omnipay\CCAvenue\Message\RefundRequest;

/**
 * CCAvenue Gateway
 *
 * @link http://world.ccavenue.com/downloads/CCAVenueWorldIntegrationManual.pdf
 */
class Gateway extends AbstractGateway
{

    public function getName()
    {
        return 'CCAvenue';
    }

    public function getDefaultParameters()
    {
        return array(
            'profileId' => '',
            'secretKey' => '',
            'accessKey' => '',
            'testMode' => false,
        );
    }

    /**
     *
     * @param array $parameters
     * @return \Omnipay\CCAvenue\Message\AuthorizeRequest
     */
    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\CCAvenue\Message\AuthorizeRequest', $parameters);
    }

    /**
     *
     * @param array $parameters
     * @return \Omnipay\CCAvenue\Message\CaptureRequest
     */
    public function capture(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\CCAvenue\Message\CaptureRequest', $parameters);
    }

    /**
     *
     * @param array $parameters
     * @return \Omnipay\CCAvenue\Message\PurchaseRequest
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\CCAvenue\Message\PurchaseRequest', $parameters);
    }

    /**
     *
     * @param array $parameters
     * @return \Omnipay\CCAvenue\Message\CompletePurchaseRequest
     */
    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\CCAvenue\Message\CompletePurchaseRequest', $parameters);
    }

    /**
     * @param array $parameters
     * @return \Omnipay\CCAvenue\Message\CompleteAuthorizeRequest
     */
    public function completeAuthorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\CCAvenue\Message\CompleteAuthorizeRequest', $parameters);
    }

    /**
     *
     * @param array $parameters
     * @return \Omnipay\CCAvenue\Message\CreateCardRequest
     */
    public function createCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\CCAvenue\Message\CreateCardRequest', $parameters);
    }

    /**
     *
     * @param array $parameters
     * @return \Omnipay\CCAvenue\Message\UpdateCardRequest
     */
    public function updateCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\CCAvenue\Message\UpdateCardRequest', $parameters);
    }

    public function getProfileId()
    {
        return $this->getParameter('profileId');
    }

    public function setProfileId($value)
    {
        return $this->setParameter('profileId', $value);
    }

    public function getSecretKey()
    {
        return $this->getParameter('secretKey');
    }

    public function setSecretKey($value)
    {
        return $this->setParameter('secretKey', $value);
    }

    public function getAccessKey()
    {
        return $this->getParameter('accessKey');
    }

    public function setAccessKey($value)
    {
        return $this->setParameter('accessKey', $value);
    }

    public function getTransactionType()
    {
        return $this->getParameter('transactionType');
    }

    public function setTransactionType($value)
    {
        return $this->setParameter('transactionType', $value);
    }

    public function generateSignature($data)
    {
        $data_to_sign = array();
        foreach ($data as $key => $value)
        {
            $data_to_sign[] = $key . "=" . $value;
        }
        $pairs = implode(',', $data_to_sign);

        return base64_encode(hash_hmac('sha256', $pairs, $this->getSecretKey(), true));
    }
}
