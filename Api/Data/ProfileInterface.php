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

namespace MageArab\Migrator\Api\Data;

interface ProfileInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{
    const PROFILE_TYPE = 'profile_type';
    const RUN_STATUS = 'run_status';
    const PROFILE_ID = 'profile_id';
    const TITLE = 'title';
    const PROFILE_STATUS = 'profile_status';
    const MEDIA_TYPE = 'media_type';

    /**
     * Get profile_id
     * @return string|null
     */
    public function getProfileId();

    /**
     * Set profile_id
     * @param string $profileId
     * @return \MageArab\Migrator\Api\Data\ProfileInterface
     */
    public function setProfileId($profileId);

    /**
     * Get title
     * @return string|null
     */
    public function getTitle();

    /**
     * Set title
     * @param string $title
     * @return \MageArab\Migrator\Api\Data\ProfileInterface
     */
    public function setTitle($title);

    /**
     * Get profile_type
     * @return string|null
     */
    public function getProfileType();

    /**
     * Set profile_type
     * @param string $profileType
     * @return \MageArab\Migrator\Api\Data\ProfileInterface
     */
    public function setProfileType($profileType);

    /**
     * Get profile_status
     * @return string|null
     */
    public function getProfileStatus();

    /**
     * Set profile_status
     * @param string $profileStatus
     * @return \MageArab\Migrator\Api\Data\ProfileInterface
     */
    public function setProfileStatus($profileStatus);

    /**
     * Get media_type
     * @return string|null
     */
    public function getMediaType();

    /**
     * Set media_type
     * @param string $mediaType
     * @return \MageArab\Migrator\Api\Data\ProfileInterface
     */
    public function setMediaType($mediaType);

    /**
     * Get run_status
     * @return string|null
     */
    public function getRunStatus();

    /**
     * Set run_status
     * @param string $runStatus
     * @return \MageArab\Migrator\Api\Data\ProfileInterface
     */
    public function setRunStatus($runStatus);
}
