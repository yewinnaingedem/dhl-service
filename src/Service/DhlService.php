<?php

namespace Gmbf\DhlService\Service;

use GuzzleHttp\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DhlService
{
    protected $client;
    protected $apiUrl;
    protected $accountNumber;
    protected $apiUsername;
    protected $apiPassword;
    protected $plannedDate;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiUrl = config('dhl.api_url') . '/rates';
        $this->accountNumber = config('dhl.account_number');
        $this->apiUsername = config('dhl.username');
        $this->apiPassword = config('dhl.password');
        $this->plannedDate = config('dhl.planned_date');
    }

    public function getRates(array $params)
    {
        $params = array_merge($params, [
            'accountNumber' => $this->accountNumber,
            'isCustomsDeclarable' => 'true',
            'unitOfMeasurement' => 'metric'
        ]);
        return $params ;
        $response = $this->client->request('GET', $this->apiUrl, [
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode($this->apiUsername . ':' . $this->apiPassword),
                'Content-Type' => 'application/json'
            ],
            'query' => $params
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function getPlannedShipDate()
    {
        $currentDate = Carbon::now();
        $holidays = $this->getMyanmarHolidays($currentDate->year);
        $plannedShippingDate = $currentDate->copy()->addDays($this->plannedDate);

        // Loop to check if the date is a Sunday or holiday, and increment if needed
        while ($plannedShippingDate->isSunday() || in_array($plannedShippingDate->format('Y-m-d'), $holidays)) {
            $plannedShippingDate->addDay();
        }

        return $plannedShippingDate->format('Y-m-d');
    }

    private function getMyanmarHolidays($year)
    {
        $filePath = __DIR__ . "../dhl.php";
    
        if (!file_exists($filePath)) {
            \Log::error("Myanmar holidays file not found.");
            return [];
        }

        $holidayData = json_decode(file_get_contents($filePath), true);

        return $holidayData[$year] ?? [];

    }
}
