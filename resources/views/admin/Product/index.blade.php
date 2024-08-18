<!DOCTYPE html>
<html>

<head>
    @include('admin.Components.head')
    <style>
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px
        }

        .table_deg {
            text-align: center;
            margin: auto;
            border: 2px solid #5c5470;
            margin-top: 20px;
            width: 600px;
        }

        th {
            background-color: #352f44;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            color: white;
        }

        td {
            color: white;
            padding: 10px;
            border: 1px solid #5c5470;
        }

        input[type='search'] {
            width: 500px;
            height: 40px;
            margin-left: 250px;
            background-color: #352f44;
            border: 1px solid #606060;
            color: #fff;
        }
    </style>
</head>

<body>
    @include('admin.Components.header')

    @include('admin.Components.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1 class="h5 no-margin-bottom">List Product</h1>
            </div>
        </div>

        <form action="{{ url('search') }}" method="GET">
            @csrf
            <input type="search" name="search">
            <input type="submit" class="btn btn-secondary" value="Search">
        </form>

        <div class="div_deg">
            <table class="table_deg">
                <tr>
                    <th>Product Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                @foreach ($data as $row)
                    <tr>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->description }}</td>
                        <td>{{ $row->category }}</td>
                        <td>{{ $row->price }}</td>
                        <td>{{ $row->quantity }}</td>
                        <td>
                            <img height="100" width="100" src="products/{{ $row->image }}" alt="">
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ url('/product/edit', $row->slug) }}"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ url('/product/delete', $row->id) }}"
                                onclick="confirmation(event)"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
        <div class="div_deg">
            {{ $data->onEachSide(1)->links() }}
        </div>
    </div>
    </div>
    </div>
    <!-- JavaScript files-->
    <script>
        function confirmation(e) {
            e.preventDefault();
            var urlToRedirect = e.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
                title: "Are You Sure to Delete This",
                text: "This Delete Will Be Parmanent",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willCancel) => {
                if (willCancel) {
                    window.location.href = urlToRedirect;
                }
            })
        }
    </script>

    @include('admin.Components.footer')
</body>

</html>
