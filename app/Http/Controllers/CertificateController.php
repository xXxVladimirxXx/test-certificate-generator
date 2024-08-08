<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Services\CertificateService;
use App\Requests\CertificateRequest;
use Carbon\Carbon;

class CertificateController extends Controller
{
    protected CertificateService $certificateService;

    public function __construct(CertificateService $certificateService)
    {
        $this->certificateService = $certificateService;
    }

    public function store(CertificateRequest $request)
    {
        $certificateDTO = $request->getDTO();

        $certificate = Certificate::create([
            'number' => $certificateDTO->number,
            'course_name' => $certificateDTO->course_name,
            'student_name' => $certificateDTO->student_name,
            'completion_date' => Carbon::parse($certificateDTO->completion_date),
        ]);

        $certificate = $this->certificateService->generateQrCode($certificate);

        return $this->certificateService->generatePdf($certificate);
    }

    public function show(Certificate $certificate)
    {
        return view('certificate.view', compact('certificate'));
    }
}
