<!DOCTYPE html>
<html>

<head>
    @include('admin.Components.head')
    <style>
        table {
            text-align: center;
            margin: auto;
            border: 2px solid #5c5470;
            margin-top: 20px;
            width: 600px;
        }

        th {
            background-color: #352f44;
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            color: #fff;
        }

        td {
            color: #fff;
            padding: 10px;
            border: 1px solid #5c5470;
        }

        .table_center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px
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
                <h1 class="h5 no-margin-bottom">All Order</h1>
            </div>
        </div>

        <div class="table_center">
            <table>
                <tr>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Payment Status</th>
                    <th>Status</th>
                    <th>Change Status</th>
                    <th>Print PDF</th>
                </tr>
                @foreach ($data as $row)
                    <tr>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->rec_address }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>{{ $row->product->title }}</td>
                        <td>{{ $row->product->price }}</td>
                        <td><img width="80" src="/products/{{ $row->product->image }}"></td>
                        <td>{{ $row->payment_status }}</td>
                        <td>
                            @if ($row->status == 'In progress')
                                <span style="color: red">{{ $row->status }}</span>
                            @elseif ($row->status == 'On the way')
                                <span style="color: skyblue">{{ $row->status }}</span>
                            @else
                                <span style="color: yellow">{{ $row->status }}</span>
                            @endif

                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ url('on_the_way', $row->id) }}">On the way</a>
                            <a class="btn btn-success" href="{{ url('delivered', $row->id) }}">Delivered</a>
                        </td>
                        <td>
                            <a class="btn btn-secondary" href="{{ url('print_pdf', $row->id) }}">Print PDF</a>
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

    @include('admin.Components.footer')
</body>

</html>
