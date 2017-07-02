<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewMovieRequest extends FormRequest
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
            'title' => 'required|unique:movies',
            'rating' => 'required',
            'awards' => 'required|integer',
            'release_date' => 'date|required',
        ];
    }
}
