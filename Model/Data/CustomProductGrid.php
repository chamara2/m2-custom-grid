<?php


namespace Company\ProductGrid\Model\Data;

use Company\ProductGrid\Api\Data\CustomProductGridInterface;

class CustomProductGrid extends \Magento\Framework\Api\AbstractExtensibleObject implements CustomProductGridInterface
{

    /**
     * Get custom_product_grid_id
     * @return string|null
     */
    public function getCustomProductGridId()
    {
        return $this->_get(self::CUSTOM_PRODUCT_GRID_ID);
    }

    /**
     * Set custom_product_grid_id
     * @param string $customProductGridId
     * @return \Company\ProductGrid\Api\Data\CustomProductGridInterface
     */
    public function setCustomProductGridId($customProductGridId)
    {
        return $this->setData(self::CUSTOM_PRODUCT_GRID_ID, $customProductGridId);
    }

    /**
     * Get product_id
     * @return string|null
     */
    public function getProductId()
    {
        return $this->_get(self::PRODUCT_ID);
    }

    /**
     * Set product_id
     * @param string $productId
     * @return \Company\ProductGrid\Api\Data\CustomProductGridInterface
     */
    public function setProductId($productId)
    {
        return $this->setData(self::PRODUCT_ID, $productId);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Company\ProductGrid\Api\Data\CustomProductGridExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Company\ProductGrid\Api\Data\CustomProductGridExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Company\ProductGrid\Api\Data\CustomProductGridExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get copywriteinfo
     * @return string|null
     */
    public function getCopywriteinfo()
    {
        return $this->_get(self::COPYWRITEINFO);
    }

    /**
     * Set copywriteinfo
     * @param string $copywriteinfo
     * @return \Company\ProductGrid\Api\Data\CustomProductGridInterface
     */
    public function setCopywriteinfo($copywriteinfo)
    {
        return $this->setData(self::COPYWRITEINFO, $copywriteinfo);
    }

    /**
     * Get vpn
     * @return string|null
     */
    public function getVpn()
    {
        return $this->_get(self::VPN);
    }

    /**
     * Set vpn
     * @param string $vpn
     * @return \Company\ProductGrid\Api\Data\CustomProductGridInterface
     */
    public function setVpn($vpn)
    {
        return $this->setData(self::VPN, $vpn);
    }

    /**
     * Get sku
     * @return string|null
     */
    public function getSku()
    {
        return $this->_get(self::SKU);
    }

    /**
     * Set sku
     * @param string $sku
     * @return \Company\ProductGrid\Api\Data\CustomProductGridInterface
     */
    public function setSku($sku)
    {
        return $this->setData(self::SKU, $sku);
    }

    /**
     * Get creation_time
     * @return string|null
     */
    public function getCreationTime()
    {
        return $this->_get(self::CREATION_TIME);
    }

    /**
     * Set creation_time
     * @param string $creationTime
     * @return \Company\ProductGrid\Api\Data\CustomProductGridInterface
     */
    public function setCreationTime($creationTime)
    {
        return $this->setData(self::CREATION_TIME, $creationTime);
    }

    /**
     * Get update_time
     * @return string|null
     */
    public function getUpdateTime()
    {
        return $this->_get(self::UPDATE_TIME);
    }

    /**
     * Set update_time
     * @param string $updateTime
     * @return \Company\ProductGrid\Api\Data\CustomProductGridInterface
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }
}
