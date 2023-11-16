<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array{
        
        $contactId = $this->route('contact') ? $this->route('contact')->id : null;
        return [
            'name' => 'required|string|min:5',
            'contact' => 'required|digits:9|unique:contacts,contact,' . $contactId,
            'email' => 'required|email|unique:contacts,email,' . $contactId,
        ];
    }

    public function messages(){
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser uma string.',
            'name.min' => 'O campo nome deve ter no mínimo 5 caracteres.',
            'contact.required' => 'O campo contato é obrigatório.',
            'contact.digits' => 'O campo contato deve ter exatamente 9 dígitos.',
            'contact.unique' => 'O contato já está em uso.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O campo email deve ser um endereço de email válido.',
            'email.unique' => 'O email já está em uso.',
        ];
    }
}
