<?php

return [

    'github' => 'https://github.com/Narcisse006',

    'email' => env('MAIL_TO_ADDRESS', 'ogoudikpenarcisse@gmail.com'),

    'phone_bj' => [
        'display' => '+229 01 99 05 10 03',
        'tel' => '+2290199051003',
    ],

    'phone_bf' => [
        'display' => '+226 77 50 30 15',
        'tel' => '+22677503015',
    ],

    'whatsapp' => [
        'display' => '+226 77 50 30 15',
        'url' => 'https://wa.me/22677503015?text=' . rawurlencode('Bonjour Narcisse, je souhaite vous contacter concernant '),
    ],

    /*
    | Remplace chaque URL par le dépôt GitHub exact du projet.
    | Tant que l’URL pointe vers le profil, le signal « projet » reste faible.
    */
    'projects' => [
        'timelux' => env('PROJECT_TIMELUX_URL', 'https://github.com/Narcisse006'),
        'forum' => env('PROJECT_FORUM_URL', 'https://github.com/Narcisse006'),
        'stock' => env('PROJECT_STOCK_URL', 'https://github.com/Narcisse006'),
        'colis' => env('PROJECT_COLIS_URL', 'https://github.com/Narcisse006'),
    ],

];
