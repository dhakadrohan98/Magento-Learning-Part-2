<?php

namespace Devhooks\HelloWorld\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class HelloWorld extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('devhooks_helloworld', 'id');
    }
}