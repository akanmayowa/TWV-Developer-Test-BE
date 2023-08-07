@props(['id'])
@php
$status =  App\Http\Controllers\ComputerController::computerLifeSpanStatus($id);
@endphp
@if($status)
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-yellow-50 shadow overflow-hidden sm:rounded-lg">
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-sm" role="alert">
              <div class="flex">
                 <div class="py-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                  </div>
                  <div class="px-4">
                    <h2 class="text-sm font-bold text-yellow-800">Attention needed</h2>
                    <p class="text-sm text-yellow-800">{{ $status }}</p>
                 </div>
               </div>
            </div>
        </div>
    </div>
 </div>
@endif


