<?php

namespace MageArab\Migrator\Model\Source;

class LogLevel implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * To option array
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['label' => __('Successful Updates'), 'value' => 'SUCCESS'],
            ['label' => __('Warnings'), 'value' => 'WARNING'],
            ['label' => __('Errors'), 'value' => 'ERROR'],
        ];
    }
}