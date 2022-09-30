<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacultyRequest extends FormRequest
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
            'image' => 'required|mimes:jpg,jpeg,png',
            'title_ar' => 'required|max:255',
            'title_en' => 'required|max:255',
            'sub_title_ar'=>'required|max:255',
            'sub_title_en'=>'required|max:255',
            'location_ar' =>'required',
            'location_en' =>'required',
            'description_ar' =>'required',
            'description_en' =>'required',
            'phone_ar'=>'max:20',
            'phone_en'=>'max:20',
            'link'=>'max:50',
        ];
    }
    public function messages()
    {
        return [
            'required'=>'this field is required',
            'title_ar.max'=>'Title must be smaller than 255',
            'sub_title_ar.max'=>'Title must be smaller than 255',
            'phone_ar.max'=>'Phone must be smaller than 20',
            'title_en.max'=>'Title must be smaller than 255',
            'sub_title_en.max'=>'Title must be smaller than 255',
            'phone_en.max'=>'Phone must be smaller than 20',
            'link.max'=>'Phone must be smaller than 50',
        ];
    }
}
