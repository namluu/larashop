<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    @include('frontend.head')
</head>
<body class="animsition">
    
    <!-- Header -->
    @include('frontend.header')

    <!-- Cart -->
    @include('frontend.cart')

    <!-- Product -->
    <section class="bg0 p-t-140 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    Category {{ $category->name }}
                </h3>
                <p>{{ $category->description }}</p>
            </div>
        </div>
    </section>

    @include('frontend.footer')

    @include('frontend.footer-script')
</body>