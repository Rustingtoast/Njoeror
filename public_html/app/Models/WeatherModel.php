<?

namespace App\Models;

use CodeIgniter\Model;

class WeatherModel extends Model
{
    private $wmoWeatherCodes;

    public function __construct()
    {
        /**
         * ChatGPT Prompt "gib mir ein array mit dem WMO weather codes damit ich die in php einbauen kann und abgleichen ann"
         * 
         * Quelle zum überprüfen der KI Aussage
         * 
         * https://www.meteopool.org/de/encyclopedia-wmo-ww-wx-code-id2
         */
        $this->wmoWeatherCodes = [
            0  => 'Klarer Himmel',
            1  => 'Überwiegend klar',
            2  => 'Teilweise bewölkt',
            3  => 'Bedeckt',
            45 => 'Nebel',
            48 => 'Reifender Nebel',
            51 => 'Leichter Nieselregen',
            53 => 'Mäßiger Nieselregen',
            55 => 'Starker Nieselregen',
            56 => 'Leichter gefrierender Nieselregen',
            57 => 'Starker gefrierender Nieselregen',
            61 => 'Leichter Regen',
            63 => 'Mäßiger Regen',
            65 => 'Starker Regen',
            66 => 'Leichter gefrierender Regen',
            67 => 'Starker gefrierender Regen',
            71 => 'Leichter Schneefall',
            73 => 'Mäßiger Schneefall',
            75 => 'Starker Schneefall',
            77 => 'Schneegriesel',
            80 => 'Leichte Regenschauer',
            81 => 'Mäßige Regenschauer',
            82 => 'Heftige Regenschauer',
            85 => 'Leichte Schneeschauer',
            86 => 'Starke Schneeschauer',
            95 => 'Gewitter',
            96 => 'Gewitter mit leichtem Hagel',
            99 => 'Gewitter mit starkem Hagel',
        ];
    }

    public function getWeatherAPI()
    {
        /**
         * Quelle von unserer API
         * https://open-meteo.com/
         */
        $url = "https://api.open-meteo.com/v1/forecast?latitude=53.4582&longitude=12.2625&current=temperature_2m,weather_code,rain&forecast_days=1";
        $apiJSON = file_get_contents($url);
        $apiObj = json_decode($apiJSON);
        $apiObj = $apiObj->current;
        return array(
            "Temperatur in C°" => $apiObj->temperature_2m,
            "Regen in mm" => $apiObj->rain,
            "Wetter_Code" => $this->wmoWeatherCodes[$apiObj->weather_code],
        );
    }
}
