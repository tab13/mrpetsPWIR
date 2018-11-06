<?php
/**
 *
 * mrpetsPWIR-Customize
 *
 * Created by PhpStorm.
 * User: tab
 * Date: 11/5/18
 * Time: 2:13 PM
 */

namespace Magestore\PurchaseOrderSuccess\Ui\DataProvider\Product\Form\Modifier;

use Magento\Framework\Stdlib\ArrayManager;

class QtyOfItemPerCase extends \Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier
{
    protected $arrayManager;

    public function __construct(
        ArrayManager $arrayManager
    ) {
        $this->arrayManager = $arrayManager;
    }

    /**
     * @param array $data
     * @return array
     * @since 100.1.0
     */
    public function modifyData(array $data)
    {
        return $data;
    }

    /**
     * @param array $meta
     * @return array
     * @since 100.1.0
     */
    public function modifyMeta(array $meta)
    {
        $meta = $this->customizeQtyOfItemPerCase($meta);

        return $meta;
    }

    protected function customizeQtyOfItemPerCase(array $meta)
    {
        $weightPath = $this->arrayManager->findPath('qty_of_item_per_case', $meta, null, 'children');

        if ($weightPath) {
            $meta = $this->arrayManager->merge(
                $weightPath . static::META_CONFIG_PATH,
                $meta,
                [
                    'dataScope' => 'qty_of_item_per_case',
                    'validation' => [
                        'required-entry' => true,
                        'integer' => true
                    ],
                    'additionalClasses' => 'admin__field-small',
                    'imports' => [
                        'disabled' => '!${$.provider}:' . self::DATA_SCOPE_PRODUCT
                            . '.supplied_by:value'
                    ]
                ]
            );
        }
        return $meta;
    }
}