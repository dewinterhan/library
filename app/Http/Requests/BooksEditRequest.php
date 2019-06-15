<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BooksEditRequest extends FormRequest
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
            'title'=>'required|string',
            'isbn'=>'required|string|min:13|max:13',
            'copies'=>'required|integer',
            'release_year'=>'required',
            'description'=>'required|max:600',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'The name of the book is required',
            'isbn.required' => 'The ISBN of the book is required',
            'isbn.min' => 'The ISBN has to be a 13 digit number',
            'isbn.max' => 'The ISBN has to be a 13 digit number',
            'copies.required' => 'The amount of copies of this book is required',
            'release_year.required' => 'The release year of this book is required',
            'description.required' => 'A short description of the book is required (this is usually found on the back of the book).',
            'description.max' => 'The short description of the book can only be 600 characters long',

        ];
    }
}
