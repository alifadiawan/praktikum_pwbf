@extends('layout.main')
@section('content-title', 'Master Mahasiswa')
@section('content')

    @if (session()->has('add'))
        <div class="alert alert-success" role="alert">
            <p>{{ session('add') }}</p>
        </div>
    @endif
    @if (session()->has('hapus'))
        <div class="alert alert-danger" role="alert">
            <p>{{ session('hapus') }}</p>
        </div>
    @endif

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
            <form action="{{ url('/submitMahasiswa') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Nama Mahasiswa</label>
                    <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">NIM</label>
                    <input type="number" name="nim" id="nim" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h3 class="card-title">List Mahasiswa</h3>
                </div>
            </div>
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

            <form action="{{ route('mahasiswa.hapus') }}" method="POST" id="deleteForm">
                @csrf
                <input type="hidden" name="indexes" id="deleteIndexes">

                <table class="table table-bordered" id="example">
                    <thead>
                        <tr class="text-center">

                            <th style="width: 5px;">No</th>
                            <th style="width: 10px;">NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>NO WA</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nim }}</td>
                                <td>{{ $item->nama }}</td>
                                @if (empty($item->no_wa))
                                    <td>-- Belum Diisi --</td>
                                @else
                                    <td>{{ $item->no_wa }}</td>
                                @endif
                                <td>
                                    <a href="{{ route('mahasiswa.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('mahasiswa.delete', $item->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <button type="button" class="btn btn-danger" id="deleteSelected">Delete Selected</button>
                {{-- {{ $employee->links() }} --}}
            </form>

        </div>

    </div>
@section('page-script')
    <script>
        document.getElementById('checkAll').addEventListener('change', function() {
            var checkboxes = document.querySelectorAll('.checkbox');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = this.checked;
            }.bind(this));
        });

        document.getElementById('deleteSelected').addEventListener('click', function() {
            var checkboxes = document.querySelectorAll('.checkbox:checked');
            var indexes = [];
            checkboxes.forEach(function(checkbox) {
                indexes.push(checkbox.getAttribute('data-index'));
            });

            document.getElementById('deleteIndexes').value = indexes.join(',');
            document.getElementById('deleteForm').submit();
        });
    </script>
@endsection

@endsection
