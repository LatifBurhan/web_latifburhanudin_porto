<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // 2. Simpan ke Database
        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        // 3. Kirim Notifikasi WA (Pake Fonnte)
        $this->sendWhatsappNotification($contact);

        // 4. Kembali ke halaman utama dengan pesan sukses
        return back()->with('success', 'Message sent successfully! I will reply shortly.');
    }

private function sendWhatsappNotification($contact)
{
    Http::withHeaders([
        'Authorization' => config('services.fonnte.token'),
    ])->asForm()->post('https://api.fonnte.com/send', [
        'target' => '6285786858184',
        'message' =>
            "*New Contact Message*\n\n" .
            "👤 {$contact->name}\n" .
            "📧 {$contact->email}\n\n" .
            "{$contact->message}",
    ]);
}




}


