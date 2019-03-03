<?php

namespace MageArab\Migrator\Model\Source;

class CompressType implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * To option array
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['label' => __('* None'), 'value' => ''],
            ['label' => __('GZ'), 'value' => 'gz'],
            ['label' => __('BZ2'), 'value' => 'bz2'],
            ['label' => __('ZIP'), 'value' => 'zip'],
        ];
    }
}