<?php

namespace MageArab\Migrator\Model\Source;

class EnableDisable implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * To option array
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['label' => __('Enabled'), 'value' => 'enabled'],
            ['label' => __('Disabled'), 'value' => 'disabled'],
        ];
    }
}
