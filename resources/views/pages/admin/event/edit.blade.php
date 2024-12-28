@extends('layouts.admin.main')
@section('title', 'Admin Edit Event')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Event</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}" style="color: #E82561;">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.event.index') }}" style="color: #E82561;">Event</a>
                </div>
                <div class="breadcrumb-item">Edit Event</div>
            </div>
        </div>

        <a href="{{ route('admin.event.index') }}"  style="background-color: #E82561; color: #fff; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);" class="btn btn-icon icon-left">Kembali</a>

        <div class="card mt-4">
            <form action="{{ route('admin.event.update', $events->id) }}" 
                  class="needs-validation" 
                  novalidate 
                  enctype="multipart/form-data" 
                  method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama_event">Nama Event</label>
                                <input id="nama_event" type="text" 
                                       class="form-control" 
                                       name="nama_event" 
                                       value="{{ old('nama_event', $events->nama_event) }}" 
                                       required>
                                <div class="invalid-feedback">
                                    Kolom ini harus diisi!
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <input id="deskripsi" type="text" 
                                       class="form-control" 
                                       name="deskripsi" 
                                       value="{{ old('deskripsi', $events->deskripsi) }}" 
                                       required>
                                <div class="invalid-feedback">
                                    Kolom ini harus diisi!
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tanggal_event">Jadwal</label>
                                <input id="tanggal_event" type="date" 
                                       class="form-control" 
                                       name="tanggal_event" 
                                       value="{{ old('tanggal_event', $events->tanggal_event) }}" 
                                       required>
                                <div class="invalid-feedback">
                                    Kolom ini harus diisi!
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="gambar">Gambar Event</label>
                                <!-- Preview Gambar -->
                                <div class="mb-3">
                                    <img id="preview-image" src="{{ asset('images/' . $events->gambar) }}" 
                                         alt="Gambar Event" 
                                         style="width: 150px; height: auto;">
                                </div>
                                <input type="file" name="gambar" id="gambar" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="submit" style="background-color: #E82561; color: #fff; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);" class="btn btn-icon icon-left">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
