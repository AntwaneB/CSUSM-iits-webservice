<?php

use Illuminate\Database\Seeder;
use App\Models\Parking;

class ParkingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parkings = [
			[
				'name' => 'B',
				'max_slots' => 300,
				'coordinates' => [
					['lat' => '33.127053', 'long' => '-117.163980'],
					['lat' => '33.127080', 'long' => '-117.163070'],
					['lat' => '33.127172', 'long' => '-117.162240'],
					['lat' => '33.126336', 'long' => '-117.162200'],
					['lat' => '33.126347', 'long' => '-117.163994']
				]
			],
	        [
				'name' => 'C',
				'max_slots' => 300,
				'coordinates' => [
					['lat' => '33.127192', 'long' => '-117.162021'],
					['lat' => '33.127427', 'long' => '-117.161074'],
					['lat' => '33.126826', 'long' => '-117.160822'],
					['lat' => '33.126315', 'long' => '-117.160334'],
					['lat' => '33.125656', 'long' => '-117.160895'],
					['lat' => '33.126356', 'long' => '-117.161651']
				]
			],
	        [
				'name' => 'F',
				'max_slots' => 800,
				'coordinates' => [
					['lat' => '33.125659', 'long' => '-117.158760'],
					['lat' => '33.124938', 'long' => '-117.157522'],
					['lat' => '33.126076', 'long' => '-117.155417'],
					['lat' => '33.126845', 'long' => '-117.155736'],
					['lat' => '33.127577', 'long' => '-117.156903'],
					['lat' => '33.127160', 'long' => '-117.157280'],
					['lat' => '33.127208', 'long' => '-117.157433']
				]
			],
        ];

        foreach ($parkings as $parkingData)
        {
        	$parking = new Parking();
        	$parking->name = $parkingData['name'];
        	$parking->max_slots = $parkingData['max_slots'];
        	$parking->save();

        	foreach ($parkingData['coordinates'] as $coordinate)
	        {
	        	$parking->coordinates()->create([
	        		'latitude' => $coordinate['lat'],
			        'longitude' => $coordinate['long'],
		        ]);
	        }
        }
    }
}
