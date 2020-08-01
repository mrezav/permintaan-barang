<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Karyawan;
use App\Permintaan;
use App\Detail;
use App\Lokasi;
use Illuminate\Support\Facades\DB;

class PermintaanController extends Controller
{
    public function list_permintaan()
    {
        $permintaan = Permintaan::with('karyawan')->get();
        return response()->json($permintaan);
    }

    public function permintaan($id)
    {
        $permintaan = Permintaan::with('karyawan')->where('permintaan.id',$id)->get();
        return response()->json($permintaan);
    }

    public function detail($permintaan_id)
    {
        $detail = Detail::with('permintaan','barang')->where('permintaan_id', $permintaan_id)->get();
        return response()->json($detail);
    }

    public function list_barang()
    {
        $barang = Barang::with('lokasi')->get();
        return response()->json($barang);
    }

    public function brg_terpenuhi()
    {
        $barang = Barang::where('status', true)->get();
        return response()->json($barang);
    }

    public function barang($kode)
    {
        $barang = Barang::where('kode',$kode)->get();
        return response()->json($barang);
    }

    public function list_karyawan()
    {
        $karyawan = Karyawan::latest()->get();
        return response()->json($karyawan);
    }

    public function lokasi($kode)
    {
        $lokasi = Lokasi::where('kode',$kode)->get();
        return response()->json($lokasi);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $permintaan = $data['permintaan'];
        $detail = $data['detail'];

        $db_permintaan = new Permintaan;

        $db_permintaan->nik = $permintaan['nik'];
        $db_permintaan->total_qty = $permintaan['total_qty'];
        $db_permintaan->tanggal = $permintaan['tanggal'];

        $db_permintaan->save();

        $arr_detail = [];
        foreach($detail as $key => $val){
            $data = [
                'permintaan_id'     => $db_permintaan->id,
                'kode_barang'       => $val['kode'],
                'sub_qty'           => $val['sub_qty'],
                'keterangan'        => $val['keterangan'],
                'created_at'        => now(),
                'updated_at'        => now(),
            ];
            array_push($arr_detail, $data);

            $oldstok = DB::table('barang')->where('kode', $val['kode'])->value('stok');

            $newstok = $oldstok - $val['sub_qty'];

            DB::table('barang')->where('kode', $val['kode'])->update(['stok' => $newstok]);

        };

        DB::table('detail')->insert($arr_detail);

        return response()->json('Success buat permintaan');
    }

    public function delete_permintaan($id)
    {
        DB::table('detail')->where('permintaan_id', $id)->delete();
        DB::table('permintaan')->where('id', $id)->delete();

        return response()->json('Success delete permintaan');
    }


}
