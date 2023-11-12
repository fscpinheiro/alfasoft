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

    public function rules(): array
    {
        Log::info('ContactRequest into');
        $contactId = $this->route('contact') ? $this->route('contact')->id : null;
        Log::info("ID: ".$contactId);

        return [
            'name' => 'required|string|min:5',
            'contact' => 'required|digits:9|unique:contacts,contact,' . $contactId,
            'email' => 'required|email|unique:contacts,email,' . $contactId,
        ];
    }
}
