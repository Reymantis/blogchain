<?php
return [
    'enable_likes' => env('BLOGCHAIN_ENABLE_LIKES', false),
    'enable_page_views' => env('BLOGCHAIN_ENABLE_PAGE_VIEWS', false),

    'pagination' => [
        'per_page' => env('BLOGCHAIN_PAGINATION_PER_PAGE', 30),
    ],
];
