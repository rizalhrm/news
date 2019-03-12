@extends('layouts.dashboard', ['module' => 'Category'])

@section('content_dashboard')
    <form method="post" action="{{ route($url) }}" class="form-horizontal">
    {{ csrf_field() }}

    <input type="hidden" class="form-control" name="categoryId" value="{{ old('', $category->id ?? '') }}">

        <div class="form-group">
            <label for="" class="col-md-12">Category</label>
            <div class="col-md-12">
                @if($errors->has('category'))
                    <div class="text-danger">{{ $errors->first('category') }}</div>
                @endif
                <input type="text" class="form-control" name="category" value="{{ old('category', $category->category ?? '') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-md-12">Status</label>
            <div class="col-md-12">
                @if($errors->has('status'))
                    <div class="text-danger">{{ $errors->first('status') }}</div>
                @endif
                <label class="radio-inline"><input type="radio" name="status" value="on" {{ old('status', $category->status ?? '') =="on" ? "checked" : ""}}>ON</label>
                <label class="radio-inline"><input type="radio" name="status" value="off" {{ old('status', $category->status ?? '') =="off" ? "checked" : ""}} >OFF</label>
            </div>
        </div>

        <div class="form-group no-margin">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-md pull-right">{{ $tombol }}</button>
            </div>
        </div>
    </form>
@endsection