<?php
/**
 * Created by Rohan Dhakad.
 */

namespace  Custom\Purchased\Model\ResourceModel\Purchased;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'item_id';
    public function _construct() //phpcs:ignore Magento2.CodeAnalysis.EmptyBlock
    {
        $this->_init('Custom\Purchased\Model\Purchased','Custom\Purchased\Model\ResourceModel\Purchased');
    }
}