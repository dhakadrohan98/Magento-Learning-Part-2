<?php

namespace Custom\Purchased\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Custom_Purchased::custom_purchased');
    }

    public function execute()
    {
       $resultPage = $this->resultPageFactory->create();
       $resultPage->setActiveMenu('Custom_Purchased::custom_purchased');
       $resultPage->addBreadcrumb(__('Purchased'), __('Purchased'));
       $resultPage->addBreadcrumb(__('Purchased Orders'), __('Purchased Orders'));
       $resultPage->getConfig()->getTitle()->prepend(__('Purchased Orders'));
       return $resultPage;
    }
}