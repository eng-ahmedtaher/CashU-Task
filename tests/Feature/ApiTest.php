<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_hotels()
    {
        $data = [
            'from_date' => '2009/12/01',
            'to_date' => '2009/12/15',
            'city' => 'CA',
            'adults_number' => 2,
        ];

        $response = $this->post('/api/v1/hotels/getAll', $data);

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_hotels_via_provider()
    {
        $data = [
            'provider_name' => 'BestHotelAPI',
            'from_date' => '2009/12/01',
            'to_date' => '2009/12/15',
            'city' => 'CA',
            'adults_number' => 2,
        ];

        $response = $this->post('/api/v1/hotels/provider', $data);

        $response->assertStatus(200);
    }
}
