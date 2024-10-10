<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemeSettingUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'field'=>['required',"in:layout,primary_color,color_scheme,sidebar_color,direction"],
            'layout'=>['nullable','string:100',"in:default,compact"],
            'primary_color'=>['nullable','in:theme-red,theme-yellow,theme-green,theme-blue,theme-purple,theme-pink'],
            'color_scheme'=>['nullable','in:dark'],
            'sidebar_color'=>['nullable','in:sidebar-dark'],
            'direction' => ['nullable','in:ltr,rtl']
        ];
    }
}
