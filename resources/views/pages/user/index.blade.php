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
                    <a href="{{ route('user.create') }}" class="btn btn-info btn-rounded btn-fw">Tambah</a>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Username
                                    </th>
                                    <th>
                                        Nama
                                    </th>
                                    <th>
                                        Akses Level
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
                                            {{ $dt->username }}
                                        </td>

                                        <td>
                                            {{ $dt->nama }}
                                        </td>
                                        <td>
                                            {{ $dt->akses_level }}
                                        </td>
                                        <td>
                                            {{ $dt->email }}
                                        </td>
                                        <td>
                                            <a href="{{ route('user.resetpassword', $dt->id) }}"
                                                class="btn btn-outline-success btn-fw btn-sm">Reset Password</a>
                                            <a href="{{ route('user.edit', $dt->id) }}"
                                                class="btn btn-outline-warning btn-fw btn-sm">Edit</a>
                                            <form action="{{ route('user.delete', $dt->id) }}" method="POST"
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
