@extends('layouts.dashboard', ['module' => 'Category'])

@section('content_dashboard')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('formKategori') }}" class="btn btn-primary btn-sm pull-right">Tambah Kategori</a>
        </div>
    </div>

    <div class="row row-search">
        <div class="col-md-12">
            <form action="{{ route('category') }}" method="get">
                <div class="form-group">
                    <input type="text" class="form-control" name="search" placeholder="Cari Kategori" value="{{ $search }}">
                </div>
                <div class="form-group">
                    <select name="status" class="form-control">
                        <option value="">--Pilih Status--</option>
                        <option value="on" {{ $status == "on" ? "selected" : "" }}>ON</option>
                        <option value="off" {{ $status == "off" ? "selected" : "" }}>OFF</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @php $no= (($category->currentpage()-1) * $category->perpage()) + 1; @endphp
                    @foreach($category as $row)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $row->category }}</td>
                        <td>{{ $row->status }}</td>
                        <td><a href="{{ route('formEditKategori', ['categoryID' => $row->id]) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('hapusKategori', ['categoryID' => $row->id]) }}" class="btn btn-success" onclick="return confirm
                        ('Apakah anda yakin ingin menghapus kategori {{ $row->category }}?'">Delete</a>
                        </td>
                    </tr>
                    @php $no++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            {{ $category->links() }}
        </div>
    </div>
@endsection