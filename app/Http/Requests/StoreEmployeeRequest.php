<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nip' => 'required|string|unique:employees,nip',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone_number' => 'required|string|max:20',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'blood_type' => 'nullable|string|max:10',
            'religion' => 'required|string|max:50',
            'marital_status' => 'required|in:Belum Kawin,Kawin,Cerai',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'join_date' => 'required|date',
            'employment_status' => 'required|in:Tetap,Kontrak,Magang',
            'basic_salary' => 'required|numeric|min:0',
            'is_active' => 'boolean',
            'department_id' => 'required|exists:departments,id',
            'position_id' => 'required|exists:positions,id',
            'education_id' => 'required|exists:educations,id',
        ];
    }
}
