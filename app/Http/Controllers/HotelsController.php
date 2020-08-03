<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Api;

use Validator;

class HotelsController extends Controller
{
	use Api;

    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'from_date' => 'required|date_format:Y/m/d',
            'to_date' => 'required|date_format:Y/m/d',
            'city' => 'required|string|min:2|max:3',
            'adults_number' => 'required|integer|min:1',

        ]);

        if($validator->fails()) {

            return $this->getData(null, false, 404, $validator->errors()->messages());

        } else {
            
            $data = [

            	"BestHotels" => [

            		[
            			"hotelName" => "Hotel 1",
            			"fare" => "65 USD",
            			"amenities" => [
            				"Personal care", "Coffee Kit", "Bathrobes and slippers", "Free breakfast"
            			],

            		],

            		[
            			"hotelName" => "Hotel 2",
            			"fare" => "68 USD",
            			"amenities" => [
            				"Personal care", "Coffee Kit", "Bathrobes and slippers", "Free breakfast"
            			],

            		],

            	],
            	"TopHotels" => [

            		[
            			"hotelName" => "Hotel 3",
            			"fare" => "70 USD",
            			"amenities" => [
            				"Personal care", "Coffee Kit", "Bathrobes and slippers", "Free breakfast"
            			],

            		],

            		[
            			"hotelName" => "Hotel 4",
            			"fare" => "72 USD",
            			"amenities" => [
            				"Personal care", "Coffee Kit", "Bathrobes and slippers", "Free breakfast"
            			],

            		],
            	]

            ];

            return $this->getData($data, true, 200, 'Success Get All Hotels');

        }
    }

    public function providers(Request $request)
    {
    	
    	$validator = Validator::make($request->all(), [

    		'provider_name' => 'required|string',
            'from_date' => 'required|date_format:Y/m/d',
            'to_date' => 'required|date_format:Y/m/d',
            'city' => 'required|string|min:2|max:3',
            'adults_number' => 'required|integer|min:1',

        ]);

        if($validator->fails()) {

            return $this->getData(null, false, 404, $validator->errors()->messages());

        } else { 

        	if ($request->provider_name === "BestHotelAPI") {
        		
        		$data = [

        			[
            			"hotelName" => "Hotel 1",
            			"hotelRate" => 4.5,
            			"hotelFare" => 72.56,
            			"roomAmenities" => "Personal care, Coffee Kit, Bathrobes and slippers, Free breakfast"

            		],

            		[
            			"hotelName" => "Hotel 2",
            			"hotelRate" => 4.9,
            			"hotelFare" => 78.56,
            			"roomAmenities" => "Personal care, Coffee Kit, Bathrobes and slippers, Free breakfast"

            		],

            	];

            	return $this->getData($data, true, 200, 'Success Get All Hotels');

        	} else if ($request->provider_name === "TopHotelsAPI") {
        		
        		$data = [

        			[
            			"hotelName" => "Hotel 1",
            			"hotelRate" => "*****",
            			"price" => 72.56,
            			"discount" => "10%",
            			"amenities" => ["Personal care", "Coffee Kit", "Bathrobes and slippers", "Free breakfast"]

            		],

            		[
            			"hotelName" => "Hotel 2",
            			"hotelRate" => "****",
            			"price" => 78.56,
            			"discount" => "0%",
            			"amenities" => ["Personal care", "Coffee Kit", "Bathrobes and slippers", "Free breakfast"]

            		],

            	];

            	return $this->getData($data, true, 200, 'Success Get All Hotels');

        	} else {

        		return $this->getData(null, false, 404, "Sorry Undefined Provider Name");

        	}

        }

    }
}
