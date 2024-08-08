<?php

namespace App\DTOs;

class CertificateDTO
{
    public function __construct(
        public string $number,
        public string $course_name,
        public string $student_name,
        public string $completion_date
    ) {}
}
