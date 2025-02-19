<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Country;
use App\Models\County;
use App\Models\Region;
use App\Models\Constituency;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load JSON data
        $jsonPath = database_path('seeders/data/countries.json');
        $data = json_decode(File::get($jsonPath), true);

        if (!$data) {
            $this->command->error('Failed to load JSON file.');
            return;
        }

        foreach ($data as $countryData) {
            // Insert or update country
            $country = Country::updateOrCreate(
                ['code' => $countryData['code']],
                ['name' => $countryData['name']]
            );

            // Insert counties
            if (!empty($countryData['counties'])) {
                foreach ($countryData['counties'] as $countyData) {
                    County::updateOrCreate(
                        ['code' => $countyData['code']],
                        ['name' => $countyData['name'], 'country_id' => $country->id]
                    );
                }
            }

            // Insert regions and constituencies
            if (!empty($countryData['regions'])) {
                foreach ($countryData['regions'] as $regionData) {
                    $region = Region::updateOrCreate(
                        ['code' => $regionData['code']],
                        ['name' => $regionData['name'], 'country_id' => $country->id]
                    );

                    // Insert constituencies under regions
                    if (!empty($regionData['constituencies'])) {
                        foreach ($regionData['constituencies'] as $constituencyData) {
                            Constituency::updateOrCreate(
                                ['code' => $constituencyData['code']],
                                ['name' => $constituencyData['name'], 'region_id' => $region->id, 'country_id' => $country->id]
                            );
                        }
                    }
                }
            }

            // Insert constituencies directly under country (if applicable)
            if (!empty($countryData['constituencies'])) {
                foreach ($countryData['constituencies'] as $constituencyData) {
                    Constituency::updateOrCreate(
                        ['code' => $constituencyData['code']],
                        ['name' => $constituencyData['name'], 'country_id' => $country->id]
                    );
                }
            }
        }

        $this->command->info('Countries, counties, regions, and constituencies seeded successfully!');
    }
}
