<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mahasiswa;
use App\Models\employee;

class MasterController extends Controller
{
    public function mastermahasiswa()
    {

        // if (!session()->has('mahasiswa')) {
        //     session()->put('mahasiswa', array());
        // }

        // fetch data mahasiswa yang aktif dengan status true
        $data = Mahasiswa::all()->where('status', true);

        // $employee = employee::all();
        // $employee = employee::paginate(10);

        return view('mahasiswa.mahasiswa', compact('data'));
        // return view('mahasiswa.mahasiswa', compact('data', 'employee'));
    }

    public function store(Request $request)
    {

        session()->push('mahasiswa', array(
            'nama_mahasiswa' => $request->post('nama_mahasiswa'),
            'nim' => $request->post('nim')
        ));

        session()->flash('add', 'Data Berhasil ditambahkan');

        return redirect('mahasiswa');
    }

    // public function edit($index)
    // {
    //     $mahasiswa = session('mahasiswa');

    //     if (isset($mahasiswa[$index])) {
    //         $data = $mahasiswa[$index];
    //         return view('mahasiswa.edit', compact('data', 'index'));
    //     } else {
    //         echo "ERROR";
    //     }
    // }

    public function update(Request $request, $index)
    {
        $data = session('mahasiswa');

        $data[$index]['nama_mahasiswa'] = $request->input('nama_mahasiswa');
        $data[$index]['nim'] = $request->input('nim');

        session(['mahasiswa' => $data]);

        return redirect('mahasiswa')->with('success', 'Mahasiswa data updated successfully.');
    }

    public function hapus(Request $request)
    {
        $indexes = explode(',', $request->input('indexes'));
        $mahasiswa = session('mahasiswa');


        foreach ($indexes as $index) {
            unset($mahasiswa[$index]);
        }

        session(['mahasiswa' => $mahasiswa]);

        return redirect('mahasiswa')->with('success', 'Selected students deleted successfully.');
    }

    public function reset()
    {
        session()->forget('mahasiswa');

        session()->flash('hapus', 'Data Berhasil dihapus');
        return redirect('mahasiswa');
    }

    public function submitMahasiswa(Request $request){

        mahasiswa::create([
            'nama' => $request->nama_mahasiswa,
            'nim' => $request->nim,
        ]);

        return redirect('mahasiswa');

    }

    public function deleteMahasiswa($id){
        // fetch data dari database dengan id yang dipilih
        $data = mahasiswa::find($id);
        
        // mengset kolom status menjadi false
        $data->status = false;

        // save data
        $data->save();

        return redirect('mahasiswa');
    }

    public function edit($id){

        $data = mahasiswa::find($id);

        return view('mahasiswa.edit', compact('data'));
    }

    public function updateMahasiswa(Request $request, $id){
        
        $data = mahasiswa::find($id);

        $data->nama = $request->nama_mahasiswa;
        $data->nim = $request->nim;
        $data->no_wa = $request->no_wa;

        $data->save();

        return redirect('mahasiswa');

    }

}
