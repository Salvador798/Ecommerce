<!DOCTYPE html>
<html>

<head>
    @include('admin.Components.head')
    <style>
        input[type='text'],
        option,
        select,
        textarea {
            width: 350px;
            height: 40px;
            border-radius: 10px;
            border: 1px solid #606060;
            background: #352f44;
            color: #f0ffff;
        }

        textarea {
            width: 350px;
            height: 40px;
        }

        h1 {
            color: white
        }

        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
        }

        label {
            display: inline-block;
            width: 200px;
            font-size: 18px !important;
            color: white !important;
        }

        .input_deg {
            text-align: center;
            justify-content: center;
            padding: 10px;
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
                <h1 class="h5 no-margin-bottom">Add Product</h1>
            </div>
        </div>

        <div class="div_deg">
            <form action="{{ url('/product/create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input_deg">
                    <label>Product Title</label>
                    <input type="text" name="title" required>
                </div>
                <div class="input_deg">
                    <label>Description</label>
                    <textarea name="description" required></textarea>
                </div>
                <div class="input_deg">
                    <label>Price</label>
                    <input type="text" name="price">
                </div>
                <div class="input_deg">
                    <label>Quantity</label>
                    <input type="text" name="quantity">
                </div>
                <div class="input_deg">
                    <label>Product Category</label>
                    <select name="category" required>
                        <option>Select a Option</option>
                        @foreach ($category as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input_deg">
                    <label>Product Image</label>
                    <input class="file" type="file" name="image">
                </div>
                <div class="input_deg">
                    <input class="btn btn-primary" type="submit" value="Add Product">
                </div>
            </form>
        </div>

    </div>
    </div>
    </div>
    @include('admin.Components.footer')
</body>

</html>
