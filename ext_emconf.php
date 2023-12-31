<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Freifunk Pinneberg Theme',
    'description' => 'Theme for Freifunk Pinneberg',
    'category' => 'distribution',
    'author' => 'Kevin Quiatkowski',
    'author_email' => 'kevin@pinneberg.freifunk.net',
    'author_company' => 'Freifunk Pinneberg',
    'state' => 'stable',
    'version' => '2.2.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.0.0-10.4.99',
        ],
        'conflicts' => [],
        'suggests' => [
            'ffpi_nodecounter' => '',
            'ffpi_node_updates' => '',
            'ffpi_firmware_list' => '',
            'rte_ckeditor_image' => '',
            'tx_seo' => '',
        ],
    ],
];
