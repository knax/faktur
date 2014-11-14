@extends('layout.main')
@section('content')
<div class="row">
    <div class="col-md-12">
        <form role="form">
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="jenis_konsumen" id="jenis-konsumen"> Konsumen tetap
                    </label>
                </div>
                <div id="nama-konsumen">
                <label for="nama-konsumen">Nama Konsumen</label>
                <select class="form-control" name="nama_konsumen">
                    @foreach($listPelanggan as $pelanggan)
                    <option value="{{$pelanggan->id}}">{{$pelanggan->nama}}</option>
                    @endforeach
                </select>
                </div>
            </div>
        </form>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-12">
        <form role="form">
            <div class="form-group">
                <label for="barang">Nama Barang</label>
                <select class="form-control data" name="nama_konsumen" id="barang">
                    @foreach($listBarang as $barang)
                    <option value="{{$barang->nama}}" data-stok="{{$barang->stok}}" data-range-harga="{{$barang->rangeHarga()}}" data-id="{{$barang->id}}">{{$barang->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="unit">Unit</label>
                <input type="text" class="form-control data" name="unit" id="unit">
            </div>
            <p class="bg-info notification" class="hidden">
                <strong>Stok tersisa</strong> <span id="stok-sisa"></span>
            </p>
            <div class="form-group">
                <label for="harga-satuan">Harga Satuan</label>
            <div class="input-group">
            <div class="input-group-addon">Rp.</div>
                <input type="text" class="form-control data" name="harga_satuan" id="harga-satuan">
                </div>
            </div>
            <p class="bg-info notification">
            <strong>Range Harga</strong> <span id="range-harga"></span>
            </p>
            <button type="submit" class="btn btn-default" id="tambah">Tambahkan Barang</button>
        </form>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered" id="data">
            <thead>
                <th>Nomor</th>
                <th>Nama Barang</th>
                <th>Harga Satuan</th>
                <th>Kuantitas</th>
                <th>Harga</th>
            </thead>
            <tfoot>
            <tr>
                <td colspan="4" class="text-right"><strong>Total Harga :</strong></td>
                <td id="total-harga-barang">Rp. 0,-</td>
            </tr>
            </tfoot>
            <tbody data-last-id="0">
            </tbody>
        </table>
        <button type="submit" class="btn btn-default pull-right">Submit</button>
    </div>
</div>
<hr/>
@stop