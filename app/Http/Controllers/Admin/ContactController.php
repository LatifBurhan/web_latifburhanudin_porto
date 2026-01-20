<?php

namespace App\Http\Controllers\Admin; // Namespace tetap di Admin

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // =========================================================
    //  TUGAS 1: Menangani Form Tamu (Frontend)
    // =========================================================
    public function store(Request $request)
    {
        // 1. Validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // 2. Simpan
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        // 3. Balik lagi
        return back()->with('success', 'Message sent successfully! I will reply shortly.');
    }

    // =========================================================
    //  TUGAS 2: Menangani Dashboard Admin (Backend)
    // =========================================================
    public function index()
    {
        // Menampilkan list pesan di dashboard
        $contacts = Contact::latest()->get();
        return view('admin.messages.index', compact('contacts'));
    }

    public function destroy($id)
    {
        // Menghapus pesan
        Contact::findOrFail($id)->delete();
        return back()->with('success', 'Message deleted successfully!');
    }
}
