@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form action="/upload" method="post" enctype="multipart/form-data">
                    <!-- @include('layouts.flash') -->
                    <!-- <x-alert>
                        <p>Image upload response is coming here</p>
                    </x-alert> -->
                    <x-alert />
                    @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Image Upload</label>
                            <div class="col-md-6">
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
