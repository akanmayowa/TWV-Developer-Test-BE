<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }} | {{ $employee->fullName() }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form class="space-y-10" action="{{ $employee->path() }}" method="POST">
                @method('PATCH')
                @csrf

                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <div class="space-y-8 divide-y divide-gray-200">
                            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                                <div>
                                    <div>
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                                            Contact Details
                                        </h3>
                                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Amet, ratione!
                                        </p>
                                    </div>
                                    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
    
                                        @include('partials.form.input', [
                                            'label' => 'First Name',
                                            'name' => 'first_name',
                                            'value' => $employee->first_name
                                        ])
                                        @include('partials.form.input', [
                                            'label' => 'Last Name',
                                            'name' => 'last_name',
                                            'value' => $employee->last_name
                                        ])
                                        @include('partials.form.input', [
                                            'label' => 'Email Address',
                                            'name' => 'email',
                                            'type' => 'email',
                                            'value' => $employee->email
                                        ])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <div class="space-y-8 divide-y divide-gray-200">
                            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                                <div>
                                    <div>
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                                            Employee Profile
                                        </h3>
                                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Amet, ratione!
                                        </p>
                                    </div>
                                    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
    
                                        @include('partials.form.input', [
                                            'label' => 'Job Title',
                                            'name' => 'role',
                                            'value' => $employee->profile->role,
                                        ])
                                        @include('partials.form.input', [
                                            'label' => 'Address',
                                            'name' => 'address',
                                            'value' => $employee->profile->address,
                                        ])
                                        @include('partials.form.input', [
                                            'label' => 'City',
                                            'name' => 'city',
                                            'value' => $employee->profile->city,
                                        ])
                                        @include('partials.form.input', [
                                            'label' => 'County/State',
                                            'name' => 'county',
                                            'value' => $employee->profile->county,
                                        ])
                                        @include('partials.form.input', [
                                            'label' => 'Postcode',
                                            'name' => 'postcode',
                                            'value' => $employee->profile->postcode,
                                        ])
                                        @include('partials.form.input', [
                                            'label' => 'Country',
                                            'name' => 'country',
                                            'value' => $employee->profile->country,
                                        ])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('partials.form.submit')
                
            </form>

        </div>
    </div>
</x-app-layout>
