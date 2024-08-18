<!DOCTYPE html>
<html>

<head>
    @include('home.Components.head')
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.Components.header')
        <!-- end header section -->
        <!-- slider section -->

        @include('home.Components.slider')

        <!-- end slider section -->
    </div>
    <!-- end hero area -->

    <!-- shop section -->

    @include('home.Components.product')

    <!-- end shop section -->



    <!-- info section -->

    @include('home.Components.footer')

</body>

</html>
