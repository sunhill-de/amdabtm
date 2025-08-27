<?php

return [
    'type'=>'import_filter',
    'version'=>'0.0.1',
    'dependent_modules'=>['core','Beers'],
    'seeds'=>[
        'data_source'=>['name'=>'untappd'],
    ]
];
