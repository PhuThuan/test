@extends('trangchu')
@section('content')
    <div class="col-md-4 col-md-offset-4" style="margin-left:33%">
        <form action="{{route('postProduct')}}" method="post" enctype="multipart/form-data">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif

            <span class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </span>
            <br />
            <span class="text-danger">
                @error('description')
                    {{ $message }}
                @enderror
            </span>
            <br />
            <span class="text-danger">
                @error('image')
                    {{ $message }}
                @enderror
            </span>
            <br />
            <span class="text-danger">
                @error('day')
                    {{ $message }}
                @enderror
            </span>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" name='name' class="form-control" placeholder="name">

            </div>
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <input type="text" name='description' class="form-control" placeholder="description">

            </div>
            <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <input type="file" name='image' class="form-control" placeholder="image">

            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-primary form-control">thêm sản phẩm</button>
            </div>


        </form>

    </div>
    
@endsection
