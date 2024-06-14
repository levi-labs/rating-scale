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
                            <label for="nip">Username</label>
                            <input type="text" class="form-control" id="nip" placeholder="JohnDoe" name="username">
                            @error('nip')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama Pegawai"
                                name="nama">
                            @error('nama')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="akses_level">Akses Level</label>
                            <select class="form-control form-control-lg" id="akses_level" name="akses_level">
                                <option disabled selected>Pilih Akses Level</option>
                                <option value="1">Administrator</option>
                                <option value="2">Staf</option>
                            </select>
                            @error('akses_level')
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
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="password"
                                name="password">
                            @error('password')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-info me-2">Submit</button>
                        <button type="button" onclick="location.href='{{ route('user.index') }}'"
                            class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
