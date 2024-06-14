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
            <style>
                select.form-control,
                select.typeahead,
                select.tt-query,
                select.tt-hint,
                .select2-container--default .select2-selection--single select.select2-search__field,
                .select2-container--default select.select2-selection--single,
                .dataTables_wrapper select {
                    padding: 0.4375rem 0.75rem;
                    border: 1 solid black;
                    outline: 1px solid #000000;
                    color: #000000;
                    appearance: none;
                    background: url(../../../assets/images/arrow-down.svg);
                    background-repeat: no-repeat;
                    background-position: 99% center;
                }

                .form-control,
                .typeahead,
                .tt-query,
                .tt-hint,
                .select2-container--default .select2-selection--single .select2-search__field,
                .select2-container--default .select2-selection--single,
                .dataTables_wrapper select {
                    border: 1px solid #000000;
                    font-weight: 400;
                    font-size: 0.875rem;
                }
            </style>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $title }}</h4>
                    <form class="forms-sample" action="{{ route('nilai.update', $nilai->pegawai_id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="kriteria">Nama Pegawai</label>
                            <select class="form-control form-control-lg" id="kriteria" name="pegawai_id" readonly>
                                <option disabled selected>Pilih Pegawai</option>
                                @foreach ($pegawai as $pg)
                                    <option {{ $pg->id == $nilai->pegawai_id ? 'selected' : '' }}
                                        value="{{ $pg->id }}" disabled>
                                        {{ $pg->nama_lengkap }}</option>
                                @endforeach
                            </select>
                            @error('kriteria_id')
                                <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Nama Indikator
                                        </th>

                                        <th>
                                            Bobot
                                        </th>
                                        <th>
                                            Nilai<br>Pembanding
                                        </th>
                                        <th>
                                            Input Nilai
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nilais as $dt)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $dt->indikators->nama }}
                                            </td>

                                            <td>
                                                {{ $dt->indikators->bobot . ' %' }}
                                            </td>
                                            <td>
                                                {{ $dt->indikators->nilai_pembanding }}
                                            </td>

                                            <td class="text-center">
                                                <input type="hidden" name="id[]" value="{{ $dt->id }}">
                                                <input type="hidden" name="indikator_id[]"
                                                    value="{{ $dt->indikator_id }}">
                                                <div class="form-group  m-auto" style="width: 20%;">

                                                    <input type="number" class="form-control form-control-sm input-nilai"
                                                        name="nilai_indikator[]" min="0"
                                                        value="{{ $dt->nilai_indikator }}">
                                                </div>


                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-center mt-4">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-lg btn-info btn-rounded btn-fw">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
