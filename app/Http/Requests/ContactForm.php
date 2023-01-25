<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactForm extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'comment' => 'required|string'
        ];
    }

    /**
     * Send custom error message
     *
     * @return array
     */

    public function messages(){
        return [
            'name.required' => 'veuillez entrer votre nom',
            'email.required' => 'veuillez entrer votre email',
            'subject.required' => 'un sujet est requis',
            'comment.required' => 'veuillez entrer une suggestion'
        ];
    }
}
