<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListsRequest extends FormRequest
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
            'title'=>'required|string|min:3|max:50',
            'section_id'=>'required|integer|exists:sections,id',
            'description'=>'nullable|text',
            'photo'=>'nullable|image|mimes:jpg,png,jpeg,gif,svg',

                    ];
    }
        public function messages(){
        return [
            'title.required'=>' title is required.',
            'title.string'  =>' title should consist of valid characters.',
            'title.min'     =>' title can not have less than 3 characters.',
            'title.max'     =>'title name can not have more than 50 characters.',
            'description.text'  =>'provide valid text.',
            
            'photo.image'  =>'provide valid image.',
            'photo.mimes'   =>'provide valid photo(i.e,of extensions : jpg,png,jpeg,gif,svg)',
            'section_id.required' =>' question_type is required.',
            'section_id.integer' =>'provide valid section .',
            'section_id.exists' =>'provide valid section .',

                   ];
    }
}
