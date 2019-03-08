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

interface ProfileSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Profile list.
     * @return \MageArab\Migrator\Api\Data\ProfileInterface[]
     */
    public function getItems();

    /**
     * Set title list.
     * @param \MageArab\Migrator\Api\Data\ProfileInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
