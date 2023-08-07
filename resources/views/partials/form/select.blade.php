<div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">{{ $label }}</label>
    <select class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md mt-1 sm:mt-0 sm:col-span-2 max-w-lg" name="{{ $name }}" id="{{ $id ?? $name }}">
        @isset($optionsFrom)
            <option disabled selected>Please select an option</option>
            @foreach ($optionsFrom as $option)
                <option value="{{ $option->id }}">{{ $option->fullName() }}</option>
            @endforeach
        @else
            @foreach ($options as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        @endisset
    </select>
</div>

