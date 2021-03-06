<?php

class KasirController extends \BaseController
{

    public function daftarPenjualanBelumDibayar()
    {
        $daftarPenjualan = Penjualan::belumDibayar();

        return View::make('penjualan.kasir.index', ['daftarPenjualan' => $daftarPenjualan]);
    }

    public function bayarForm($id)
    {
        $penjualan = Penjualan::findOrFail($id);

        return View::make('penjualan.kasir.pembayaran', ['penjualan' => $penjualan]);
    }

    public function bayar($id)
    {
        $penjualan = Penjualan::findOrFail($id);

        $penjualan->sudah_dibayar = true;
        $penjualan->metode_pembayaran = Input::get('metode_pembayaran');
        $penjualan->tanggal_pembayaran = (new DateTime())->format('Y-m-d');

        $penjualan->save();

        $totalHarga = 0;
        foreach ($penjualan->detail()->get() as $detail) {
            $totalHarga += $detail->unit * $detail->harga;
        }

        if( Input::get('metode_pembayaran') == 'hutang' ) {
            $pelanggan = $penjualan->pelanggan();
            $pelanggan->piutang += $totalHarga;
            $pelanggan->jatuh_tempo = Input::get('jatuh_tempo');
            $pelanggan->save();
        }

        return Redirect::to('/penjualan/kasir');
    }

}