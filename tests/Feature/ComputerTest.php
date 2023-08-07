<?php

namespace Tests\Feature;

use App\Models\Asset;
use Carbon\Carbon;
use Tests\TestCase;
use App\Models\Computer;
use App\Models\Employee;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ComputerTest extends TestCase
{

    /**
     * A basic feature test to store a computer resource in the database.
     *
     */
    public function a_computer_can_be_created()
    {

         // Send a POST request to the store method
         $asset = Asset::create();
         $response = $this->post(route('computers.store'), [
            'employee_id' => Employee::first()->id,
            'make' => 'Tesco Laptop',
            'model' => 'London123',
            'serial_number' => '',
            'purchased' => Carbon::now(),
            'condition' => 'Very Good Condition',
            'cost_at_purchase' => 20000,
            'os' =>  Computer::MacOS,
            'asset_id' => $asset->computer()
        ]);

         // Assert that the response redirects to the index route
         $response->assertRedirect(route('computers.index'));

         // Assert that the computer and its asset were created in the database
         $this->assertDatabaseHas('assets', ['id' => 19]); // Assuming asset ID starts from 1
    }



    /**
     * A basic feature test to destroy or delete a specified computer resource in the database.
     *
     */
    public function a_computer_can_be_deleted()
    {
           // fetch a computer instance in the database
            $computer = Computer::findOrFail(18);

            // Act: Send a DELETE request to the destroy endpoint
            $response = $this->delete(route('computers.destroy', $computer->id));

            // Assert: Check if the computer was deleted and response is correct
            $response->assertRedirect(route('computers.index'));
            $this->assertDatabaseMissing('computers', ['id' => $computer->id]);
            $response->assertSessionHas('success', 'Computer Successfully Deleted');
    }




}
