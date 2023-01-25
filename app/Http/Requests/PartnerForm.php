<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PartnerForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (Auth::user() && Auth::user()->roles->type=="admin");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'partner_name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'partner_website' => ['required', 'string'],
            'logo' => ['required', 'file']
        ];
    }
}
