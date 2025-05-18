<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\Application;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.admin.applications.index', [
            'applications' => Application::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return view('dashboard.admin.applications.show', [
            'application' => Application::findOrFail($id)
        ]);
    }

    public function generatePdf(int $id)
    {
        $application = Application::findOrFail($id);

        $pdf = Pdf::loadView('pdf.application', ['application' => $application])->setPaper('a4', 'portrait');
        $fileName = strtoupper(str_replace(' ', '_', $application->name) . "_" . Str::random() . time()). ".pdf";
        return $pdf->download($fileName);
    }

    public function generateEmptyPdf()
    {
        $pdf = Pdf::loadView('pdf.application-empty');
        $fileName = strtoupper(Str::random() . time()). ".pdf";
        return $pdf->download($fileName);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
