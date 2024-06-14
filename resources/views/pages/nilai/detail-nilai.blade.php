@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">{{ $title }} | {{ $nama }} |
                        {{ Carbon\Carbon::parse($tanggal)->format('Y-m') }}</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>

                                    <th>Bobot</th>
                                    <th>Nilai Indikator</th>
                                    <th>Nilai Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($data as $dt)
                                    @php
                                        $total += $dt->nilai_hasil;
                                    @endphp
                                    <tr>
                                        <td>{{ $dt->indikator }}</td>
                                        <td>{{ $dt->nilai_indikator }}</td>
                                        <td>{{ $dt->nilai_hasil }}</td>
                                    </tr>
                                @endforeach
                                <style>
                                    .bg-flat-warning {
                                        background-color: #ffda99 !important;
                                    }
                                </style>
                                <tr>
                                    <td colspan="2" class="text-right bg-flat-warning">Total</td>
                                    <td class="bg-flat-warning">{{ $total }}</td>
                                </tr>
                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
