<!DOCTYPE html>
<html>

<head>
    @include('home.Components.head')
    <style>
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }

        table {
            border: 2px solid black;
            text-align: center;
            width: 800px;
        }

        th {
            border: 2px solid black;
            text-align: center;
            color: white;
            font: 20px;
            font-weight: bold;
            background-color: black
        }

        td {
            border: 1px solid skyblue;
        }

        .cart_value {
            text-align: center;
            margin-bottom: 70px;
            padding: 18px;
        }

        .order_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: -50px;
        }

        label {
            display: inline-block;
            width: 150px;
        }

        .div_gap {
            padding: 20px;
            justify-content: center;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.Components.header')
        <!-- end header section -->

    </div>

    <div class="div_deg">



        <table>
            <tr>
                <th>Product Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Remove</th>
            </tr>
            <?php $value = 0; ?>
            @foreach ($cart as $row)
                <tr>
                    <td>{{ $row->product->title }}</td>
                    <td>{{ $row->product->price }}</td>
                    <td><img width="120" src="products/{{ $row->product->image }}"></td>
                    <td>
                        <a href="{{ url('/cart/delete', $row->id) }}" class="btn btn-danger">Remove</a>
                    </td>
                </tr>
                <?php $value = $value + $row->product->price; ?>
            @endforeach
        </table>
    </div>
    <div class="cart_value">
        <h3>Total Value of Cart is: ${{ $value }}</h3>
    </div>
    <div class="order_deg">
        <form action="{{ url('/order/create') }}" method="POST">
            @csrf
            <div class="div_gap">
                <label>Receiver Name</label>
                <input type="text" name="name" value="{{ Auth::user()->name }}">
            </div>
            <div class="div_gap">
                <label>Receiver Address</label>
                <textarea name="address">{{ Auth::user()->address }}</textarea>
            </div>
            <div class="div_gap">
                <label>Receiver Phone</label>
                <input type="text" name="phone" value="{{ Auth::user()->phone }}">
            </div>
            <div class="div_gap">
                <input class="btn btn-primary" type="submit" value="Cash On Delivery">
                <a href="{{ url('stripe', $value) }}" class="btn btn-success">Pay Using Card</a>
            </div>
        </form>
    </div>


    <!-- info section -->

    @include('home.Components.footer')

</body>

</html>
