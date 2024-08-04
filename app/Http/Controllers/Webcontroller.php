<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPelanggan;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;

class Webcontroller extends Controller
{
    public function dashboard() {
        $DataPelanggan = DataPelanggan::all();
        return view('hero', ['DataPelanggan' => $DataPelanggan]);
    }

    public function registrasiuser() {
        return view('registrasiuser');
    }

    public function bayar() {
        return view('bayar');
    }

    public function tambah(Request $request){

    $pattern = '??##-##??-???#-##?#';
    $result = '';

    for ($i = 0; $i < strlen($pattern); $i++) {
        $char = $pattern[$i];
        if ($char === '?') {
            $result .= rand(0, 9); // 0-9
        } elseif ($char === '#') {
            $result .= chr(rand(65, 90)); // A-Z
        } else {
            $result .= $char;
        }
    }
$request['no_meteran'] = $result;

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'no_meteran' => 'required'
        ]);

        $DataPelanggan = DataPelanggan::create($data);
        $jumlahmeteran = rand(1,999);
        Pembayaran::create([
            'datapelanggan_id' => $DataPelanggan->id,
            'jumlah_meteran' => $jumlahmeteran,
            'price' => $jumlahmeteran*12000
        ]);
        
        return redirect('/hero')->with('Berhasil', 'Data Berhasil Ditambahkan');
    }

    public function ubah(DataPelanggan $DataPelanggan) {
        
        
        return view('ubahdata', ['DataPelanggan' => $DataPelanggan]);
    }

    public function update(Request $request, DataPelanggan $DataPelanggan) {
        $dataupdate = DataPelanggan::findOrFail($DataPelanggan->id);
        
        $dataupdate->update($request->all());

        return redirect('/hero')->with('Berhasil', 'Data Berhasil Diupdate');

    }

    public function hapus(DataPelanggan $DataPelanggan) {
        $DataPelanggan->delete();

        return back()->with('Berhasil', 'Data Berhasil Dihapus');
    }

    public function search(Request $request) {
        if($keyword = $request->has('search')) {

            $result = DataPelanggan::where('name', 'LIKE', '%'.$request->search.'%')
            ->orWhere('email', 'LIKE', '%'.$request->search.'%')
            ->orWhere('no_meteran', 'LIKE', '%'.$request->search.'%')
            ->orWhere('telepon', 'LIKE', '%'.$request->search.'%')
            ->orWhere('alamat', 'LIKE', '%'.$request->search.'%')
            ->orWhere('status', 'LIKE', '%'.$request->search.'%')
            ->get();
        } else {
            $result = DataPelanggan::all();
        }
        return view('hero', [
            'DataPelanggan' => $result,
        ]);
    }

    public function submitpembayaran(Request $request){
        $detailpembayaran = DataPelanggan::where('no_meteran', $request->no_meteran)->first();
        if($detailpembayaran->status === 'LUNAS') {
            return back()->with('payed', 'Nomor meteran sudah dibayarkan');
        } else {
            return redirect()->route('detailpembayaran', $detailpembayaran->id);
        }
    }

    public function detailpembayaran(DataPelanggan $DataPelanggan) {
        $pembayaran = Pembayaran::where('datapelanggan_id', $DataPelanggan->id)->first();
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $DataPelanggan->no_meteran,
                'gross_amount' => $pembayaran->price,
            ),
            'customer_details' => array(
                'name' => $DataPelanggan->name,
                'email' => $DataPelanggan->email,
                'phone' => $DataPelanggan->telepon,
                'address' => $DataPelanggan->alamat,
            ),
        );

        DataPelanggan::updateOrCreate([
            'id' => $DataPelanggan->id,
        ],  [
            'status' => 'LUNAS'
        ]);

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        

        return view('detailpembayaran', [
            'detailpembayaran' => $DataPelanggan,
            'pembayaran' => $pembayaran,
            'snapToken' => $snapToken,
            'params' => $params
        ]);
    }

    
}
