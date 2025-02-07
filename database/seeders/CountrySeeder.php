<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Country;
use App\Models\County;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            [
                'name' => 'England',
                'code' => 'ENG',
                'counties' => [
                    [
                        'name' => 'Avon',
                        'code' => 'AVN',
                    ],
                    [
                        'name' => 'Bedfordshire',
                        'code' => 'BDF',
                    ],
                    [
                        'name' => 'Berkshire',
                        'code' => 'BRK',
                    ],
                    [
                        'name' => 'Buckinghamshire',
                        'code' => 'BKM',
                    ],
                    [
                        'name' => 'Cambridgeshire',
                        'code' => 'CAM',
                    ],
                    [
                        'name' => 'Cheshire',
                        'code' => 'CHS',
                    ],
                    [
                        'name' => 'Cleveland',
                        'code' => 'CLV',
                    ],
                    [
                        'name' => 'Cornwall',
                        'code' => 'CON',
                    ],
                    [
                        'name' => 'Cumbria',
                        'code' => 'CMA',
                    ],
                    [
                        'name' => 'Derbyshire',
                        'code' => 'DBY',
                    ],
                    [
                        'name' => 'Devon',
                        'code' => 'DEV',
                    ],
                    [
                        'name' => 'Dorset',
                        'code' => 'DOR',
                    ],
                    [
                        'name' => 'Durham',
                        'code' => 'DUR',
                    ],
                    [
                        'name' => 'East Sussex',
                        'code' => 'SXE',
                    ],
                    [
                        'name' => 'Essex',
                        'code' => 'ESS',
                    ],
                    [
                        'name' => 'Gloucestershire',
                        'code' => 'GLS',
                    ],
                    [
                        'name' => 'Hampshire',
                        'code' => 'HAM',
                    ],
                    [
                        'name' => 'Herefordshire',
                        'code' => 'HEF',
                    ],
                    [
                        'name' => 'Hertfordshire',
                        'code' => 'HRT',
                    ],
                    [
                        'name' => 'Isle of Wight',
                        'code' => 'IOW',
                    ],
                    [
                        'name' => 'Kent',
                        'code' => 'KEN',
                    ],
                    [
                        'name' => 'Lancashire',
                        'code' => 'LAN',
                    ],
                    [
                        'name' => 'Leicestershire',
                        'code' => 'LEI',
                    ],
                    [
                        'name' => 'Lincolnshire',
                        'code' => 'LIN',
                    ],
                    [
                        'name' => 'London',
                        'code' => 'LDN',
                    ],
                    [
                        'name' => 'Merseyside',
                        'code' => 'MSY',
                    ],
                    [
                        'name' => 'Norfolk',
                        'code' => 'NFK',
                    ],
                    [
                        'name' => 'Northamptonshire',
                        'code' => 'NTH',
                    ],
                    [
                        'name' => 'Northumberland',
                        'code' => 'NBL',
                    ],
                    [
                        'name' => 'North Yorkshire',
                        'code' => 'NYK',
                    ],
                    [
                        'name' => 'Nottinghamshire',
                        'code' => 'NTT',
                    ],
                    [
                        'name' => 'Oxfordshire',
                        'code' => 'OXF',
                    ],
                    [
                        'name' => 'Rutland',
                        'code' => 'RUT',
                    ],
                    [
                        'name' => 'Shropshire',
                        'code' => 'SAL',
                    ],
                    [
                        'name' => 'Somerset',
                        'code' => 'SOM',
                    ],
                    [
                        'name' => 'South Yorkshire',
                        'code' => 'SYK',
                    ],
                    [
                        'name' => 'Staffordshire',
                        'code' => 'STS',
                    ],
                    [
                        'name' => 'Suffolk',
                        'code' => 'SFK',
                    ],
                    [
                        'name' => 'Surrey',
                        'code' => 'SRY',
                    ],
                    [
                        'name' => 'Tyne and Wear',
                        'code' => 'TWR',
                    ],
                    [
                        'name' => 'Warwickshire',
                        'code' => 'WAR',
                    ],
                    [
                        'name' => 'West Midlands',
                        'code' => 'WMD',
                    ],
                    [
                        'name' => 'West Sussex',
                        'code' => 'SXW',
                    ],
                    [
                        'name' => 'West Yorkshire',
                        'code' => 'WYK',
                    ],
                    [
                        'name' => 'Wiltshire',
                        'code' => 'WIL',
                    ],
                    [
                        'name' => 'Worcestershire',
                        'code' => 'WOR',
                    ],
                ]
            ],
            [
                'name' => 'Wales',
                'code' => 'WAL',
                'counties' => [
                    [
                        'name' => 'Clwyd',
                        'code' => 'CWD',
                    ],
                    [
                        'name' => 'Dyfed',
                        'code' => 'DFD',
                    ],
                    [
                        'name' => 'Gwent',
                        'code' => 'GNT',
                    ],
                    [
                        'name' => 'Gwynedd',
                        'code' => 'GWN',
                    ],
                    [
                        'name' => 'Mid Glamorgan',
                        'code' => 'MGM',
                    ],
                    [
                        'name' => 'Powys',
                        'code' => 'POW',
                    ],
                    [
                        'name' => 'South Glamorgan',
                        'code' => 'SGM',
                    ],
                    [
                        'name' => 'West Glamorgan',
                        'code' => 'WGM',
                    ],
                ]
            ],
            [
                'name' => 'Scotland',
                'code' => 'SCO',
                'counties' => [
                    [
                        'name' => 'Aberdeenshire',
                        'code' => 'ABD',
                    ],
                    [
                        'name' => 'Angus',
                        'code' => 'ANS',
                    ],
                    [
                        'name' => 'Argyll',
                        'code' => 'ARL',
                    ],
                    [
                        'name' => 'Ayrshire',
                        'code' => 'AYR',
                    ],
                    [
                        'name' => 'Banffshire',
                        'code' => 'BAN',
                    ],
                    [
                        'name' => 'Berwickshire',
                        'code' => 'BEW',
                    ],
                    [
                        'name' => 'Bute',
                        'code' => 'BUT',
                    ],
                    [
                        'name' => 'Caithness',
                        'code' => 'CAI',
                    ],
                    [
                        'name' => 'Clackmannanshire',
                        'code' => 'CLK',
                    ],
                    [
                        'name' => 'Dumfriesshire',
                        'code' => 'DGY',
                    ],
                    [
                        'name' => 'Dunbartonshire',
                        'code' => 'DNB',
                    ],
                    [
                        'name' => 'East Lothian',
                        'code' => 'ELN',
                    ],
                    [
                        'name' => 'Fife',
                        'code' => 'FIF',
                    ],
                    [
                        'name' => 'Inverness-shire',
                        'code' => 'INV',
                    ],
                    [
                        'name' => 'Kincardineshire',
                        'code' => 'KCD',
                    ],
                    [
                        'name' => 'Kinross-shire',
                        'code' => 'KRS',
                    ],
                    [
                        'name' => 'Kirkcudbrightshire',
                        'code' => 'KKD',
                    ],
                    [
                        'name' => 'Lanarkshire',
                        'code' => 'LKS',
                    ],
                    [
                        'name' => 'Midlothian',
                        'code' => 'MLN',
                    ],
                    [
                        'name' => 'Moray',
                        'code' => 'MOR',
                    ],
                    [
                        'name' => 'Nairnshire',
                        'code' => 'NAI',
                    ],
                    [
                        'name' => 'Orkney',
                        'code' => 'OKI',
                    ],
                    [
                        'name' => 'Peeblesshire',
                        'code' => 'PEE',
                    ],
                    [
                        'name' => 'Perthshire',
                        'code' => 'PER',
                    ],
                    [
                        'name' => 'Renfrewshire',
                        'code' => 'RFW',
                    ],
                    [
                        'name' => 'Ross-shire',
                        'code' => 'ROC',
                    ],
                    [
                        'name' => 'Roxburghshire',
                        'code' => 'ROX',
                    ],
                    [
                        'name' => 'Selkirkshire',
                        'code' => 'SEL',
                    ],
                    [
                        'name' => 'Shetland',
                        'code' => 'SHI',
                    ],
                    [
                        'name' => 'Stirlingshire',
                        'code' => 'STI',
                    ],
                    [
                        'name' => 'Sutherland',
                        'code' => 'SUT',
                    ],
                    [
                        'name' => 'West Lothian',
                        'code' => 'WLN',
                    ],
                    [
                        'name' => 'Wigtownshire',
                        'code' => 'WIG',
                    ],
                ]
            ],
            [
                'name' => 'Northern Ireland',
                'code' => 'NIR',
                'counties' => [
                    [
                        'name' => 'Antrim',
                        'code' => 'ANT',
                    ],
                    [
                        'name' => 'Armagh',
                        'code' => 'ARM',
                    ],
                    [
                        'name' => 'Down',
                        'code' => 'DOW',
                    ],
                    [
                        'name' => 'Fermanagh',
                        'code' => 'FER',
                    ],
                    [
                        'name' => 'Londonderry',
                        'code' => 'LDY',
                    ],
                    [
                        'name' => 'Tyrone',
                        'code' => 'TYR',
                    ]
                ]
            ]
        ];

        foreach ($countries as $countryData) {
            $country = Country::create([
                'name' => $countryData['name'],
                'code' => $countryData['code'],
            ]);

            foreach ($countryData['counties'] as $county) {
                County::create([
                    'name' => $county['name'],
                    'code' => $county['code'],
                    'country_id' => $country->id,
                ]);
            }
        }
    }
}
