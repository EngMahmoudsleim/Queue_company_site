<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'current_password' => ['required', 'string', function ($attribute, $value, $fail) {
                if (! Hash::check($value, $this->user()?->password)) {
                    $fail(__('messages.admin.current_password_invalid'));
                }
            }],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
