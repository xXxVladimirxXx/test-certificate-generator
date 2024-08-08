<?php

namespace App\Requests;

use App\Dtos\CertificateDTO;
use Illuminate\Foundation\Http\FormRequest;

class CertificateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'course_name' => 'required|string|max:255',
            'student_name' => 'required|string|max:255',
            'completion_date' => 'required|date',
        ];
    }

    public function getDTO()
    {
        return new CertificateDTO(
            $this->input('number'),
            $this->input('course_name'),
            $this->input('student_name'),
            $this->input('completion_date')
        );
    }
}
