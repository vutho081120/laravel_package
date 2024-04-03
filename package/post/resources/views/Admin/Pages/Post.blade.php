@extends('post::Admin.layouts.SampleLayout')

@section('Title')
    <title> Post </title>
@endsection

@section('NavBar')
    @include('post::Admin.Components.PageMenus.NavBar')
@endsection

@section('HorizontalBar')
    @include('post::Admin.Components.PageMenus.HorizontalBar')
@endsection

@section('PageHeader')
    @include('post::Admin.Components.PageHeaders.SearchHeader', [
        'singular' => 'post',
        'plural' => 'posts',
        'routeCreate' => 'admin.post.createShow',
        'routeSearch' => 'admin.post.search',
    ])
@endsection

@section('PageBody')
    @include('post::Admin.Components.PageBodies.PostBody')
@endsection

@section('PageJS')
    <!-- Libs JS -->
    <script src="{{ asset('vendor/post/libs/Admin/apexcharts/dist/apexcharts.min.js') }}" defer></script>
    <script src="{{ asset('vendor/post/libs/Admin/jsvectormap/dist/js/jsvectormap.min.js') }}" defer></script>
    <script src="{{ asset('vendor/post/libs/Admin/jsvectormap/dist/maps/world.js') }}" defer></script>
    <script src="{{ asset('vendor/post/libs/Admin/jsvectormap/dist/maps/world-merc.js') }}" defer></script>
    <!-- Tabler Core -->
    <script src="{{ asset('vendor/post/js/Admin/tabler.min.js') }}" defer></script>
    <script src="{{ asset('vendor/post/js/Admin/demo.min.js') }}" defer></script>
@endsection
