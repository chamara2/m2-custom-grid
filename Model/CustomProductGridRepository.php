<?php


namespace Company\ProductGrid\Model;

use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Company\ProductGrid\Api\Data\CustomProductGridSearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Store\Model\StoreManagerInterface;
use Company\ProductGrid\Api\Data\CustomProductGridInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Company\ProductGrid\Api\CustomProductGridRepositoryInterface;
use Company\ProductGrid\Model\ResourceModel\CustomProductGrid as ResourceCustomProductGrid;
use Company\ProductGrid\Model\ResourceModel\CustomProductGrid\CollectionFactory as CustomProductGridCollectionFactory;
use Magento\Framework\Exception\NoSuchEntityException;

class CustomProductGridRepository implements CustomProductGridRepositoryInterface
{

    protected $dataObjectHelper;

    protected $dataCustomProductGridFactory;

    private $storeManager;

    protected $searchResultsFactory;

    protected $dataObjectProcessor;

    protected $extensionAttributesJoinProcessor;

    protected $customProductGridCollectionFactory;

    private $collectionProcessor;

    protected $resource;

    protected $extensibleDataObjectConverter;
    protected $customProductGridFactory;

    /**
     * @var \Magento\Framework\Webapi\Rest\Request
     */
    protected $request;
    /**
     * @param ResourceCustomProductGrid $resource
     * @param CustomProductGridFactory $customProductGridFactory
     * @param CustomProductGridInterfaceFactory $dataCustomProductGridFactory
     * @param CustomProductGridCollectionFactory $customProductGridCollectionFactory
     * @param CustomProductGridSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceCustomProductGrid $resource,
        CustomProductGridFactory $customProductGridFactory,
        CustomProductGridInterfaceFactory $dataCustomProductGridFactory,
        CustomProductGridCollectionFactory $customProductGridCollectionFactory,
        CustomProductGridSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter,
        \Magento\Framework\Webapi\Rest\Request $request
    ) {
        $this->resource = $resource;
        $this->customProductGridFactory = $customProductGridFactory;
        $this->customProductGridCollectionFactory = $customProductGridCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataCustomProductGridFactory = $dataCustomProductGridFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
        $this->request = $request;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Company\ProductGrid\Api\Data\CustomProductGridInterface $customProductGrid
    ) {
        /* if (empty($customProductGrid->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $customProductGrid->setStoreId($storeId);
        } */
        //return $this->request->getBodyParams();

        /*$customProductGrid->setProductId(12);
        $customProductGrid->setCopywriteinfo(12);
        $customProductGrid->setVpn(12);
        $customProductGrid->setSku(12);*/

        $customProductGridData = $this->extensibleDataObjectConverter->toNestedArray(
            $customProductGrid,
            [],
            \Company\ProductGrid\Api\Data\CustomProductGridInterface::class
        );
        
        $customProductGridModel = $this->customProductGridFactory->create()->setData($customProductGridData);
        
        try {
            $this->resource->save($customProductGridModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the customProductGrid: %1',
                $exception->getMessage()
            ));
        }
        return $customProductGridModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function update(
        \Company\ProductGrid\Api\Data\CustomProductGridInterface $customProductGrid
    ) {
        /* if (empty($customProductGrid->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $customProductGrid->setStoreId($storeId);
        } */
       /* $customProductGrid->setProductId(12);
        $customProductGrid->setCopywriteinfo(12);
        $customProductGrid->setVpn(12);
        $customProductGrid->setSku(12);*/
        $customProductGridData = $this->extensibleDataObjectConverter->toNestedArray(
            $customProductGrid,
            [],
            \Company\ProductGrid\Api\Data\CustomProductGridInterface::class
        );

        //print_r( $customProductGridData);exit;
        $customProductGridModel = $this->customProductGridFactory->create()->setData($customProductGridData);

        try {
            $this->resource->save($customProductGridModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the customProductGrid: %1',
                $exception->getMessage()
            ));
        }
        return $customProductGridModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($getByVPN)
    {
        $customProductGrid = $this->customProductGridCollectionFactory->create();
        $customProductGrid->addFieldToFilter('vpn', $getByVPN);

        if (empty($customProductGrid->getData())) {
            throw new NoSuchEntityException(__('product does not exist.'));
        }else{
            return $customProductGrid->getData();
        }

    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->customProductGridCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Company\ProductGrid\Api\Data\CustomProductGridInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Company\ProductGrid\Api\Data\CustomProductGridInterface $customProductGrid
    ) {
        try {
            $customProductGridModel = $this->customProductGridFactory->create();
            $this->resource->load($customProductGridModel, $customProductGrid->getCustomProductGridId());
            $this->resource->delete($customProductGridModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the custom_product_grid: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($customProductGridId)
    {
        return $this->delete($this->get($customProductGridId));
    }
}
