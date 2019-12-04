<?php


namespace Company\ProductGrid\Model;

use Company\ProductGrid\Api\Data\CustomProductGridInterface;
use Company\ProductGrid\Api\Data\CustomProductGridInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class CustomProductGrid extends \Magento\Framework\Model\AbstractModel
{

    protected $dataObjectHelper;

    protected $_eventPrefix = 'company_productgrid_custom_product_grid';
    protected $custom_product_gridDataFactory;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param CustomProductGridInterfaceFactory $custom_product_gridDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Company\ProductGrid\Model\ResourceModel\CustomProductGrid $resource
     * @param \Company\ProductGrid\Model\ResourceModel\CustomProductGrid\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        CustomProductGridInterfaceFactory $custom_product_gridDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Company\ProductGrid\Model\ResourceModel\CustomProductGrid $resource,
        \Company\ProductGrid\Model\ResourceModel\CustomProductGrid\Collection $resourceCollection,
        array $data = []
    ) {
        $this->custom_product_gridDataFactory = $custom_product_gridDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve custom_product_grid model with custom_product_grid data
     * @return CustomProductGridInterface
     */
    public function getDataModel()
    {
        $custom_product_gridData = $this->getData();
        
        $custom_product_gridDataObject = $this->custom_product_gridDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $custom_product_gridDataObject,
            $custom_product_gridData,
            CustomProductGridInterface::class
        );
        
        return $custom_product_gridDataObject;
    }
}
