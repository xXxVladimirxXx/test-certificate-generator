<!DOCTYPE html>
<html>
<head>
    <title>Certificate</title>
    <style>
        /* Добавь стили для PDF */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .certificate {
            margin-top: 50px;
        }
    </style>
</head>
<body>
<div class="certificate">
    <h1>Certificate of Completion</h1>
    <p><strong>Number:</strong> {{ $certificate->number }}</p>
    <p><strong>Course Name:</strong> {{ $certificate->course_name }}</p>
    <p><strong>Student Name:</strong> {{ $certificate->student_name }}</p>
    <p><strong>Completion Date:</strong> {{ \Carbon\Carbon::parse($certificate->completion_date)->format('d-m-Y') }}</p>
    <p>
        <img src="{{ public_path('storage/' . $certificate->qr_code_path) }}" alt="QR Code" style="width:100px;">
    </p>
</div>
</body>
</html>
