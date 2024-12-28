@extends('layouts.admin.main')
@section('title', 'Admin Event')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Event</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}" style="color:#E82561;">Dashboard</a></div>
                <div class="breadcrumb-item">Event</div>
            </div>
        </div>
        <a href="{{ route('admin.event.create')}}" class="btn btn-icon icon-left" style="background-color: #E82561; color: #fff; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);">
            <i class="fas fa-plus"></i> Tambah Event
        </a>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th>No</th>
                        <th>Nama Event</th>
                        <th>Deskripsi</th>
                        <th>Jadwal</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                    @php
                        $no = 0
                    @endphp
                    @forelse ($events as $item)
                    <tr>
                        <td>{{ $no += 1 }}</td>
                        <td>{{ $item->nama_event }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>{{ $item->tanggal_event }}</td>
                        <td>
                            <img src="{{ asset('images/' . $item->gambar) }}" alt="{{ $item->nama_event }}" width="100" height="80">
                        </td>
                        <td>
                            <a href="{{ route('admin.event.edit', $item->id) }}" class="badge">
                                <i style="color: #E82561;" class="fas fa-edit"></i> <!-- Ikon edit -->
                            </a>
                            <a href="{{ route('admin.event.delete', $item->id) }}" class="badge" data-confirm-delete="true">
                                <i style="color: #E82561;" class="fas fa-trash-alt"></i> <!-- Ikon hapus -->
                            </a>
                        </td>
                    </tr>
                    @empty
                    <td colspan="5" class="text-center">Data Event Kosong</td>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>
@endsection