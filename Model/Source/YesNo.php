<?php

namespace MageArab\Migrator\Model\Source;

class YesNo implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * To option array
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['label' => __('Yes'), 'value' => 1],
            ['label' => __('No'), 'value' => 0],
        ];
    }
}
