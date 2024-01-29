<?php

namespace App\Http\Controllers;

use App\Models\AktivitasSenat;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AktivitasSenatController extends Controller
{
    public function index()
    {
        // Assuming you want to retrieve all AktivitasSenat records
        $aktivitasSenats = AktivitasSenat::all();

        return view('index', ['aktivitasSenats' => $aktivitasSenats]);
    }

    public function show($id)
    {
        $aktivitasSenat = AktivitasSenat::findOrFail($id);

        // Check if the 'gambar' column is not empty
        if ($aktivitasSenat->gambar) {
            // Get the file path
            $filePath = storage_path("app/public/{$aktivitasSenat->gambar}");

            // Check if the file exists
            if (file_exists($filePath)) {
                // Read the file contents
                $fileContents = file_get_contents($filePath);

                // Return a response with judul, isi_teks, and file contents
                return response()->json([
                    'judul' => $aktivitasSenat->judul,
                    'isi_teks' => $aktivitasSenat->isi_teks,
                    'file_contents' => base64_encode($fileContents), // Using base64 for binary data
                ]);
            } else {
                // File not found
                return response()->json(['error' => 'File not found'], 404);
            }
        } else {
            // 'gambar' column is empty
            return response()->json(['error' => 'No file associated with this record'], 404);
        }
    }
}
