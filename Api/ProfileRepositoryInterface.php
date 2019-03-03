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

namespace MageArab\Migrator\Api;

use MageArab\Migrator\Api\Data\ProfileInterface;
use MageArab\Migrator\Api\Data\ProfileSearchResultsInterface;

interface ProfileRepositoryInterface
{

    /**
     * Save Profile
     * @param ProfileInterface $profile
     * @return ProfileInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        ProfileInterface $profile
    );

    /**
     * Retrieve Profile
     * @param string $profileId
     * @return ProfileInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($profileId);

    /**
     * Retrieve Profile matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return ProfileSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Profile
     * @param ProfileInterface $profile
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        ProfileInterface $profile
    );

    /**
     * Delete Profile by ID
     * @param string $profileId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($profileId);
}
