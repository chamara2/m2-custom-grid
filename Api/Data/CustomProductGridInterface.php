<?php


namespace Company\ProductGrid\Api\Data;

interface CustomProductGridInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const PRODUCT_ID = 'product_id';
    const COPYWRITEINFO = 'copywriteinfo';
    const CREATION_TIME = 'creation_time';
    const VPN = 'vpn';
    const UPDATE_TIME = 'update_time';
    const SKU = 'sku';
    const CUSTOM_PRODUCT_GRID_ID = 'custom_product_grid_id';

    /**
     * Get custom_product_grid_id
     * @return string|null
     */
    public function getCustomProductGridId();

    /**
     * Set custom_product_grid_id
     * @param string $customProductGridId
     * @return \Company\ProductGrid\Api\Data\CustomProductGridInterface
     */
    public function setCustomProductGridId($customProductGridId);

    /**
     * Get product_id
     * @return string|null
     */
    public function getProductId();

    /**
     * Set product_id
     * @param string $productId
     * @return \Company\ProductGrid\Api\Data\CustomProductGridInterface
     */
    public function setProductId($productId);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Company\ProductGrid\Api\Data\CustomProductGridExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Company\ProductGrid\Api\Data\CustomProductGridExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Company\ProductGrid\Api\Data\CustomProductGridExtensionInterface $extensionAttributes
    );

    /**
     * Get copywriteinfo
     * @return string|null
     */
    public function getCopywriteinfo();

    /**
     * Set copywriteinfo
     * @param string $copywriteinfo
     * @return \Company\ProductGrid\Api\Data\CustomProductGridInterface
     */
    public function setCopywriteinfo($copywriteinfo);

    /**
     * Get vpn
     * @return string|null
     */
    public function getVpn();

    /**
     * Set vpn
     * @param string $vpn
     * @return \Company\ProductGrid\Api\Data\CustomProductGridInterface
     */
    public function setVpn($vpn);

    /**
     * Get sku
     * @return string|null
     */
    public function getSku();

    /**
     * Set sku
     * @param string $sku
     * @return \Company\ProductGrid\Api\Data\CustomProductGridInterface
     */
    public function setSku($sku);

    /**
     * Get creation_time
     * @return string|null
     */
    public function getCreationTime();

    /**
     * Set creation_time
     * @param string $creationTime
     * @return \Company\ProductGrid\Api\Data\CustomProductGridInterface
     */
    public function setCreationTime($creationTime);

    /**
     * Get update_time
     * @return string|null
     */
    public function getUpdateTime();

    /**
     * Set update_time
     * @param string $updateTime
     * @return \Company\ProductGrid\Api\Data\CustomProductGridInterface
     */
    public function setUpdateTime($updateTime);
}
