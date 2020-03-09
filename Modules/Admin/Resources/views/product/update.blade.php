@extends('admin::layouts.master')
@section('content')
<div class="container-fluid">
  <div class="pt-3">
      <div class="row">
        @include('admin::product.form')
      </div>
  </div>
</div>