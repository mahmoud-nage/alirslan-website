<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MediaRequest extends FormRequest
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
          'ar_title' => 'required|string|max:191|min:2',
          'source' => 'required',
          'type' => 'required|boolean',
          'keywords' => 'required|string|max:191|min:2',
          'description' => 'required|min:10',
      ];
    }
}
