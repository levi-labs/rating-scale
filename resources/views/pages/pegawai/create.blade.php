@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $title }}</h4>

                    <form class="forms-sample" action="{{ route('pegawai.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nip">No Induk Pegawai (NIP)</label>
                            <input type="text" class="form-control" id="nip" placeholder="No Induk Pegawai (NIP)"
                                name="nip">
                            @error('nip')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Pegawai</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama Pegawai"
                                name="nama">
                            @error('nama')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="divisi">divisi</label>
                            <select class="form-control form-control-lg" id="divisi" name="divisi">
                                <option disabled selected>Pilih divisi</option>
                                <option>Markering</option>
                                <option>Human</option>
                                <option>Accounting</option>
                                {{-- @foreach ($kriteria as $kr)
                                    <option value="{{ $kr->id }}">{{ $kr->nama }}</option>
                                @endforeach --}}
                            </select>
                            @error('divisi')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_handphone">No Handphone</label>
                            <input type="text" class="form-control" id="no_handphone" placeholder="No Handphone"
                                name="no_handphone">
                            @error('no_handphone')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="email" name="email">
                            @error('email')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat</label>
                            <input type="text" class="form-control" id="email" placeholder="email" name="alamat">
                            @error('alamat')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-info me-2">Submit</button>
                        <button type="button" onclick="location.href='{{ route('pegawai.index') }}'"
                            class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
