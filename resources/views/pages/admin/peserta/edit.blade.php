@extends('layouts.admin.main')
@section('title', 'Admin Edit Peserta')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Peserta</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}" style="color: #E82561;">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.peserta.index') }}" style="color: #E82561;">Peserta</a>
                </div>
                <div class="breadcrumb-item">Edit Peserta</div>
            </div>
        </div>

        <a href="{{ route('admin.peserta.index') }}"  style="background-color: #E82561; color: #fff; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);" class="btn btn-icon icon-left">Kembali</a>

        <div class="card mt-4">
            <form action="{{ route('admin.peserta.update', $pesertas->id) }}" 
                  class="needs-validation" 
                  novalidate 
                  enctype="multipart/form-data" 
                  method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="event_id">Nama Event</label>
                            <select name="event_id" class="form-control" required>
                                @foreach ($events as $item)
                                    <option value="{{ $item->id }}" 
                                        {{ $pesertas->event_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama_event }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Pilih kategori Event!
                            </div>
                        </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama_peserta">Nama Peserta</label>
                                <input id="nama_peserta" type="text" 
                                       class="form-control" 
                                       name="nama_peserta" 
                                       value="{{ old('nama_peserta', $pesertas->nama_peserta) }}" 
                                       required>
                                <div class="invalid-feedback">
                                    Kolom ini harus diisi!
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="text" 
                                       class="form-control" 
                                       name="email" 
                                       value="{{ old('email', $pesertas->email) }}" 
                                       required>
                                <div class="invalid-feedback">
                                    Kolom ini harus diisi!
                                </div>
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
