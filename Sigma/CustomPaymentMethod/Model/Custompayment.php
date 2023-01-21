<?php

namespace Sigma\CustomPaymentMethod\Model;

/**
 * Class Custompayment.
 *
 * @package Sigma\CustomPaymentMethod\Model
 */
class Custompayment extends \Magento\Payment\Model\Method\AbstractMethod
{
    const CUSTOM_PAYMENT_CODE = 'custompayment';

    /**
     * @var string custompayment
     */
    protected $_code = self::CUSTOM_PAYMENT_CODE;

    /**
     * @var \Sigma\CustomPaymentMethod\Block\Form\Custompayment
     */
    protected $_formBlockType = \Sigma\CustomPaymentMethod\Block\Form\Custompayment::class;

    /**
     * @var \Magento\Payment\Block\Info\Instructions
     */
    protected $infoBlockType = \Magento\Payment\Block\Info\Instructions::class;

    /**
     * @var bool $_isOffline.
     */
    protected $_isOffline = true;

    public function getInstructions()
    {
        return trim($this->getConfigData('instructions'));
    }
}