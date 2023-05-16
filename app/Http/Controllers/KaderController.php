<?php

namespace App\Http\Controllers;

use PDF;

use App\Models\Kader;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


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
            $request->file('foto')->move('fotokader/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
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
        $data->update($request->all());
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
