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
            'code' => 'required',
            'address' => 'required',
            'country' => 'required',
            'county' => 'required',
            'city' => 'required',
            'constituency' => 'required',
            'referral_code' => 'required',
        ];
    }
}
