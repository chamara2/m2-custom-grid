<?php


namespace Company\ProductGrid\Model\ResourceModel\CustomProductGrid;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Company\ProductGrid\Model\CustomProductGrid::class,
            \Company\ProductGrid\Model\ResourceModel\CustomProductGrid::class
        );
    }
}
