@extends('layouts.main')
@section('judul')
    Daftar Menu
@endsection
@section('container')
<button class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah
                    </button>
    <div class="d-flex justify-content-between align-items-center">
                    
                    
                </div>
                <hr>
                <table id="barangTable" class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>ID</th>
                            <th>Barang</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>6</td>
                            <td>Susu</td>
                            <td>100</td>
                            <td>1000</td>
                            <td>
                                <button class="btn btn-success btn-sm"><i class="fas fa-pen"></i></button>
                                <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>7</td>
                            <td>Beras</td>
                            <td>200</td>
                            <td>2000</td>
                            <td>
                                <button class="btn btn-success btn-sm"><i class="fas fa-pen"></i></button>
                                <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
@endsection