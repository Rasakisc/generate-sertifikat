<?php

return [
    // Tampilan dibaca dari folder views/ di folder utama (bukan resources/views)
    'paths' => [base_path('views')],
    'compiled' => env('VIEW_COMPILED_PATH', realpath(storage_path('framework/views'))),
];
