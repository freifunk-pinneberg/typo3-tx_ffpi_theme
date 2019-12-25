<?php
$EM_CONF[$_EXTKEY] = array(
    'title'            => 'Freifunk Pinneberg Theme',
    'description'      => 'Theme for Freifunk Pinneberg',
    'category'         => 'distribution',
    'author'           => 'Kevin Quiatkowski',
    'author_email'     => 'kevin@pinneberg.freifunk.net',
    'author_company'   => 'Freifunk Pinneberg',
    'shy'              => '',
    'priority'         => '',
    'module'           => '',
    'state'            => 'stable',
    'internal'         => '',
    'uploadfolder'     => '0',
    'createDirs'       => '',
    'modify_tables'    => '',
    'clearCacheOnLoad' => 0,
    'lockType'         => '',
    'version'          => '2.0.0',
    'constraints'      => array(
        'depends'   => array(
             'typo3' => '8.7.0-9.5.99',
        ),
        'conflicts' => array(),
        'suggests'  => array(
            'ffpi_nodecounter' => '',
            'ffpi_node_updates' => '',
            'rte_ckeditor_image' => '',
            'tx_seo' => ''
        ),
    ),
);
