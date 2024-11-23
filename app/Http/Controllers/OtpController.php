<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OtpController extends Controller
{

    public function requestOTP(Request $request)
    {
        // Validasi nomor telepon
        $validated = $request->validate([
            'nomor' => 'required|regex:/^\d{10,15}$/', // Validasi nomor WhatsApp
        ]);

        // Mengirimkan request ke backend API
        $response = Http::post('http://127.0.0.1:8000/api/otp/request', [
            'nomor' => $request->nomor,
        ]);

        if ($response->successful()) {
            // Simpan nomor telepon di sesi untuk digunakan di view verify
            $nomor = $request->nomor;
            session(['nomor' => $nomor]);

            // Tampilkan halaman verifikasi jika request OTP berhasil
            return redirect()->route('otp.verify');
        } else {
            // Tampilkan error jika request gagal
            return back()->with('error', 'Gagal mengirim OTP. Silakan coba lagi.');
        }
    }

    public function otpVerify()
    {
        // Ambil nomor telepon dari sesi
        $nomor = session('nomor', null);
        // dd($nomor);

        // Pastikan nomor tersedia
        // if (!$nomor) {
        //     return redirect()->route('otp.request')->with('error', 'Nomor tidak ditemukan. Silakan ulangi proses.');
        // }

        // Tampilkan halaman verifikasi dengan nomor telepon
        return view('veryfy', compact('nomor')); // Pastikan view ini ada
    }
 
    public function postVerify(Request $request)
    {
        // Validasi input OTP
        $request->validate([
            'nomor' => 'required|regex:/^\d{10,15}$/', // Validasi nomor telepon
            'otp' => 'required|digits:6', // Validasi OTP harus 6 digit
        ]);

        // Kirim data ke backend API untuk verifikasi OTP
        $response = Http::post('http://127.0.0.1:8000/api/otp/verify', [
            'nomor' => $request->nomor,
            'otp' => $request->otp,
        ]);

        if ($response->successful() && $response->json('message') === 'OTP verified successfully') {
            // Jika verifikasi berhasil, arahkan ke halaman login
            return redirect()->route('login')->with('success', 'Verifikasi berhasil! Silakan login.');
        } else {
            // Jika verifikasi gagal, tetap di halaman ini dan tampilkan pesan error
            return back()->with('error', 'Kode OTP salah atau tidak valid. Silakan coba lagi.');
        }
    }




    public function otpVerify1()
    {

        $nomor = session('nomor', null);
        return view('veryfy', compact('nomor')); // Pastikan view ini ada
    }

    public function requestOTP1(Request $request)
    {
        // Validasi nomor telepon
        $validated = $request->validate([
            'nomor' => 'required|regex:/^\d{10,15}$/', // Validasi nomor WhatsApp
        ]);

        // Mengirimkan request ke backend API
        $response = Http::post('http://127.0.0.1:8000/api/otp/request', [
            'nomor' => $request->nomor,
        ]);

        if ($response->successful()) {
            $nomor = $request->nomor;
            session(['nomor' => $nomor]);
           

            // Tampilkan halaman verifikasi jika request OTP berhasil
            return redirect()->route('otp.verify'); // Ganti dengan nama rute untuk verifikasi
        } else {
            // Tampilkan error jika request gagal
            return back()->with('error', 'Gagal mengirim OTP. Silakan coba lagi.');
        }
    }
}

 