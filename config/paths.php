<?php
return [
    /* FRONT END VIEW PATHS */
    'DEBUG' => 'debug',

    /* FRONT END SERVICE REQUESTS */
    "FE_GET_PLAYER" => 'user/get_player',
    "FE_ADD_PLAYER" => 'user/add_player',
    "FE_LOAD_CHART" => 'user/load_chart',
    
    /* BACKEND SERVICE PATHS */
    "GET_PLAYER" => 'mlb-t5/players/%s/profile.json',
    
];
