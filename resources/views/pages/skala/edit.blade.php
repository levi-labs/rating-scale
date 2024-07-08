@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $title }}</h4>
                    <form class="forms-sample" action="{{ route('skala.update', $skala->id) }}" method="POST"
                        autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Skala</label>
                            <input type="text" class="form-control" id="nama" autofocus="true"
                                placeholder="Nama Skala" name="nama" value="{{ $skala->nama }}">
                            @error('nama')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="interval">Interval</label>
                            <input type="text" class="form-control" id="interval" autofocus="true"
                                placeholder="Interval" name="interval" value="{{ $skala->interval }}">
                            @error('interval')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" autofocus="true"
                                placeholder="Keterangan" name="keterangan" value="{{ $skala->keterangan }}">
                            @error('keterangan')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-info me-2">Submit</button>
                        <button type="button" onclick="location.href='{{ route('skala.index') }}'"
                            class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
