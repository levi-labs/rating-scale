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
                    <a href="{{ route('nilai.create') }}" class="btn btn-info btn-rounded btn-fw">Tambah</a>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Nama Pegawai
                                    </th>
                                    <th>
                                        Indikator
                                    </th>

                                    <th>
                                        Nilai
                                    </th>
                                    <th>
                                        Tanggal
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
                                            {{ $dt->pegawais->nama_lengkap }}
                                        </td>

                                        <td>
                                            {{ $dt->indikators->nama }}
                                        </td>

                                        <td>
                                            {{ $dt->nilai_hasil }}
                                        </td>
                                        <td>
                                            {{ $dt->tanggal_nilai }}
                                        </td>
                                        <td>
                                            <a href="{{ route('nilai.edit', $dt->id) }}"
                                                class="btn btn-outline-warning btn-fw btn-sm">Edit</a>
                                            <form action="{{ route('nilai.delete', $dt->id) }}" method="POST"
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
