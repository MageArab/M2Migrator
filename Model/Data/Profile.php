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

namespace MageArab\Migrator\Model\Data;

use MageArab\Migrator\Api\Data\ProfileInterface;

class Profile extends \Magento\Framework\Api\AbstractExtensibleObject implements ProfileInterface
{

    /**
     * Get profile_id
     * @return string|null
     */
    public function getProfileId()
    {
        return $this->_get(self::PROFILE_ID);
    }

    /**
     * Set profile_id
     * @param string $profileId
     * @return \MageArab\Migrator\Api\Data\ProfileInterface
     */
    public function setProfileId($profileId)
    {
        return $this->setData(self::PROFILE_ID, $profileId);
    }

    /**
     * Get title
     * @return string|null
     */
    public function getTitle()
    {
        return $this->_get(self::TITLE);
    }

    /**
     * Set title
     * @param string $title
     * @return \MageArab\Migrator\Api\Data\ProfileInterface
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * Get profile_type
     * @return string|null
     */
    public function getProfileType()
    {
        return $this->_get(self::PROFILE_TYPE);
    }

    /**
     * Set profile_type
     * @param string $profileType
     * @return \MageArab\Migrator\Api\Data\ProfileInterface
     */
    public function setProfileType($profileType)
    {
        return $this->setData(self::PROFILE_TYPE, $profileType);
    }

    /**
     * Get profile_status
     * @return string|null
     */
    public function getProfileStatus()
    {
        return $this->_get(self::PROFILE_STATUS);
    }

    /**
     * Set profile_status
     * @param string $profileStatus
     * @return \MageArab\Migrator\Api\Data\ProfileInterface
     */
    public function setProfileStatus($profileStatus)
    {
        return $this->setData(self::PROFILE_STATUS, $profileStatus);
    }

    /**
     * Get media_type
     * @return string|null
     */
    public function getMediaType()
    {
        return $this->_get(self::MEDIA_TYPE);
    }

    /**
     * Set media_type
     * @param string $mediaType
     * @return \MageArab\Migrator\Api\Data\ProfileInterface
     */
    public function setMediaType($mediaType)
    {
        return $this->setData(self::MEDIA_TYPE, $mediaType);
    }

    /**
     * Get run_status
     * @return string|null
     */
    public function getRunStatus()
    {
        return $this->_get(self::RUN_STATUS);
    }

    /**
     * Set run_status
     * @param string $runStatus
     * @return \MageArab\Migrator\Api\Data\ProfileInterface
     */
    public function setRunStatus($runStatus)
    {
        return $this->setData(self::RUN_STATUS, $runStatus);
    }
}
