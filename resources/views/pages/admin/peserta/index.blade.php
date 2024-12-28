@extends('layouts.admin.main')
@section('title', 'Admin Peserta')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Peserta</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}" style="color:#E82561;">Dashboard</a></div>
                <div class="breadcrumb-item">Peserta</div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <!-- Tombol Tambah Peserta -->
            <a href="{{ route('admin.peserta.create')}}" class="btn btn-icon icon-left" 
            style="background-color: #E82561; color: #fff; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);">
                <i class="fas fa-plus"></i> Tambah Peserta
            </a>
            
            <!-- Form Search -->
            <form action="{{ route('admin.peserta.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control" 
                    placeholder="Cari Nama Peserta" value="{{ request('search') }}">
                <button type="submit" class="btn btn-icon ml-2" 
                        style="background-color: #E82561; color: #fff;">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th>No</th>
                        <th>Nama Event</th>
                        <th>Nama Peserta</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                    @php
                        $no = 0
                    @endphp
                    @forelse ($pesertas as $item)
                    <tr>
                        <td>{{ $no += 1 }}</td>
                        <td>{{ $item->nama_event }}</td>
                        <td>{{ $item->nama_peserta }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <a href="{{ route('admin.peserta.edit', $item->id) }}" class="badge">
                                <i style="color: #E82561;" class="fas fa-edit"></i> <!-- Ikon edit -->
                            </a>
                            <a href="{{ route('admin.peserta.delete', $item->id) }}" class="badge" data-confirm-delete="true">
                                <i style="color: #E82561;" class="fas fa-trash-alt"></i> <!-- Ikon hapus -->
                            </a>
                        </td>
                    </tr>
                    @empty
                    <td colspan="5" class="text-center">Data Peserta Kosong</td>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
