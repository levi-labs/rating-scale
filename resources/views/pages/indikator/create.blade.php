@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $title }}</h4>

                    <form class="forms-sample" action="{{ route('indikator.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Indikator</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama Indikator"
                                name="nama">
                            @error('nama')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kriteria">Kriteria</label>
                            <select class="form-control form-control-lg" id="kriteria" name="kriteria_id">
                                <option disabled selected>Pilih Kriteria</option>
                                @foreach ($kriteria as $kr)
                                    <option value="{{ $kr->id }}">{{ $kr->nama }}</option>
                                @endforeach
                            </select>
                            @error('kriteria_id')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Bobot</label>
                            <input type="number" class="form-control" id="exampleInputUsername1" name="bobot">
                            @error('bobot')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nilai Pembanding</label>
                            <input type="number" class="form-control" id="exampleInputUsername1" placeholder="0"
                                name="nilai_pembanding">
                            @error('nilai_pembanding')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-info me-2">Submit</button>
                        <button type="button" onclick="location.href='{{ route('indikator.index') }}'"
                            class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
