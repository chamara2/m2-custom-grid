<?php


namespace Company\ProductGrid\Controller\Adminhtml\Customproductgrid;

class Delete extends \Company\ProductGrid\Controller\Adminhtml\Customproductgrid
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('custom_product_grid_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Company\ProductGrid\Model\CustomProductGrid::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Custom Product Grid.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['custom_product_grid_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Custom Product Grid to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
