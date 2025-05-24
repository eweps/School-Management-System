<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Exception;
use App\Models\Diploma;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ResourceDeleteService;
use Illuminate\Database\QueryException;
use App\Exceptions\CannotDeleteUsedResourceException;

class DiplomaController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.diplomas.index', [
            'diplomas' => Diploma::orderBy('id', 'DESC')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.diplomas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Diploma::create($validated);

        return back()->with(['status' => 'diploma-created']);
    }

    public function edit(int $id)
    {
        return view('dashboard.admin.diplomas.edit', [
            'diploma' => Diploma::findOrFail($id)
        ]);
    }

    public function update(Request $request , int $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $diploma = Diploma::findOrFail($id);
        $diploma->update($validated);
        return back()->with(['status' => 'diploma-updated']);
    }

    public function destroy(Request $request, ResourceDeleteService $deleteWorker)
    {
        $validated = $request->validate([
            'id' => 'required',
        ]);

        try {
            $diploma = Diploma::findOrFail($validated['id']);
            $deleteWorker->checkAndDeleteDiplomaInApplicationsTable($diploma);
            return back()->with(['status' => 'diploma-deleted']);
        } 
        catch (CannotDeleteUsedResourceException $e) {
                return back()->with('error', $e->getMessage());
        }
        catch (Exception $e) {
                return back()->with('error', $e->getMessage());
        }

    }   
}
