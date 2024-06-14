@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Welcome back, {{ Auth::guard('web')->user()->nama }} </h2>
                        {{-- <p class="mb-md-0">Your analytics dashboard template.</p> --}}
                    </div>

                </div>
                {{-- <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block ">
                        <i class="mdi mdi-download text-muted"></i>
                    </button>
                    <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                        <i class="mdi mdi-clock-outline text-muted"></i>
                    </button>
                    <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                        <i class="mdi mdi-plus text-muted"></i>
                    </button>
                    <button class="btn btn-primary mt-2 mt-xl-0">Download report</button>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
            <div class="card border-0 bg-primary text-white">
                <div id="downloads-carousel" class="carousel slide card-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card-body pb-0">
                                <p class="card-title text-white">Pegawai</p>
                                <h1>{{ $pegawai }}</h1>
                                {{-- <h4>Growth 58%</h4> --}}
                            </div>
                            <canvas height="110" id="downloads-chart-a"></canvas>
                        </div>
                        {{-- <div class="carousel-item">
                            <div class="card-body pb-0">
                                <p class="card-title text-white">Uploads</p>
                                <h1>4533</h1>
                              
                            </div>
                            <canvas height="110" id="downloads-chart-b"></canvas>
                        </div> --}}
                    </div>
                    {{-- <a class="carousel-control-prev control-light" href="#downloads-carousel" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next control-light" href="#downloads-carousel" role="button"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a> --}}
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
            <div class="card border-0 bg-warning text-white">
                <div id="feedbacks-carousel" class="carousel slide card-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card-body pb-0">
                                <p class="card-title text-white">Kriteria</p>
                                <h1>{{ $kriteria }}</h1>
                                {{-- <h4>Growth 12%</h4> --}}
                            </div>
                            <canvas height="110" id="feedbacks-chart-a"></canvas>
                        </div>
                        {{-- <div class="carousel-item">
                            <div class="card-body pb-0">
                                <p class="card-title text-white">feedbacks</p>
                                <h1>8290</h1>
                                <h4>Growth 11%</h4>
                            </div>
                            <canvas height="110" id="feedbacks-chart-b"></canvas>
                        </div> --}}
                    </div>
                    {{-- <a class="carousel-control-prev control-light" href="#feedbacks-carousel" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next control-light" href="#feedbacks-carousel" role="button"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a> --}}
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
            <div class="card border-0 bg-success text-white">
                <div id="customers-carousel" class="carousel slide card-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card-body pb-0">
                                <p class="card-title text-white">Indikator</p>
                                <h1>{{ $indikator }}</h1>
                                {{-- <h4>Growth 31%</h4> --}}
                            </div>
                            <canvas height="110" id="customers-chart-a"></canvas>
                        </div>
                        {{-- <div class="carousel-item">
                            <div class="card-body pb-0">
                                <p class="card-title text-white">Users</p>
                                <h1>1782</h1>
                                <h4>Growth 62%</h4>
                            </div>
                            <canvas height="110" id="customers-chart-b"></canvas>
                        </div> --}}
                    </div>
                    {{-- <a class="carousel-control-prev control-light" href="#customers-carousel" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next control-light" href="#customers-carousel" role="button"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
