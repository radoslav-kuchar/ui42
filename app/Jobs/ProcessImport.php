<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use DOMWrap\Document;
use App\Models\District;
use App\Models\City;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProcessImport implements ShouldQueue
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
        $districts = $this->getDistricts();

        foreach ($districts as $district) {
            $district = District::firstOrCreate([
                'name' => $district->text(),
                'url' => $district->attr('href'),
            ]);

            $cities = $this->getCities($district->url);

            foreach ($cities as $city) {
                $cityDoc = $this->getCity($city->attr('href'));

                if ($cityDoc->find('tr[valign=top] td:contains(\'Okres:\')')->following('td')->text() == $district->name) {
                    if (!City::where('name', $city->text())->exists()) {

                        $imageNode = $cityDoc->find('img[title^=Erb]');
                        $imageName = Str::ascii(Str::studly($imageNode->attr('title'))) . '.' . pathinfo($imageNode->attr('src'))['extension'];

                        if (!Storage::disk('public')->exists($imageName)) {
                            $image = file_get_contents($imageNode->attr('src'));
                            Storage::disk('public')->put($imageName, $image);
                        }

                        $numbers = $this->getNumbers($cityDoc);

                        $address = $cityDoc->find('td[valign=top]')->slice(-5);

                        City::firstOrCreate([
                            'name' => $city->text(),
                            'district_id' => $district->id,
                            'mayor_name' => $cityDoc->find('tr[valign=top] td:contains(\'Starosta:\'), tr[valign=top] td:contains(\'Primátor:\')')->following('td')->text(),
                            'email' => $cityDoc->find('a[href^="mailto:"]')->text(),
                            'phone' => $numbers[0],
                            'fax' => $numbers[1],
                            'web' => $cityDoc->find('a:contains(\'www.\')')->attr('href'),
                            'coat_of_arms_path' => $imageName,
                            'city_hall_address' => "{$address[0]->text()}, {$address[1]->text()}",
                        ]);
                    }

                    echo 'Obec ' . $city->text() . ' bola pridaná úspešne.' . "\r\n";
                }
            }
        }
    }


    public function getDistricts()
    {
        $html = file_get_contents('https://www.e-obce.sk/kraj/NR.html');

        $doc = new Document();
        $doc->html($html);

        return $doc->find('.okreslink');
    }

    public function getCities($url)
    {
        $districtHtml = file_get_contents($url);

        $districtDoc = new Document();
        $districtDoc->html($districtHtml);

        $cities = $districtDoc->find('a[href^="https://www.e-obce.sk/obec/"]');
        $citiesSlice = $cities->slice(0, $cities->count() - 6);

        return $citiesSlice;
    }

    public function getCity($url)
    {
        $cityHtml = file_get_contents($url);

        $cityDoc = new Document();
        return $cityDoc->html($cityHtml);
    }

    public function getNumbers($cityDoc)
    {
        $cisla = $cityDoc->find('td:contains(\'/\')')->slice(-2);

        $numbers = array();

        if (!isset($cisla[0]) || !(strncmp($cisla[0]->text(), "0", 1) === 0)) {
            $numbers[0] = NULL;
        } else {
            $numbers[0] = $cisla[0]->text();
        }
        if (!isset($cisla[1]) || !(strncmp($cisla[1]->text(), "0", 1) === 0)) {
            $numbers[1] = NULL;
        } else {
            $numbers[1] = $cisla[1]->text();
        }

        return $numbers;
    }

}
