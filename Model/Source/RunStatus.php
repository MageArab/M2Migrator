<?php

namespace MageArab\Migrator\Model\Source;

class RunStatus implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * To option array
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['label' => __('Idle'), 'value' => 'idle'],
            ['label' => __('Pending'), 'value' => 'pending'],
            ['label' => __('Running'), 'value' => 'running'],
            ['label' => __('Paused'), 'value' => 'paused'],
            ['label' => __('Stopped'), 'value' => 'stopped'],
            ['label' => __('Finished'), 'value' => 'finished'],
        ];
    }
}
