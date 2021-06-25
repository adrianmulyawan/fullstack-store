@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <!-- Teks dashboard dan subtitle -->
        <div class="dashboard-heading">
            <h2 class="dashboard-title">
                Edit Product
            </h2>
            <p class="dashboard-subtitle">
                Edit Data Product
            </p>
        </div>
        {{-- Content Add Product --}}
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    {{-- Tambahkan Error Handling --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('product.update', $item->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" name="name" class="form-control" required autofocus value="{{ $item->name }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Pemilik Product</label>
                                            <select name="users_id" class="form-control">
                                                <option value="{{ $item->users_id }}" selected>
                                                    {{ $item->user->name }}
                                                </option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">
                                                        {{ $user->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                                Kategori Product
                                            </label>
                                            <select name="categories_id" class="form-control">
                                                <option value="{{ $item->categories_id }}" selected>
                                                    {{ $item->category->name }}
                                                </option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Product Price</label>
                                            <input type="number" name="price" class="form-control" required autofocus value="{{ $item->price }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                                Product Description
                                            </label>
                                            <textarea name="description" id="editor" cols="50" rows="30">
                                                {!! $item->description !!}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                {{-- Button Update Data --}}
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5">
                                            Update Data
                                        </button>
                                    </div>
                                </div>      
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endpush