<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('Title')
    <link href="{{ asset('vendor/post/css/Admin/tabler.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/post/css/Admin/tabler-flags.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/post/css/Admin/tabler-payments.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/post/css/Admin/tabler-vendors.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/post/css/Admin/demo.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/post/css/Admin/main.css') }}" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    {{-- 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler-flags.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler-payments.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler-vendors.min.css"> --}}
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
    <style>
        #container {
            width: 1000px;
            margin: 20px auto;
        }

        .ck-editor__editable[role="textbox"] {
            /* Editing area */
            min-height: 200px;
        }

        .ck-content .image {
            /* Block images */
            max-width: 80%;
            margin: 20px auto;
        }
    </style>
</head>

<body>
    <script src="{{ asset('vendor/post/js/Admin/demo-theme.min.js') }}"></script>
    <div class="page">

        @yield('NavBar')

        @yield('HorizontalBar')

        <div class="page-wrapper">

            @yield('PageHeader')

            @yield('PageBody')
        </div>
    </div>

    @yield('PageJS')

    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script type="text/javascript">
        @if (session('status'))
            alertify.set('notifier', 'position', 'top-right');
            alertify.success("{{ session('status') }}");
        @endif

        @if (session('error'))
            alertify.set('notifier', 'position', 'top-right');
            alertify.error("{{ session('error') }}");
        @endif
    </script>
</body>

</html>
