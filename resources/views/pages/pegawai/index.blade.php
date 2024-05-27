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
                    <a href="{{ route('pegawai.create') }}" class="btn btn-info btn-rounded btn-fw">Tambah</a>
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
                                        Divisi
                                    </th>
                                    <th>
                                        No Handphone
                                    </th>
                                    <th>
                                        Email
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
                                            {{ $dt->jabatan }}
                                        </td>
                                        <td>
                                            {{ $dt->no_hp }}
                                        </td>
                                        <td>
                                            {{ $dt->email }}
                                        </td>
                                        <td>
                                            <a href="{{ route('pegawai.edit', $dt->id) }}"
                                                class="btn btn-outline-warning btn-fw btn-sm">Edit</a>
                                            <form action="{{ route('pegawai.delete', $dt->id) }}" method="POST"
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
