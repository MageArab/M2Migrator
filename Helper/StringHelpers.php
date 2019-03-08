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

namespace MageArab\Migrator\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Symfony\Component\Inflector\Inflector;

class StringHelpers extends AbstractHelper
{

    /**
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    ) {
        parent::__construct($context);
    }

    public static function singular($value)
    {
        $singular = Inflector::singularize($value);
        return static::matchCase($singular, $value);
    }

    protected static function matchCase($value, $comparison)
    {
        $functions = ['mb_strtolower', 'mb_strtoupper', 'ucfirst', 'ucwords'];
        foreach ($functions as $function) {
            if (call_user_func($function, $comparison) === $comparison) {
                return call_user_func($function, $value);
            }
        }
        return $value;
    }
}
