<?php

namespace App\Http\Controllers\Admin; // <--- Perhatikan Namespace ini harus benar

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    // 1. TAMPILKAN LIST
    public function index()
    {
        // Urutkan: Pinned paling atas, lalu terbaru
        $certificates = Certificate::orderBy('is_pinned', 'desc')
                                   ->orderBy('issued_year', 'desc')
                                   ->get();

        return view('admin.certificates.index', compact('certificates'));
    }

    // 2. FORM TAMBAH
    public function create()
    {
        return view('admin.certificates.create');
    }

    // 3. PROSES SIMPAN
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required|file|mimes:jpg,png,jpeg,pdf|max:2048',
            'issued_year' => 'required',
        ]);

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $fileType = in_array($extension, ['pdf']) ? 'pdf' : 'image';

        // Simpan file ke storage/app/public/certificates
        $path = $file->storeAs('certificates', time() . '.' . $extension, 'public');

        Certificate::create([
            'title' => $request->title,
            'description' => $request->description,
            'file' => $path,
            'file_type' => $fileType,
            'issued_year' => $request->issued_year,
            'tags' => $request->tags,
            'is_pinned' => $request->has('is_pinned'),
        ]);

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate added!');
    }

    // 4. FORM EDIT
    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    // 5. PROSES UPDATE
    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'title' => 'required',
            'issued_year' => 'required',
        ]);

        $data = $request->except(['file']);

        // Jika ada file baru diupload
        if ($request->hasFile('file')) {
            // Hapus file lama
            if ($certificate->file) {
                Storage::disk('public')->delete($certificate->file);
            }

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $data['file_type'] = in_array($extension, ['pdf']) ? 'pdf' : 'image';
            $data['file'] = $file->storeAs('certificates', time() . '.' . $extension, 'public');
        }

        // Handle Checkbox
        $data['is_pinned'] = $request->has('is_pinned');

        $certificate->update($data);

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate updated!');
    }

    // 6. HAPUS
    public function destroy(Certificate $certificate)
    {
        if ($certificate->file) {
            Storage::disk('public')->delete($certificate->file);
        }
        $certificate->delete();

        return redirect()->back()->with('success', 'Deleted successfully');
    }
}
