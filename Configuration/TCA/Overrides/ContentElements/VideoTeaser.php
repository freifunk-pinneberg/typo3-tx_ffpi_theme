<?php

return [
    'name' => 'video_teaser',
    'flexform' => false,

    'showitem' => '
            --palette--;;language,
            --palette--;' . $llFrontend . 'palette.general;general,
            header,
            header_layout,
            bodytext,
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
                'eval' => 'trim,required',
            ]
        ],
        'bodytext' => [
            'config' => [
                'eval' => 'trim,required',
            ]
        ],
    ]
];
