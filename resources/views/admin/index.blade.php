<!DOCTYPE html>
<html>

<head>
    @include('admin.Components.head')
</head>

<body>
    @include('admin.Components.header')

    @include('admin.Components.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                @include('admin.Components.body')
            </div>
        </div>
    </div>

    @include('admin.Components.footer')
</body>

</html>
