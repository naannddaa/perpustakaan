
@include('header')
<p>Main content here...</p>
@include('footer')

@extends('layout')
@section('title', 'Home Page')
@section('content')
    <h1>Welcome to Home Page</h1>
@endsection


{{-- acara 12 no 4 --}}
@extends('layout')
@push('styles')
    <link rel="stylesheet" href="custom.css">
@endpush
@section('content')
    <h1>Content Goes Here</h1>
@endsection

@push('script')
    <script src="app.js"></script>
@endpush
