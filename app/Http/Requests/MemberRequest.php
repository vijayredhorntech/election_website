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

    public function messages()
    {
        return [
            'title.required' => 'Please select your title',
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'primary_mobile_number.required' => 'Primary mobile number is required',
            'primary_mobile_number.numeric' => 'Mobile number must contain only numbers',
            'primary_mobile_number.digits' => 'Mobile number must be 10 digits',
            'primary_mobile_number.unique' => 'This mobile number is already registered',
            'alternate_mobile_number.required' => 'Alternate mobile number is required',
            'alternate_mobile_number.numeric' => 'Mobile number must contain only numbers',
            'alternate_mobile_number.digits' => 'Mobile number must be 10 digits',
            'alternate_mobile_number.unique' => 'This mobile number is already registered',
            'email.required' => 'Email address is required',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'This email is already registered',
            'postcode.required' => 'Postcode is required',
            'postcode.regex' => 'Please enter a valid UK postcode',
            'address.required' => 'Address is required',
            'house_name_number.required' => 'House name/number is required',
            'street.required' => 'Street name is required',
            'town_city.required' => 'Town/City is required',
            'country.required' => 'Country is required',
            'country.exists' => 'Please select a valid country',
            'county.required' => 'County is required',
            'county.exists' => 'Please select a valid county',
            'constituency.required' => 'Constituency is required',
            'constituency.exists' => 'Please select a valid constituency',
            'date_of_birth.required' => 'Date of birth is required',
            'date_of_birth.date' => 'Please enter a valid date',
            'date_of_birth.before' => 'You must be at least 16 years old to register',
            'gender.required' => 'Please select your gender',
            'marital_status.required' => 'Please select your marital status',
            'qualification.required' => 'Please select your qualification',
            'profession.required' => 'Please select your profession',
            'national_insurance_number.unique' => 'This National Insurance number is already registered',
        ];
    }
}
