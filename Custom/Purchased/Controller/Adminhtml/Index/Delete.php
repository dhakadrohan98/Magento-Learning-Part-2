<?php

namespace Custom\Purchased\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;

class Delete extends \Magento\Backend\App\Action
{
   private $collectionFactory;

   public function __construct(
       Context $context,
        \Custom\Purchased\Model\PurchasedFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
      }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        $id = $this->getRequest()->getParam('id');
        if($id) {
            try {
                // init model and delete.
                $model = $this->collectionFactory->create()->load($id);
                $model->delete();
                $this->messageManager->addSuccessMessage(__('You deleted the item.'));

                return $resultRedirect->setPath('*/*');
            }
            catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id'=>$id]);
            }
        }

        $this->messageManager->addErrorMessage(__('we can not find the item to delete'));
        return $resultRedirect->setPath('*/*/');
    }
}