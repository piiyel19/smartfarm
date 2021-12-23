
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form method="POST" action="">
            @csrf
            <div class="col-md-4">
            <input type="text" class="form-control @error('item') is-invalid @enderror" name="item" required>
            <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection