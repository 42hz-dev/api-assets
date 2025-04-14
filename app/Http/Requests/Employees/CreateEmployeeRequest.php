<?php

namespace App\Http\Requests\Employees;

use App\Enum\Employee\EmployeeGender;
use App\Enum\Employee\EmployeeStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreateEmployeeRequest extends FormRequest
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
            'name' => 'required|string',
            'phone' => 'required|string|max:20|unique:employees,phone',
            'emergency_phone' => 'nullable|string|max:20',
            'email' => 'required|string|max:100|unique:employees,email',
            'postal_code' => 'nullable|string|max:10',
            'addressLine1' => 'nullable|string|max:50',
            'addressLine2' => 'nullable|string|max:50',
            'gender' => ['required', 'string', new Enum(EmployeeGender::class)],
            'is_status' => ['required', 'string', new Enum(EmployeeStatus::class)],
            'department_id' => 'required|exists:departments,id',
            'position_id' => 'required|exists:positions,id',
        ];
    }
}
