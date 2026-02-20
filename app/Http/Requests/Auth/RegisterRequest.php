<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s\'\-]+$/'],

            // IUEA Registration Number: supports both formats:
            //   18/001/BIT-S       (old format: year/sequence/program-intake)
            //   20/UG/874/BIT-S    (new format: year/UG/sequence/program-intake)
            'registration_number' => [
                'required',
                'string',
                'max:30',
                'unique:users,registration_number',
                'regex:/^\d{2}(\/UG)?\/\d{3,5}\/[A-Z]{2,8}-[A-Z]$/i',
            ],

            // Accept any valid email — no institutional restriction
            // (students may use personal emails if no institutional email exists)
            'email' => [
                'required',
                'string',
                'email:rfc,dns',
                'max:255',
                'unique:users,email',
            ],

            'password' => ['required', 'confirmed', Rules\Password::min(8)->mixedCase()->numbers()],
        ];
    }

    public function messages(): array
    {
        return [
            'registration_number.regex' => 'Invalid registration number format. Valid examples: 18/001/BIT-S or 20/UG/874/BSCS-M',
            'registration_number.unique' => 'This registration number is already enrolled in the system.',
            'email.unique' => 'An account with this email already exists.',
            'email.email' => 'Please provide a valid email address.',
            'name.regex' => 'Name may only contain letters, spaces, apostrophes and hyphens.',
            'password.confirmed' => 'The two passwords do not match.',
        ];
    }
}
