<?php


namespace Company\ProductGrid\Api\Data;

interface CustomProductGridSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get custom_product_grid list.
     * @return \Company\ProductGrid\Api\Data\CustomProductGridInterface[]
     */
    public function getItems();

    /**
     * Set product_id list.
     * @param \Company\ProductGrid\Api\Data\CustomProductGridInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
