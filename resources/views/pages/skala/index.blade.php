@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $title }}</h4>
                    <a href="{{ route('skala.create') }}" class="btn btn-info btn-rounded btn-fw">Tambah</a>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Skala
                                    </th>
                                    <th>
                                        Interval
                                    </th>
                                    <th>
                                        Keterangan
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
                                            {{ $dt->nama }}
                                        </td>
                                        <td>
                                            {{ $dt->interval }}
                                        </td>

                                        <td>
                                            {{ $dt->keterangan }}
                                        </td>
                                        <td>
                                            <a href="{{ route('skala.edit', $dt->id) }}"
                                                class="btn btn-outline-warning btn-fw btn-sm">Edit</a>
                                            <form action="{{ route('skala.delete', $dt->id) }}" method="POST"
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
