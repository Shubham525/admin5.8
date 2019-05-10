<?php

namespace App\plugin\query\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateQueryRequest extends FormRequest
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
            'name' => ['min:2','max:100'],
            'email' => ['min:2','email','max:100'],
            'subject' => ['min:2','max:200'],
            'message' => ['min:5','max:5000']
        ];
    }
}
