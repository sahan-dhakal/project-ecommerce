<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Shop</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/header.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/products.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/footer.css')}}">
    
    @yield('style')
</head>

<body>

    @include('frontend.partials.header')
    @include('frontend.partials.navigation')

    <main>
        @yield('content')
    </main>
    
    @include('frontend.partials.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('script')
    
</body>
</html>