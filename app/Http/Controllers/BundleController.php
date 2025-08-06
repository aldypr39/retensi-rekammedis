<?php

namespace App\Http\Controllers;

use App\Models\Bundle;           // ← penting
use Inertia\Inertia;             // ← untuk render halaman React

class BundleController extends Controller
{
    /**
     * Menampilkan daftar semua ikatan (bundle) – route GET /bundles
     */
    public function index()
    {
        // ambil bundle + hitung jumlah berkas (retentions) tiap bundle
        $bundles = Bundle::withCount('retentions')->paginate(20);

        return Inertia::render('Bundles/Index', [
            'bundles' => $bundles,
        ]);
    }

    /**
     * Menampilkan detail 1 bundle – route GET /bundles/{bundle}
     */
    public function show(Bundle $bundle)
    {
        // muat relasi retentions + tiap retention bawa relasi patient
        $bundle->load('retentions.patient');

        return Inertia::render('Bundles/Show', [
            'bundle' => $bundle,
        ]);
    }
}
