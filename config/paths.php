<?php
return [
    /* FRONT END VIEW PATHS */
    'DEBUG' => 'debug',

    /* FRONT END SERVICE REQUESTS */
    "FE_GET_CHAMPIONS" => 'user/get_champions',
    "FE_GET_MASTERY" => "user/get_mastery",
    
    /* BACKEND SERVICE PATHS */
    "GET_CHAMPIONS" => 'api/lol/static-data/na/v1.2/champion',
    "GET_SUMMONER" => 'api/lol/na/v1.4/summoner/by-name/%s',
    "GET_MASTERY" => 'championmastery/location/NA1/player/%s/champions',
    
];
