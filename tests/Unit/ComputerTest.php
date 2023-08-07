<?php

namespace Tests\Unit;

use Carbon\Carbon;
use App\Models\Asset;
use App\Models\Computer;
use App\Models\Employee;
use PHPUnit\Framework\TestCase;

class ComputerTest extends TestCase
{
    /**
     * Test if a windows Os computer is approaching its lifespan.
     */

     public function testWindowsComputerApproachingLifespan()
     {
        // Example purchase date 4 years ago
         $purchaseDate = Carbon::now()->subYears(4);
         $asset = Asset::create();


        // store a computer record in the database
         $computer = $asset->computer()->create([
            'purchased' => $purchaseDate,
            'os' => Computer::Windows,
            'employee' => Employee::first()->id,
            'make' => 'UST-123',
            'model' => 'core-I7',
            'serial_number' => 'TL-123',
            'condition' => 'working condition',
            'cost_at_purchase' => 2000,
         ]);

         // Call the computerLifeSpanStatus method to check the alert message
         $result = Computer::computerLifeSpanStatus($computer->id);

         // Assert that the correct alert message is returned
         $this->assertEquals("Alert: Your Windows computer is approaching its maximum lifespan. Consider replacing it.", $result);
     }


    /**
     * Test if a windows Os computer is approaching its lifespan.
     */
     public function testMacOSComputerApproachingLifespan()
     {
        // Example purchase date 5 years ago
         $purchaseDate = Carbon::now()->subYears(5);
         $asset = Asset::create();

         // store a computer record in the database
         $computer = $asset->computer()->create([
            'purchased' => $purchaseDate,
            'os' => Computer::Windows,
            'employee' => Employee::first()->id,
            'make' => 'MAC-123',
            'model' => 'core-M9',
            'serial_number' => 'MAC-0123',
            'condition' => 'working condition',
            'cost_at_purchase' => 2000,
         ]);
         // Call the computerLifeSpanStatus method to check the alert message
         $result = Computer::computerLifeSpanStatus($computer->id);

       // Assert that the correct alert message is returned
         $this->assertEquals("Alert: Your MacOS computer is approaching its maximum lifespan. Consider replacing it.", $result);
     }
}
