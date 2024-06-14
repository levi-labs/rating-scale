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
                    <div class="row justify-content-end">
                        <div class="col-md-4 ">
                            <form action="{{ route('nilai.index') }}" method="GET">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="month" class="form-control form-control-sm" name="search">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-dark" type="submit">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="table-responsive pt-3">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>
                                        #
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
                                            {{ $dt->tanggal_nilai }}
                                        </td>
                                        <td>
                                            <a href="{{ route('nilai.show', $dt->tanggal_nilai) }}"
                                                class="btn btn-outline-success btn-fw btn-sm">Show</a>
                                            {{-- <a href="{{ route('nilai.edit', $dt->tanggal_nilai) }}"
                                                class="btn btn-outline-warning btn-fw btn-sm">Edit</a> --}}
                                            {{-- <form action="{{ route('nilai.delete', $dt->tanggal_nilai) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                            </form> --}}

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
