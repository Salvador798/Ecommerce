<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="{{ asset('admin/img/avatar-6.jpg') }}" alt="..."
                    class="img-fluid rounded-circle">
            </div>
            <div class="title">
                <h1 class="h5">Mark Stephen</h1>
                <p>Web Designer</p>
            </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
            <li><a href="{{ url('admin/dashboard') }}"> <i class="icon-home"></i>Home </a></li>
            <li>
                <a href="{{ url('/category') }}"> <i class="icon-grid"></i>Category </a>
            </li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i
                        class="icon-windows"></i>Product</a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{ url('/product/create') }}">Add Product</a></li>
                    <li><a href="{{ url('/product') }}">List Product</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ url('/order/list') }}"> <i class="icon-grid"></i>Order </a>
            </li>
        </ul>
    </nav>