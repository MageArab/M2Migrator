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

namespace MageArab\Migrator\Model;

use MageArab\Migrator\Api\Data\ProfileInterface;
use MageArab\Migrator\Api\Data\ProfileInterfaceFactory;
use MageArab\Migrator\Model\ResourceModel\Profile as ResourceProfile;
use MageArab\Migrator\Model\ResourceModel\Profile\Collection;
use Magento\Framework\Api\DataObjectHelper;

class Profile extends \Magento\Framework\Model\AbstractModel
{
    protected $_eventPrefix = 'migrator_profile';
    protected $dataObjectHelper;

    protected $profileDataFactory;

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param ProfileInterfaceFactory $profileDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param ResourceProfile $resource
     * @param Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        ProfileInterfaceFactory $profileDataFactory,
        DataObjectHelper $dataObjectHelper,
        ResourceProfile $resource,
        Collection $resourceCollection,
        array $data = []
    ) {
        $this->profileDataFactory = $profileDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve profile model with profile data
     * @return ProfileInterface
     */
    public function getDataModel()
    {
        $profileData = $this->getData();

        $profileDataObject = $this->profileDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $profileDataObject,
            $profileData,
            ProfileInterface::class
        );

        return $profileDataObject;
    }
}
