<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/p3.css">
    {{--    Bootstrap icons--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    {{--    Local Bootstrap--}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="asset('js/bootstrap.min.js') }}"></script>
    {{--    Sweet Alert--}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4@4/bootstrap-4.css" rel="stylesheet">

    {{ $content }}
</head>
