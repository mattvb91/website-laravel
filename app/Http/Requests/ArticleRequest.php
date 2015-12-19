<?php

namespace App\Http\Requests;


use Illuminate\Support\Facades\Auth;

class ArticleRequest extends Request
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
            'title' => 'required|min:5|max:255',
            'body'  => 'required|min:50',
        ];
    }
}
