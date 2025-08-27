<?php

return [
    'type'=>'data_pool',
    'version'=>'0.0.1',
    'dependent_modules'=>['core'],
    'seeds'=>[
        'company_types'=>['name'=>'brewery'],
        'event_types'=>['name'=>'consume.beer']
    ]
];

