@extends('post::Admin.layouts.SampleLayout')

@section('Title')
    <title> Category Edit </title>
@endsection

@section('NavBar')
    @include('post::Admin.Components.PageMenus.NavBar')
@endsection

@section('HorizontalBar')
    @include('post::Admin.Components.PageMenus.HorizontalBar')
@endsection

@section('PageHeader')
    @include('post::Admin.Components.PageHeaders.TitleHeader', ['title' => 'Category'])
@endsection

@section('PageBody')
    @include('post::Admin.Components.PageBodies.CategoryEditBody')
@endsection
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@section('PageJS')
    <!-- Libs JS -->
    <script src="{{ asset('vendor/post/libs/Admin/apexcharts/dist/apexcharts.min.js') }}" defer></script>
    <script src="{{ asset('vendor/post/libs/Admin/jsvectormap/dist/js/jsvectormap.min.js') }}" defer></script>
    <script src="{{ asset('vendor/post/libs/Admin/jsvectormap/dist/maps/world.js') }}" defer></script>
    <script src="{{ asset('vendor/post/libs/Admin/jsvectormap/dist/maps/world-merc.js') }}" defer></script>
    <script src="{{ asset('vendor/post/libs/Admin/nouislider/dist/nouislider.min.js') }}" defer></script>
    <script src="{{ asset('vendor/post/libs/Admin/litepicker/dist/litepicker.js') }}" defer></script>
    <script src="{{ asset('vendor/post/libs/Admin/tom-select/dist/js/tom-select.base.min.js') }}" defer></script>
    <!-- Tabler Core -->
    <script src="{{ asset('vendor/post/js/Admin/tabler.min.js') }}" defer></script>
    <script src="{{ asset('vendor/post/js/Admin/demo.min.js') }}" defer></script>
@endsection
