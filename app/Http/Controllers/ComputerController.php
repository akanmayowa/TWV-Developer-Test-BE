<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Employee;
use Illuminate\View\View;
use App\Http\Requests\ComputerStoreRequest;
use App\Models\Asset;
use Carbon\Carbon;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $computers = Computer::all();

        return view('computers.index', [
            'computers' => $computers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $employees = Employee::all();
        $assets = Asset::all()->pluck('id');

        return view('computers.create', [
            'employees' => $employees,
            'assets' => $assets,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return View
     */
    public function show(Computer $computer)
    {
        return view('computers.show', [
            'computer' => $computer,
        ]);
    }

    /**
     * Store a newly created resource (computer) in storage.
     *
     * @param  \Illuminate\Http\Request  $computerStoreRequest
     * @return \Illuminate\Http\Response
     */

    public function store(ComputerStoreRequest $computerStoreRequest)
    {
        $asset = Asset::create();
        $asset->computer()->create($computerStoreRequest->validated());
        return redirect()->route('computers.index')->with('success', 'Computer Created Successfully');
    }


    /**
    * Remove the specified resource (computer selected) from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id)
    {
        $computer = Computer::findOrFail($id);
        $computer->delete();
        return redirect()->route('computers.index')->with('success', 'Computer Successfully Deleted');
    }


       /**
        * Remove the specified resource (computer selected) from storage.
        *
        * @param  int  $resource id
        * @return Response
        */
    public static function computerLifeSpanStatus(int $id){
        // Retrieve a specific computer record using the provided ID
        $computer  = Computer::findOrfail($id);

        // Parse the purchase date of the computer using Carbon library
        $purchaseDate = Carbon::parse($computer->purchased);

        // Get the current date using Carbon library
        $currentDate = Carbon::now();

        // Calculate the difference in years between the purchase date and current date
        $yearDifference = $currentDate->diffInYears($purchaseDate);

        // Thresholds for operating systems
        $windowsAlertThreshold = 4;
        $macOSAlertThreshold = 6;

        // Retrieve the operating system of the computer
        $operatingSystem = $computer->os;       // Initialize a variable to store the alert message
        $message = null;

        // Check if the operating system is Windows and if it's approaching its maximum lifespan and set the alert message for Windows computers
        if ($operatingSystem === Computer::Windows && $yearDifference >= $windowsAlertThreshold){
            $message = "Alert: Your Windows computer is approaching its maximum lifespan. Consider replacing it.";
            return $message;
        }
        // Check if the operating system is macOS and if it's approaching its maximum lifespan and Set the alert message for MacOS computers
        elseif ($operatingSystem === Computer::MacOS && $yearDifference >= $macOSAlertThreshold){
            $message = "Alert: Your MacOS computer is approaching its maximum lifespan. Consider replacing it.";
            return $message;
        }
        else {
            // If the computer is not approaching its maximum lifespan, return null
            return $message;
        }
    }
}
