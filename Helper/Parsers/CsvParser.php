<?php

namespace MageArab\Migrator\Helper\Parsers;

use League\Csv\Exception;
use MageArab\Migrator\Helper\ArrayHelpers;
use InvalidArgumentException;
use League\Csv\Reader;

class CsvParser extends Parser
{
    private $csv;

    public function __construct($data, $delimiter = null)
    {
        if (is_string($data)) {
            $this->csv = Reader::createFromString($data);
            if ($delimiter) {
                try {
                    $this->csv->setDelimiter($delimiter);
                } catch (Exception $e) {
                }
            }
            try {
                $this->csv->setEnclosure('|');
            } catch (Exception $e) {
            }
        } else {
            throw new InvalidArgumentException(
                'CsvParser only accepts (string) [csv] for $data.'
            );
        }
    }

    public function toArray()
    {
        $temp = $this->csv->jsonSerialize();
        $headings = $temp[0];
        $result = $headings;
        if (count($temp) > 1) {
            $result = [];
            for ($i = 1; $i < count($temp); ++$i) {
                $row = [];
                for ($j = 0; $j < count($headings); ++$j) {
                    $row[$headings[$j]] = $temp[$i][$j];
                }
                $expanded = [];
                foreach ($row as $key => $value) {
                    ArrayHelpers::set($expanded, $key, $value);
                }
                $result[] = $expanded;
            }
        }
        return $result;
    }
}