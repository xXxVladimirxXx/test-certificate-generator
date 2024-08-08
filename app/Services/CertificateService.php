<?php

namespace App\Services;

use App\Models\Certificate;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;

class CertificateService
{
    public function generateQrCode(Certificate $certificate): Certificate
    {
        $qrCode = QrCode::format('png')->size(200)->generate(url('/certificates/' . $certificate->id));
        $path = 'qrcodes/' . $certificate->id . '.png';

        Storage::disk('public')->put($path, $qrCode);

        $certificate->qr_code_path = $path;
        $certificate->save();

        return $certificate;
    }

    public function generatePdf(Certificate $certificate)
    {
        $pdf = PDF::loadView('certificate.pdf', compact('certificate'));
        return $pdf->download('certificate_' . $certificate->id . '.pdf');
    }
}
