@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Your Profile'])
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if(isset($result))
                        <form role="form" method="POST" action={{ route('results.update', $result->id) }} enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="card-header pb-0">
                                <div class="d-flex align-items-center">
                                    <p class="mb-0">Edit {{ $name }}</p>
                                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="text-uppercase text-sm">{{ $name }} Information</p>
                                <div class="row">
                                    @foreach($result->toArray() as $field => $value)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">{{ $field }}</label>
                                                <input class="form-control" type="text" name="{{ $field }}" value="{{ $value }}">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </form>
                    @else
                        <form role="form" method="POST" action={{ route('results.store') }} enctype="multipart/form-data">
                            @csrf
                            <div class="card-header pb-0">
                                <div class="d-flex align-items-center">
                                    <p class="mb-0">Edit {{ $name }}</p>
                                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="text-uppercase text-sm">{{ $name }} Information</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Текст</label>
                                            <input class="form-control" type="text" name="text" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Айди курса</label>
                                            <input class="form-control" type="text" name="course_id" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="formFileMultiple" class="form-label">Документ</label>
                                        <input class="form-control" type="file" id="formFileMultiple" name="document" multiple>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
