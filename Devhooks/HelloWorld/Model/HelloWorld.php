<?php

namespace Devhooks\HelloWorld\Model;

use Devhooks\HelloWorld\Model\ResourceModel\HelloWorld as HelloWorldResourceModel;
use Magento\Framework\Model\AbstractModel;

class HelloWorld extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(HelloWorldResourceModel::class);
    }
}