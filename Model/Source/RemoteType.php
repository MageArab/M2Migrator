<?php

namespace MageArab\Migrator\Model\Source;

class RemoteType implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * To option array
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['label' => __('* None'), 'value' => 'local'],
            ['label' => __('FTP'), 'value' => 'ftp'],
            ['label' => __('SFTP'), 'value' => 'sftp'],
            ['label' => __('S3'), 'value' => 's3'],
            ['label' => __('DropBox'), 'value' => 'dropbox'],
            ['label' => __('WebDAV'), 'value' => 'WebDAV'],
            ['label' => __('GoogleDrive'), 'value' => 'google-drive'],
            ['label' => __('OneDrive'), 'value' => 'one-drive'],
        ];
    }
}
