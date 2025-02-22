<?php


return [
    'api_key' => env('DHL_API_KEY', 'your-default-api-key'),
    'api_url' => env('DHL_API_URL', 'https://api.dhl.com/'),
    'account_number' => env('DHL_API_ACCOUNT_NUMBER') ,
    'username' => env('DHL_API_USERNAME') ,
    'password' => env('DHL_API_PASSWORD') ,
    'service_fee' => env('DHL_SERVICE_FEE_AMOUNT' , 0) ,
    'service_percentage' => env('DHL_SERVICE_FEE_PERCENTAGE' , 0) ,
    'country_code' => env('DEFAULT_COUNTRY_CODE'),
    'city_name' => env('DEFAULT_CITY' , 'Yangon') ,
    'postal_code' => env('DEFAULT_POSTAL_CODE' , 11131) ,
    'planned_date' => env('DHL_PLANNED_DATE')
];

?>