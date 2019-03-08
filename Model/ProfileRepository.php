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

use MageArab\Migrator\Api\Data\ProfileInterfaceFactory;
use MageArab\Migrator\Api\Data\ProfileSearchResultsInterfaceFactory;
use MageArab\Migrator\Api\ProfileRepositoryInterface;
use MageArab\Migrator\Model\ResourceModel\Profile as ResourceProfile;
use MageArab\Migrator\Model\ResourceModel\Profile\CollectionFactory as ProfileCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

class ProfileRepository implements ProfileRepositoryInterface
{
    protected $searchResultsFactory;

    protected $profileFactory;

    private $collectionProcessor;

    protected $extensionAttributesJoinProcessor;

    protected $dataObjectHelper;

    protected $resource;

    protected $dataObjectProcessor;

    protected $profileCollectionFactory;

    protected $dataProfileFactory;

    private $storeManager;

    protected $extensibleDataObjectConverter;

    /**
     * @param ResourceProfile $resource
     * @param ProfileFactory $profileFactory
     * @param ProfileInterfaceFactory $dataProfileFactory
     * @param ProfileCollectionFactory $profileCollectionFactory
     * @param ProfileSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceProfile $resource,
        ProfileFactory $profileFactory,
        ProfileInterfaceFactory $dataProfileFactory,
        ProfileCollectionFactory $profileCollectionFactory,
        ProfileSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->profileFactory = $profileFactory;
        $this->profileCollectionFactory = $profileCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataProfileFactory = $dataProfileFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \MageArab\Migrator\Api\Data\ProfileInterface $profile
    ) {
        /* if (empty($profile->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $profile->setStoreId($storeId);
        } */

        $profileData = $this->extensibleDataObjectConverter->toNestedArray(
            $profile,
            [],
            \MageArab\Migrator\Api\Data\ProfileInterface::class
        );

        $profileModel = $this->profileFactory->create()->setData($profileData);

        try {
            $this->resource->save($profileModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the profile: %1',
                $exception->getMessage()
            ));
        }
        return $profileModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getById($profileId)
    {
        $profile = $this->profileFactory->create();
        $this->resource->load($profile, $profileId);
        if (!$profile->getId()) {
            throw new NoSuchEntityException(__('Profile with id "%1" does not exist.', $profileId));
        }
        return $profile->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->profileCollectionFactory->create();

        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \MageArab\Migrator\Api\Data\ProfileInterface::class
        );

        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \MageArab\Migrator\Api\Data\ProfileInterface $profile
    ) {
        try {
            $profileModel = $this->profileFactory->create();
            $this->resource->load($profileModel, $profile->getProfileId());
            $this->resource->delete($profileModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Profile: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($profileId)
    {
        return $this->delete($this->getById($profileId));
    }
}
