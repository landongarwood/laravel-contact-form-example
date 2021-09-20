@extends('layouts.master')

@section('content')
    <div class="row contact-us-page">
        <div class="col-12 col-md-4">
            @include('sections.contact-information')
        </div>
        <div class="col-12 col-md-8">
            @include('sections.contact-form')
        </div>
    </div>
@endsection
