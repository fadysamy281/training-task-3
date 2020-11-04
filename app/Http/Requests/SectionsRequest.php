<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionsRequest extends FormRequest
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
            'title'=>'required|string|min:7|max:150',
            'description'=>'nullable|text',

        ];
    }
    public function messages(){
        return [
            'title.required'=>' title is required.',
            'title.string'  =>' title should consist of valid characters.',
            'title.min'     =>' title can not have less than 7 characters.',
            'title.max'     =>' title can not have more than 150 characters.',
            'description.text'  =>'provide valid text.',
                   ];
    }    

}
