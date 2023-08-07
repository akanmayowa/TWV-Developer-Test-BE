<?php

namespace Database\Seeders;

use App\Models\Computer;
use App\Models\Employee;
use App\Models\EmployeeProfile;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory([
            'email' => 'admin@example.com',
        ])->create();

        $employees = Employee::factory(10)->create();

        foreach ($employees as $employee) {
            EmployeeProfile::factory([
                'employee_id' => $employee->id,
            ])->create();
            Computer::factory([
                'employee_id' => $employee->id,
            ])->create();
        }

        // Create some spare computers
        Computer::factory([
            'employee_id' => null,
        ])->create();
        Computer::factory([
            'employee_id' => null,
        ])->create();
        Computer::factory([
            'employee_id' => null,
        ])->create();
    }
}
