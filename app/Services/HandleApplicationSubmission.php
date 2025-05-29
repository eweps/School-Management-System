<?php

namespace App\Services;

use App\Models\Application;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use App\Mail\ApplicationSubmittedMail;

class HandleApplicationSubmission
{
    public function process(Application $application)
    {
        Log::info('[Service] Processing application ID: ' . $application->id);

        $fileName = $this->generatePdf($application);

        if (!$fileName) {
            Log::error('[Service] PDF generation failed for application ID: ' . $application->id);
            return;
        }

        Mail::to($application->email)->send(new ApplicationSubmittedMail($application, $fileName));
        Log::info('[Service] Mail sent to ' . $application->email);
    }

    private function generatePdf(Application $application): string|bool
    {
        try {

            $pdf = Pdf::loadView('pdf.application', ['application' => $application, 'timezone' => $application->timezone]);
            $fileName = strtoupper(str_replace(' ', '_', $application->name) . "_" . Str::random() . time()) . ".pdf";

            Storage::disk('local')->put($fileName, $pdf->output());

            if (Storage::disk('local')->exists($fileName)) {
                return $fileName;
            }

            return false;

        } catch (\Exception $e) {
            Log::error('[Service] PDF Exception: ' . $e->getMessage());
            return false;
        }
    }
}

