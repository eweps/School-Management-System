<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\User;
use App\Models\Application;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Events\ApplicationApproved;
use App\Events\ApplicationRejected;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

        $pdf = Pdf::loadView('pdf.application', ['application' => $application, "timezone" => auth()->user()->timezone])->setPaper('a4', 'portrait');
        $fileName = strtoupper(str_replace(' ', '_', $application->name) . "_" . Str::random() . time()). ".pdf";
        return $pdf->download($fileName);
    }

    public function generateEmptyPdf()
    {
        $pdf = Pdf::loadView('pdf.application-empty', ["timezone" => auth()->user()->timezone]);
        $fileName = strtoupper(Str::random() . time()). ".pdf";
        return $pdf->download($fileName);
    }


    public function approve(Request $request)
    {
        $validated = $request->validate([
            'application' => 'required',
        ]);

        $application = Application::findOrFail($validated['application']);
    
        $application->update([
            'status' =>  'approved'
        ]);

        ApplicationApproved::dispatch($application, User::find(Auth::user()->id));
        return redirect()->back()->with('status', 'application-approved');
    }

    public function reject(Request $request)
    {
        $validated = $request->validate([
            'application' => 'required',
        ]);

        $application = Application::findOrFail($validated['application']);

        $application->update([
            'status' =>  'rejected'
        ]);
        
        ApplicationRejected::dispatch($application);
        return redirect()->back()->with('status', 'application-rejected');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
