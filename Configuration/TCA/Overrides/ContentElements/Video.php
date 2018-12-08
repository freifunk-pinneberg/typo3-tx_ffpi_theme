<?php
return [
    'name' => 'video',
    'flexform' => true,

    'showitem' => '
            --palette--;;language,
            --palette--;' . $llFrontend . 'palette.general;general,
            header,
            bodytext,
            media,
            pi_flexform,
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
                'eval' => 'trim,required',
            ]
        ],
        'bodytext' => [
            'config' => [
                'eval' => 'trim,required',
            ]
        ],
        'media' => [
            'config' => [
                'appearance' => ['collapseAll' => 0],
                'overrideChildTca' => [
                    'columns' => [
                        'uid_local' => [
                            'config' => [
                                'appearance' => [
                                    'elementBrowserType' => 'file',
                                    'elementBrowserAllowed' => 'mp4,mpeg,webm',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]
    ]
];