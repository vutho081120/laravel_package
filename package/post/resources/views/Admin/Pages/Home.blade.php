{{-- @extends('post::Admin.Layouts.sidebarLayout') --}}
@extends('post::Admin.Layouts.SampleLayout')

@section('Title')
    <title>Home</title>
@endsection

@section('NavBar')
    @include('post::Admin.Components.PageMenus.NavBar')
@endsection

@section('HorizontalBar')
    @include('post::Admin.Components.PageMenus.HorizontalBar')
@endsection

@section('PageHeader')
    @include('post::Admin.Components.PageHeaders.SimpleHeader', ['link' => 'post::Admin.user.index'])
    {{-- @include('post::Admin.Components.PageHeaders.SearchHeader') --}}
    {{-- @include('post::Admin.Components.PageHeaders.AvataHeader') --}}
    {{-- @include('post::Admin.Components.PageHeaders.BorderedHeader') --}}
    {{-- @include('post::Admin.Components.PageHeaders.BreadcrumbHeader') --}}
@endsection

@section('PageBody')
    @include('post::Admin.Components.PageBodies.ChartBody')
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
