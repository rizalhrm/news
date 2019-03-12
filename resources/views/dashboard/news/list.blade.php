@extends('layouts.dashboard', ['module' => 'News'])

@section('content_dashboard')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('formNews') }}" class="btn btn-primary btn-sm pull-right">Tambah News</a>
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
                        <th>News</th>
                        <th>Status</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @php $no= (($news->currentpage()-1) * $news->perpage()) + 1; @endphp
                    @foreach($news as $row)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $row->news }}</td>
                        <td>{{ $row->status }}</td>
                        <td><a href="{{ route('formEditNews', ['newsID' => $row->id]) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('hapusNews', ['newsID' => $row->id]) }}" class="btn btn-success" onclick="return confirm
                        ('Apakah anda yakin ingin menghapus berita {{ $row->news }}?'">Delete</a>
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
            {{ $news->links() }}
        </div>
    </div>
@endsection