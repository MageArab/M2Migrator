<?php

namespace MageArab\Migrator\Model\Source;

class ImportExport implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * To option array
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['label' => __('Import'), 'value' => 'import'],
            ['label' => __('Export'), 'value' => 'Export'],
        ];
    }
}
