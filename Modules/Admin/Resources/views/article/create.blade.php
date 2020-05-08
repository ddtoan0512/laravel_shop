@extends('admin::layouts.master')
@section('content')
    <div class="pt-3">
        <div class="row">
          @include('admin::article.form')
        </div>
    </div>
@endsection