@extends('layouts.admin.main')
@section('title', 'Admin Dashboard')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}" style="color: #E82561;">Dashboard</a>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Card 1: Total Event -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-calendar-alt"></i> <!-- Ikon untuk event -->
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Event</h4>
                        </div>
                        <div class="card-body">
                          {{ $totalEvent }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 2: Total Peserta -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-users"></i> <!-- Ikon untuk peserta -->
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Peserta</h4>
                        </div>
                        <div class="card-body">
                           {{ $totalPeserta }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
