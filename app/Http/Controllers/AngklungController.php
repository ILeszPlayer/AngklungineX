<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AngklungController extends Controller
{
    public function play($note)
    {
        // Contoh kirim ke Arduino lewat serial (butuh PHP serial library)
        // Misal: COM3 di Windows, /dev/ttyUSB0 di Linux
        $port = "COM3"; // sesuaikan dengan Arduino-mu
        $baud = 9600;

        // Buka koneksi serial
        $fp = fopen($port, "w+");
        if (!$fp) {
            return response()->json(['status' => 'error', 'message' => 'Gagal buka port']);
        }

        // Kirimkan note ke Arduino (misal: "DO\n")
        fwrite($fp, strtoupper($note) . "\n");

        fclose($fp);

        return response()->json(['status' => 'success', 'note' => $note]);
    }
}
