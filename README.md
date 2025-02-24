# DHL Service for Price Calculation

This package integrates with the DHL API to retrieve shipping price details for packages based on various parameters. It allows users to calculate the shipping price using the "Worldwide Express" service and converts the price into MMK (Myanmar Kyat).

## Requirements

- PHP 7.3+
- Laravel 8+
- Guzzle HTTP Client (for making HTTP requests)

We can install the pacakge like this 
step : 1 

```bash
    composer require gmbf/dhlservice 
```

step : 2 
    add this provider class inside the config/app.php 
    Gmbf\Dhlservice\DhlServiceProvider::class,

you can use this class inside the project 

```bash 
   use Gmbf\Dhlservice\Service\DhlService ;
```
You can install the required dependencies using Composer:

```bash
    composer require guzzlehttp/guzzle
``` 
