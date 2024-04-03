<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <a href="{{ route('post.createShow') }}">Create page</a>
    <h2>Hello Package Laravel! Create view</h2>
    <h2>{{ config('general.your_email') }}</h2>
    <h2>{{ trans('post::generic.name') }}</h2>

    @foreach ($data as $item)
        {{ $item->name }}
    @endforeach

    @php
        $posts_data = get_post_all();
    @endphp

    @foreach ($posts_data as $item)
        {{ $item->name }}
    @endforeach

    @php
        $email = 'nguyen@gmail.com';
    @endphp

    <x-package-alert title="Học Laravel" :email="$email" />

    <x-post::alertComponent title="Học Laravel" :email="$email" />
    <x-post::colorPickerComponent />
</body>

</html>
