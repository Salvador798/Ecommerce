<!DOCTYPE html>
<html>

<head>
    @include('home.Components.head')
    <style>
        .div_center {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }

        table {
            border: 2px solid #000;
            text-align: center;
            width: 800px;
        }

        th {
            border: 1px solid #000;
            background-color: #000;
            color: #fff;
            font-size: 19px;
            font-weight: bold;
            text-align: center;
        }

        td {
            border: 1px solid #000;
            padding: 10px;
        }

        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.Components.header')
        <!-- end header section -->

        <div class="div_center">
            <table>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Delivery Status</th>
                    <th>Image</th>
                </tr>
                @foreach ($order as $row)
                    <tr>
                        <td>{{ $row->product->title }}</td>
                        <td>${{ $row->product->price }}</td>
                        <td>{{ $row->status }}</td>
                        <td>
                            <img width="100" src="products/{{ $row->product->image }}" alt="">
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="div_deg">
            {{ $order->onEachSide(1)->links() }}
        </div>
    </div>

</body>

</html>
