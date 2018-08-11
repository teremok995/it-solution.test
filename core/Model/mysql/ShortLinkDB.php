<?php
namespace ShortLink\Model\mysql;

use xPDO\xPDO;

class ShortLinkDB extends \ShortLink\Model\ShortLinkDB
{

    public static $metaMap = array (
        'package' => 'ShortLink\\Model',
        'version' => '3.0',
        'table' => 'ex_shortlink',
        'extends' => 'xPDO\\Om\\xPDOSimpleObject',
        'fields' => 
        array (
            'link' => '',
            'md5link' => '',
            'randlink' => '',
        ),
        'fieldMeta' => 
        array (
            'link' => 
            array (
                'dbtype' => 'longtext',
                'phptype' => 'string',
                'null' => true,
                'default' => '',
            ),
            'md5link' => 
            array (
                'dbtype' => 'varchar',
                'phptype' => 'string',
                'precision' => '32',
                'null' => true,
                'default' => '',
            ),
            'randlink' => 
            array (
                'dbtype' => 'varchar',
                'phptype' => 'string',
                'precision' => '100',
                'null' => true,
                'default' => '',
            ),
        ),
        'indexes' => 
        array (
            'md5link' => 
            array (
                'alias' => 'md5link',
                'primary' => false,
                'unique' => false,
                'type' => 'BTREE',
                'columns' => 
                array (
                    'md5link' => 
                    array (
                        'length' => '',
                        'collation' => 'A',
                        'null' => false,
                    ),
                ),
            ),
            'randlink' => 
            array (
                'alias' => 'randlink',
                'primary' => false,
                'unique' => false,
                'type' => 'BTREE',
                'columns' => 
                array (
                    'randlink' => 
                    array (
                        'length' => '',
                        'collation' => 'A',
                        'null' => false,
                    ),
                ),
            ),
        ),
    );
}
