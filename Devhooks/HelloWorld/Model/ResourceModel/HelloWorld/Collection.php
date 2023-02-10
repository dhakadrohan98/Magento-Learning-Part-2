<?php

namespace Devhooks\HelloWorld\Model\ResourceModel\HelloWorld;

use Devhooks\HelloWorld\Model\HelloWorld as HelloWorldModel;
use Devhooks\HelloWorld\Model\ResourceModel\HelloWorld as HelloWorldResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            HelloWorldModel::class,
            HelloWorldResourceModel::class
        );
    }
}