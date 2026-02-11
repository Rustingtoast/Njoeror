<?php

namespace App\Controllers;

use App\Models\WeatherModel;

class Weather extends BaseController
{
    public function index()
    {
        print_r($this->getWeatherJSON());
    }

    public function getWeatherJSON()
    {
        $mdlWeather = new WeatherModel();
        $jsonData = $mdlWeather->getWeatherAPI();
        return ($jsonData);
    }
}
