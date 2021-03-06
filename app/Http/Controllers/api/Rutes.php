<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
class Rutes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test($id)
    {
        $cek = \App\Transaksi::where('id_jadwal', $id)->count();
        if ($cek > 0) {
          return $arrayName = array('status' => 'error', 'pesan' => 'Terdapat transaksi di jadwal ini');
        }
        $delete_kursi = \App\Kursi::where('id_jadwal', $id)->delete();
        $data = \App\Jadwal::find($id);
        $data->delete();
        return $arrayName = array('status' => 'success', 'pesan' => 'Berhasil Menghapus Data');

        return 'berhasil';
    }
    public function index()
    {
        $data = \App\Rute::all();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $rules=array(
            'nama' => 'required'
        );
        $messages=array(
            'nama.required' => 'nama field tidak boleh kosong'
        );

        $validator=Validator::make($request->all(),$rules,$messages);
        if($validator->fails())
        {
            $messages=$validator->messages();
            $errors=$messages->all();
            return response()->json($errors, 500);
        }

        $data = new \App\Rute();
        $data->nama = $request->nama;
        $data->save();

        return $arrayName = array('status' => 'OK', 'code' => 200, 'message' => 'Berhasil Menambah Data');
    }

    public function show($id)
    {
        $data = \App\Rute::find($id);
        return $data;   
    }

    public function update(Request $request, $id)
    {
        $rules=array(
            'nama' => 'required'
        );
        $messages=array(
            'nama.required' => 'nama field tidak boleh kosong'
        );

        $validator=Validator::make($request->all(),$rules,$messages);
        if($validator->fails())
        {
            $messages=$validator->messages();
            $errors=$messages->all();
            return response()->json($errors, 500);
        }

        $data = \App\Rute::find($id);
        $data->nama = $request->nama;
        $data->save();

        return $arrayName = array('status' => 'OK', 'code' => 200, 'message' => 'Berhasil Mengubah Data');
    }

    public function destroy($id)
    {
        $data = \App\Rute::findOrFail($id);
        $data->delete();

        if($data) {
            return $arrayName = array('status' => 'OK', 'code' => 200, 'message' => 'Berhasil Menghapus Data' );
        }
        return $arrayName = array('status' => 'Failed', 'code' => 406, 'message' => 'Data ini mungkin memiliki data di tabel relasi' );
    }
}
