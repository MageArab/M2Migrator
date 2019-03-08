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

use InvalidArgumentException;
use MageArab\Migrator\Helper\Parsers\ArrayParser;
use MageArab\Migrator\Helper\Parsers\CsvParser;
use MageArab\Migrator\Helper\Parsers\JsonParser;
use MageArab\Migrator\Helper\Parsers\Parser;
use MageArab\Migrator\Helper\Parsers\XmlParser;
use MageArab\Migrator\Helper\Parsers\YamlParser;
use Magento\Framework\App\Helper\AbstractHelper;

class Formatter extends AbstractHelper
{
    /**
     * Add class constants that help define input format
     */
    const CSV = 'csv';
    const JSON = 'json';
    const XML = 'xml';
    const ARR = 'array';
    const YAML = 'yaml';
    private static $supportedTypes = [self::CSV, self::JSON, self::XML, self::ARR, self::YAML];
    /**
     * @var Parser
     */
    private $parser;

    /**
     * Make: Returns an instance of formatter initialized with data and type
     *
     * @param  mixed $data The data that formatter should parse
     * @param  string $type The type of data formatter is expected to parse
     * @param  string $delimiter The delimitation of data formatter to csv
     * @return Formatter
     */
    public function create($data, $type, $delimiter = null)
    {
        if (in_array($type, self::$supportedTypes)) {
            $parser = null;
            switch ($type) {
                case self::CSV:
                    $this->parser = new CsvParser($data, $delimiter);
                    break;
                case self::JSON:
                    $this->parser = new JsonParser($data);
                    break;
                case self::XML:
                    $this->parser = new XmlParser($data);
                    break;
                case self::ARR:
                    $this->parser = new ArrayParser($data);
                    break;
                case self::YAML:
                    $this->parser = new YamlParser($data);
                    break;
            }
            return $this;
        }
        throw new InvalidArgumentException(
            'make function only accepts [csv, json, xml, array] for $type but ' . $type . ' was provided.'
        );
    }

    /**
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    ) {
        parent::__construct($context);
    }

    public function toJson()
    {
        return $this->parser->toJson();
    }

    public function toArray()
    {
        return $this->parser->toArray();
    }

    public function toYaml()
    {
        return $this->parser->toYaml();
    }

    public function toXml($baseNode = 'xml', $encoding = 'utf-8', $formatted = false)
    {
        return $this->parser->toXml($baseNode, $encoding, $formatted);
    }

    public function toCsv($newline = "\n", $delimiter = ",", $enclosure = '"', $escape = "\\")
    {
        return $this->parser->toCsv($newline, $delimiter, $enclosure, $escape);
    }
}
