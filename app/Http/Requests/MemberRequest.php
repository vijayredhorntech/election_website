<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'primary_mobile_number' => 'required|numeric|digits:10|unique:members,primary_mobile_number',
            'alternate_mobile_number' => 'required|numeric|digits:10|unique:members,alternate_mobile_number',
            'email' => 'required|email|unique:members,email',
            'referrer_code' => 'nullable',
            'postcode' => [
                'required',
                'regex:/^([A-Z]{1,2}[0-9][0-9A-Z]?) ?([0-9][A-Z]{2})$/i'
            ],
            'address' => 'required',
            'house_name_number' => 'required',
            'street' => 'required',
            'town_city' => 'required',
            'country' => 'required|exists:countries,code',
            'county' => 'required|exists:counties,code',
            'constituency' => 'required|exists:constituencies,name',
            'date_of_birth' => 'required|date|before:16 years ago',
            'gender' => 'required',
            'marital_status' => 'required',
            'qualification' => 'required',
            'profession' => 'required',
            'national_insurance_number' => 'nullable|unique:members,national_insurance_number',
        ];
    }
}
