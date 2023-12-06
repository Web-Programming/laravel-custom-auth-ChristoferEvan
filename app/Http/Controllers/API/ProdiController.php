<?php

namespace App\Http\Controllers\API;

use App\Http\Contorller\API\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Prodi;
use Faker\Provider\Base;
use Illuminate\Http\Request;

class ProdiController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodis=Prodi::all();
        $this->sendResponse($prodis,"Data Prodi.");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //membuat validasi semua field wajib diisi
        $validasi = $request->validate([
            'nama' => 'required|min:5|max:20',
            'foto' => 'required|file|image|max:10000'
        ]);

        $ext = $request->foto->getClientOriginalExtension();
        $nama_file = 'foto-' . time() . '.' . $ext;

        //nama file baru : foto-123412.png

        $path = $request->foto->storeAs('public', $nama_file);

        //melakukan insert data
        $prodi = new Prodi();
        $prodi->nama = $validasi['nama'];
        $prodi->foto = $nama_file;

        //jika berhasil maka simpan data dengan method $post->save();

        if($prodi->save()) {
            $success['data'] = $prodi;
            return $this->sendResponse($success, 'Data prodi berhasil disimpan. ');
        } else {
            return $this->sendError('Error. ', ['Error' => 'Data prodi gagal disimpan. ']);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //membuat validasi semua field wajib diisi
        $validasi = $request->validate([
            'nama' => 'required|min:5|max:20',
            'foto' => 'required|file|image|max:10000'
        ]);

        $ext = $request->foto->getClientOriginalExtension();
        $nama_file = 'foto-' . time() . '.' . $ext;

        //nama file baru : foto-123412.png

        $path = $request->foto->storeAs('public', $nama_file);

        //cari data prod berdasarkan id
        $prodi =Prodi::find($id);

        //isi property nama dan foto
        $prodi->nama = $validasi['nama'];
        $prodi->foto = $nama_file;

        //jika berhasil maka simpan data dengan method $post->save();

        if($prodi->save()) {
            $success['data'] = $prodi;
            return $this->sendResponse($success, 'Data prodi berhasil disimpan. ');
        } else {
            return $this->sendError('Error. ', ['Error' => 'Data prodi gagal disimpan. ']);
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete($id){
        $prodi = Prodi::findOrFail($id);
        //hapus data menggunakan method delete()

        if ($prodi->delete()) {
            $success['data'] = [];
            return $this->sendResponse($success, "Data prodi dengan id $id berhasil dihapus");
        } else{
            return $this->sendError('Error', ['Error' => 'Data prodi gagal dihapus']);

        }

    }
    
}
