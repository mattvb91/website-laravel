<?php

namespace App\Http\Requests;


use Illuminate\Support\Facades\Auth;

class PageRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::getUser();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:255',
            'body' => 'required|min:50',
            'type' => 'required'
        ];
    }
}
