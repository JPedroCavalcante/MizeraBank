<?php

namespace App\Http\Requests\Holder;

use Illuminate\Foundation\Http\FormRequest;

class StoreHolderRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'identifier' => ['required', 'string', 'min:11', 'unique:holders'],
            'birth_date' => ['required', 'date'],
            'phone' => ['required', 'string'],
            'agency_id' => ['required', 'string', 'exists:agency,id']
        ];
    }

    public function messages()
    {
        return [
          'identifier.unique' => 'Esse documento já está cadastrado',
        ];
    }
}
