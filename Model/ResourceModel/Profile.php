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

namespace MageArab\Migrator\Model\ResourceModel;

class Profile extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('migrator_profile', 'profile_id');
    }
}
