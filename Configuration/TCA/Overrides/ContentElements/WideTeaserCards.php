<?php

return [
    'name' => 'wide_teaser_cards',
    'flexform' => false,

    'showitem' => '
            --palette--;;language,
            --palette--;' . $llFrontend . 'palette.general;general,
            header,
            media,
        --div--;' . $llFrontend . 'tabs.appearance,
            --palette--;' . $llFrontend . 'palette.frames;frames,
            --palette--;' . $llFrontend . 'palette.appearanceLinks;appearanceLinks,
        --div--;' . $llFrontend . 'tabs.access,
            --palette--;;hidden,
            --palette--;' . $llFrontend . 'palette.access;access,
        --div--;' . $llCore . 'sys_category.tabs.category,categories,
            categories,
        --div--;' . $llFrontend . 'extended,',
    'columnsOverrides' => [
        'header' => [
            'config' => [
                'eval' => 'trim',
            ]
        ],
        'media' => [
            'config' => [
                'overrideChildTca' => [
                    'types' => [
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                            --palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette,title,description,link,
                            --palette--;;filePalette'
                        ],
                    ]
                ]
            ]
        ]
    ]
];
