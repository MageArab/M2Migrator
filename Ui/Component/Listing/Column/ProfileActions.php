<?php
/**
 * Import/Export magento 2 module that do it all
 * Copyright (C) 2018
 *
 * This file included in MageArab/Migrator is licensed under OSL 3.0
 *
 * http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * Please see LICENSE.txt for the full text of the OSL 3.0 license
 */

namespace MageArab\Migrator\Ui\Component\Listing\Column;

class ProfileActions extends \Magento\Ui\Component\Listing\Columns\Column
{
    const URL_PATH_EDIT = 'migrator/profile/edit';
    const URL_PATH_RUN = 'migrator/profile/run';
    protected $urlBuilder;

    /**
     * @param \Magento\Framework\View\Element\UiComponent\ContextInterface $context
     * @param \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory
     * @param \Magento\Framework\UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item['profile_id'])) {
                    $item[$this->getData('name')] = [
                        'edit' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_EDIT,
                                [
                                    'profile_id' => $item['profile_id']
                                ]
                            ),
                            'label' => __('Edit')
                        ],
                        'run' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_RUN,
                                [
                                    'profile_id' => $item['profile_id']
                                ]
                            ),
                            'label' => __('Run')
                        ]
                    ];
                }
            }
        }

        return $dataSource;
    }
}
