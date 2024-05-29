@extends('layout.main')
@section('content-title', 'Master Mahasiswa')
@section('content')


<div class="card">
    <div class="card-header">
        <h3 class="card-title">Input</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('mahasiswa.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_mahasiswa">Nama Mahasiswa</label>
                <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control" value="{{ $data->nama }}">
            </div>
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="number" name="nim" id="nim" class="form-control" value="{{ $data->nim }}">
            </div>
            <div class="form-group">
                <label for="no_wa">NO WHATSAPP</label>
                <input type="number" name="no_wa" id="no_wa" class="form-control" value="{{ $data->no_wa }}">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Update">
            </div>
        </form>
    </div>
</div>


    @endsection