<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => 'required|max:191',
            'email' => 'required|email|max:191|nullable',
            'address_ar' => 'required|max:191',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'soundcloud' => 'nullable',
            'intagram' => 'nullable',
            'youtube' => 'nullable',
            'word_ar'=>'required',
            'about_us'=>'required',
            'permalink' => 'required',
            'keywords' => 'required',
            'description' => 'required',
        ];
    }
}
