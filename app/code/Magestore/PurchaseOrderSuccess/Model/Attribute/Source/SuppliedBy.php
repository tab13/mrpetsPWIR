<?php
/**
 *
 * mrpetsPWIR-Customize
 *
 * Created by PhpStorm.
 * User: tab
 * Date: 11/5/18
 * Time: 11:20 AM
 */

namespace Magestore\PurchaseOrderSuccess\Model\Attribute\Source;

class SuppliedBy extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    const SUPPLIED_BY_TYPE_CASE = 1;
    const SUPPLIED_BY_TYPE_ITEM = 0;

    public function getAllOptions()
    {
        if (is_null($this->_options)) {
            $this->_options = array(
                array(
                    'label' => __('Case'),
                    'value' => self::SUPPLIED_BY_TYPE_CASE
                ),
                array(
                    'label' => __('Item'),
                    'value' => self::SUPPLIED_BY_TYPE_ITEM
                ),
            );
        }
        return $this->_options;
    }

    public function toOptionArray()
    {
        return $this->getAllOptions();
    }
}
