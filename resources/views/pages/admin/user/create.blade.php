@extends('layouts.admin')

@section('title', 'User')

@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <!-- Teks dashboard dan subtitle -->
        <div class="dashboard-heading">
            <h2 class="dashboard-title">
                User
            </h2>
            <p class="dashboard-subtitle">
                Create New User
            </p>
        </div>
        {{-- Content Add User --}}
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
                            <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                                {{-- Form inputan --}}
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>User Name</label>
                                            <input type="text" name="name" class="form-control" required autofocus>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>User Email</label>
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>User Password</label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>User Roles</label>
                                            <select name="roles" class="form-control" required>
                                                <option disabled selected>
                                                    Choose Role
                                                </option>
                                                <option value="ADMIN">
                                                    Admin
                                                </option>
                                                <option value="USER">
                                                    User
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                {{-- Button Save --}}
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5">
                                            Save Data
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