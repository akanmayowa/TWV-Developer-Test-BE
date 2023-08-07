<?php

namespace App\Http\Requests;

use App\Models\Computer;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ComputerStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'employee' => 'required|exists:employees,id',
            'make' => 'required|string',
            'model' => 'required|string',
            'serial_number' => 'required|string',
            'purchased' => 'required|string',
            'condition' => 'required|string',
            'cost_at_purchase' => 'required|integer',
            'os' =>  ['required', 'string', Rule::in([Computer::Windows, Computer::MacOS])]
        ];
    }
}
