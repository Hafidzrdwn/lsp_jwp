<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
     */
    public function rules(): array
    {
        $employeeId = $this->route('employee') ? $this->route('employee')->id : null;

        return [
            'nik' => 'required|string|min:16|max:20|unique:employees,nik,' . $employeeId,
            'full_name' => 'required|string|min:3|max:100',
            'email' => 'required|email|max:100|unique:employees,email,' . $employeeId,
            'phone_number' => 'required|string|max:20',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'birth_place' => 'required|string|max:50',
            'birth_date' => 'required|date|before:today',
            'religion' => 'required|string|max:30|in:Islam,Kristen,Katolik,Hindu,Buddha,Khonghucu',
            'marital_status' => 'required|in:Belum Kawin,Kawin,Cerai',
            'address' => 'required|string|max:1000',
            'city' => 'required|string|max:50',
            'join_date' => 'required|date',
            'employment_status' => 'required|in:Tetap,Kontrak,Magang',
            'basic_salary' => 'required|numeric|min:0|max:9999999999999.99',
            'is_active' => 'nullable|boolean',
            'department_id' => 'required|exists:departments,id',
            'position_id' => 'required|exists:positions,id',
            'education_id' => 'required|exists:educations,id',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi!',
            'email' => 'Format email tidak valid!',
            'unique' => ':attribute sudah terdaftar di sistem!',
            'max' => ':attribute maksimal :max karakter!',
            'min' => ':attribute minimal :min karakter!',
            'date' => ':attribute harus berupa tanggal!',
            'before' => ':attribute tidak boleh tanggal di masa depan!',
            'in' => ':attribute tidak valid!',
            'exists' => ':attribute yang dipilih tidak valid!',
        ];
    }

    /**
     * Translate attribute names (Opsional tapi bikin pesan error makin cakep)
     */
    public function attributes(): array
    {
        return [
            'nik' => 'NIK',
            'full_name' => 'Nama Lengkap',
            'email' => 'Alamat Email',
            'phone_number' => 'Nomor HP',
            'gender' => 'Jenis Kelamin',
            'birth_place' => 'Tempat Lahir',
            'birth_date' => 'Tanggal Lahir',
            'religion' => 'Agama',
            'marital_status' => 'Status Pernikahan',
            'address' => 'Alamat Lengkap',
            'city' => 'Kota',
            'join_date' => 'Tanggal Bergabung',
            'employment_status' => 'Status Karyawan',
            'basic_salary' => 'Gaji Pokok',
            'department_id' => 'Departemen',
            'position_id' => 'Jabatan',
            'education_id' => 'Pendidikan',
        ];
    }
}
