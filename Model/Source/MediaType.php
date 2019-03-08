<?php

namespace MageArab\Migrator\Model\Source;

class MediaType implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * To option array
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['label' => __('CSV'), 'value' => 'csv'],
            ['label' => __('XML'), 'value' => 'xml'],
            ['label' => __('JSON'), 'value' => 'json'],
            ['label' => __('YAML'), 'value' => 'yaml'],
        ];
    }
}
