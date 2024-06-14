@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $title }}</h4>
                    @if (session()->has('error'))
                        <div class="alert alert-danger"></div>
                        {{ session('error') }}
                </div>
                @endif
                <a href="{{ route('nilai.index') }}" class="btn btn-secondary btn-rounded btn-fw">Kembali</a>
                <a href="{{ route('nilai.create') }}" class="btn btn-info btn-rounded btn-fw">Tambah</a>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>

                                <th>
                                    Nama Lengkap
                                </th>
                                <th>
                                    Total Nilai
                                </th>
                                <th>
                                    Options
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dt)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $dt->nama_lengkap }}
                                    </td>
                                    <td>
                                        {{ round($dt->total_nilai, 0) }}
                                        <br>
                                        <hr>
                                        @php
                                            $nilai = round($dt->total_nilai, 0);
                                        @endphp

                                        @if ($nilai >= 86)
                                            <button type="button"
                                                class="btn btn-inverse-primary btn-rounded btn-fw text-dark">A</button>
                                            <hr>
                                            <p>Keterangan :Sangat Baik</p>
                                        @elseif ($nilai >= 76 || $nilai <= 85)
                                            <button type="button"
                                                class="btn btn-inverse-primary btn-rounded btn-fw text-dark">B</button>
                                            <hr>
                                            <p>Keterangan :Baik</p>
                                        @elseif ($nilai >= 61 || $nilai <= 75)
                                            <button type="button"
                                                class="btn btn-inverse-primary btn-rounded btn-fw text-dark">C</button>
                                            <hr>
                                            <p>Keterangan : Cukup Baik</p>
                                        @elseif ($nilai >= 46 || $nilai <= 60)
                                            <button type="button"
                                                class="btn btn-inverse-primary btn-rounded btn-fw text-dark">D</button>
                                            <hr>
                                            <p>Keterangan : Buruk</p>
                                        @elseif ($nilai >= 0 || $nilai <= 45)
                                            <button type="button"
                                                class="btn btn-inverse-primary btn-rounded btn-fw text-dark">E</button>
                                            <hr>
                                            <p>Keterangan : Sangat Buruk</p>
                                        @endif

                                    </td>
                                    <td>
                                        <a href="{{ route('nilai.detail', $dt->id) }}"
                                            class="btn btn-outline-success btn-fw btn-sm">Detail</a>
                                        <a href="{{ route('nilai.edit', $dt->id) }}"
                                            class="btn btn-outline-warning btn-fw btn-sm">Edit</a>
                                        <form action="{{ route('nilai.delete', $dt->tanggal_nilai) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                        </form>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
