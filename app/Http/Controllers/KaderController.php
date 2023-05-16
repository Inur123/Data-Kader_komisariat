<?php

namespace App\Http\Controllers;

use PDF;

use App\Models\Kader;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class KaderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Kader::where('nama', 'LIKE', '%' . $request->search . '%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        } else {
            $data = Kader::paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('datakader', compact('data'));
    }

    public function tambahkader()
    {
        return view('tambahdata');
    }

    public function insertdata(Request $request)
    {

        $data = Kader::create($request->all());
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $photoPath = $foto->store('foto', 'public');

            $data->foto = $photoPath;
            $data->save();
        }
        return redirect()->route('kader')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampilkandata($id)
    {
        $data = Kader::find($id);

        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = Kader::find($id);

        // Store the current photo path
        $currentPhotoPath = $data->foto;

        // Update the data with the new values
        $data->update($request->all());

        // Check if a new photo was uploaded
        if ($request->hasFile('foto')) {
            // Store the uploaded photo
            $foto = $request->file('foto');
            $photoPath = $foto->store('foto', 'public');

            // Update the photo path in the data
            $data->foto = $photoPath;
            $data->save();

            // Delete the previous photo
            if ($currentPhotoPath) {
                Storage::disk('public')->delete($currentPhotoPath);
            }
        } elseif (!$request->has('foto')) {
            // If the 'remove_photo' field is not present, keep the current photo path
            $data->foto = $currentPhotoPath;
            $data->save();
        }
        if (session('halaman_url')) {
            return Redirect(session('halaman_url'))->with('success', 'Data Berhasil Di Update');
        }

        return redirect()->route('kader')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $data = Kader::find($id);
        $data->delete();
        return redirect()->route('kader')->with('success', 'Data Berhasil Di Hapus');
    }

    public function exportpdf()
    {
        $data = Kader::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('datakader-pdf');
        return $pdf->download('data.pdf');
    }
}
