<?php


namespace Company\ProductGrid\Model\ResourceModel;

class CustomProductGrid extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('company_productgrid_custom_product_grid', 'custom_product_grid_id');
    }
}
