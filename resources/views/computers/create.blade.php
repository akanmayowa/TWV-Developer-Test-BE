<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }} | Create
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form class="space-y-10" action="/computers" method="POST">
                @csrf
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <div class="space-y-8 divide-y divide-gray-200">
                            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                                <div>
                                    <div>
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                                            Computer Details
                                        </h3>
                                    </div>
                                    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">

                                        @include('partials.form.input', [
                                            'label' => 'Make',
                                            'name' => 'make',
                                        ])
                                        @include('partials.form.input', [
                                            'label' => 'Model',
                                            'name' => 'model',
                                        ])
                                        @include('partials.form.input', [
                                            'label' => 'Serial Number',
                                            'name' => 'serial_number',
                                        ])
                                        @include('partials.form.input', [
                                            'label' => 'Purchased',
                                            'name' => 'purchased',
                                            'type' => 'datetime-local',
                                            'min' => '1990-01-01',
                                      ])
                                        @include('partials.form.input', [
                                            'label' => 'Cost At Purchase (ex VAT)',
                                            'name' => 'cost_at_purchase',
                                        ])

                                        @include('partials.form.select', [
                                            'label' => 'Operating System',
                                            'name' => 'os',
                                            'options' => [
                                                'Windows' => 'Windows',
                                                'MacOS' => 'MacOS',
                                            ],
                                        ])

                                        @include('partials.form.input', [
                                            'label' => 'Condition',
                                            'name' => 'condition',
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
                                            Employee Details
                                        </h3>
                                        {{-- <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Amet, ratione!
                                        </p> --}}
                                    </div>
                                    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                        @include('partials.form.select', [
                                            'label' => 'Assigned To',
                                            'name' => 'employee',
                                            'optionsFrom' => $employees,
                                        ])
                                        @include('partials.form.select', [
                                            'label' => 'Primary Working Location',
                                            'name' => 'location',
                                            'options' => [
                                                'office' => 'Office',
                                                'home' => 'Home',
                                            ],
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
