<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
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
            'title' => [
                'required',
                // equivalent to request()->movie
                // movie represents the movie id
                // The route is defined as '/movie/{movie}' or '/movie/1'
                Rule::unique('movies')->ignore($this->movie)
            ],
            'rating' => 'required',
            'awards' => 'required|integer',
            'release_date' => 'date|required',
        ];
    }
}
