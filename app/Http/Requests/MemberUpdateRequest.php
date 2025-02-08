<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberUpdateRequest extends FormRequest
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
            'title' => 'required|exists:titles,name',
            'first_name' => 'required',
            'last_name' => 'required',
            'referrer_code' => 'required',
            'postcode' => [
                'required',
                'regex:/^([A-Z]{1,2}[0-9][0-9A-Z]?) ?([0-9][A-Z]{2})$/i'
            ],
            'address' => 'required',
            'country' => 'required|exists:countries,code',
            'county' => 'required|exists:counties,code',
            'city' => 'required',
            'constituency' => 'required|exists:constituencies,name',
            'day' => 'required|integer|min:1|max:31',
            'month' => 'required|integer|min:1|max:12',
            'year' => 'required|integer|min:1900|max:' . now()->year,
            'gender' => 'required',
            'marital_status' => 'required',
            'qualification' => 'required',
            'profession' => 'required',
        ];
    }
}
