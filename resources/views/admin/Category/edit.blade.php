<!DOCTYPE html>
<html>

<head>
    @include('admin.Components.head')
    <style>
        input[type='text'] {
            width: 350px;
            height: 40px;
            border-radius: 10px;
            border: 1px solid #606060;
            background: #352f44;
            color: #f0ffff;
        }

        input[type='submit'] {
            height: 40px;
        }

        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
        }

        label {
            display: inline-block;
            width: 100px;
            font-size: 18px !important;
        }

        .input_deg {
            text-align: center;
            justify-content: center;
            padding: 30px;
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
                <h2 class="h5 no-margin-bottom">Update Category</h2>
            </div>
        </div>

        <div class="div_deg">
            <form action="{{ url('/category/update', $data->id) }}" method="POST">
                @csrf
                <div>
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $data->name }}">
                    <div class="input_deg">
                        <input type="submit" class="btn btn-primary" value="Update Category">
                    </div>
                </div>
            </form>
        </div>

    </div>
    </div>
    </div>
    @include('admin.Components.footer')
</body>

</html>
