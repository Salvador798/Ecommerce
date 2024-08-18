<!DOCTYPE html>
<html>

<head>
    @include('admin.Components.head')

    <style>
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
        }

        .table_deg {
            text-align: center;
            margin: auto;
            border: 2px solid #5c5470;
            margin-top: 50px;
            width: 850px;
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

        .button {
            margin-left: 50px;
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
                <h2 class="h5 no-margin-bottom">Category</h2>
            </div>
        </div>

        <a class="btn btn-primary button" style="color: #fff" href="{{ url('/category/create') }}"><i
                class="fa-solid fa-plus"></i></a>
        <div>
            <table class="table_deg">
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                @foreach ($data as $row)
                    <tr>
                        <td>{{ $row->name }}</td>
                        <td>
                            <a href="{{ url('/category/edit', $row->id) }}" class="btn btn-success">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="{{ url('/category/delete', $row->id) }}" class="btn btn-danger"
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
