<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\City;
use Illuminate\Support\Facades\Http;

class ProcessGeolocation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $cities = City::all();

        foreach($cities as $city){
            $dms = $this->getDMs($city->name);

            $city->latitude = $dms['lat'];
            $city->longitude = $dms['lng'];
            $city->save();

            echo "{$city->name} teraz pozná svoje súradnice!\r\n";
        }
    }

    public function getDMs($city)
    {
        $response = Http::get('https://api.opencagedata.com/geocode/v1/json', [
            'q' => "{$city}, Nitriansky Kraj, Slovensko",
            'key' => '48e1628f904f44a4824772a46579d06f',
        ]);

        return $response->json()['results'][0]['annotations']['DMS'];
    }
}
