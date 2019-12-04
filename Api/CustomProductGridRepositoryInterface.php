<?php


namespace Company\ProductGrid\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CustomProductGridRepositoryInterface
{

    /**
     * Save custom_product_grid
     * @param \Company\ProductGrid\Api\Data\CustomProductGridInterface $customProductGrid
     * @return \Company\ProductGrid\Api\Data\CustomProductGridInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Company\ProductGrid\Api\Data\CustomProductGridInterface $customProductGrid
    );

    /**
     * update custom_product_grid
     * @param \Company\ProductGrid\Api\Data\CustomProductGridInterface $customProductGrid
     * @return \Company\ProductGrid\Api\Data\CustomProductGridInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function update(
        \Company\ProductGrid\Api\Data\CustomProductGridInterface $customProductGrid
    );

    /**
     * Retrieve custom_product_grid
     * @param string $getByVPN
     * @return \Company\ProductGrid\Api\Data\CustomProductGridInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($getByVPN);

    /**
     * Retrieve custom_product_grid matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Company\ProductGrid\Api\Data\CustomProductGridSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete custom_product_grid
     * @param \Company\ProductGrid\Api\Data\CustomProductGridInterface $customProductGrid
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Company\ProductGrid\Api\Data\CustomProductGridInterface $customProductGrid
    );

    /**
     * Delete custom_product_grid by ID
     * @param string $customProductGridId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($customProductGridId);
}
