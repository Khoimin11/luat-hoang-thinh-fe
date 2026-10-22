<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConsultationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'service' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute là bắt buộc.',
            'string' => ':attribute phải là chuỗi ký tự.',
            'email.email' => 'Email không đúng định dạng.',
            'min' => ':attribute phải có ít nhất :min ký tự.',
            'max' => ':attribute không được vượt quá :max ký tự.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Họ và tên',
            'email' => 'Email',
            'service' => 'Dịch vụ cần tư vấn',
            'message' => 'Lời nhắn',
        ];
    }
}
