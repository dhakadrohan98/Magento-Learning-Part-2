<?php

namespace Sigma\CustomPaymentMethod\Block\Form;

/**
 * Class Custompayment
 * @package Sigma\CustomPaymentMethod\Block\Form
 */
class Custompayment extends \Magento\OfflinePayments\Block\Form\AbstractInstruction
{
    /**
     * @var string
     */
    protected $_template = 'Sigma_CustomPaymentMethod::form/custompayment.phtml';
}