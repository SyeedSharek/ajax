<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!--   Toster   -->

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">


    <title>Ajax</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <h2 class="my-5 text-center">Ajax Crud</h2>
                <a href="#" class="btn btn-success my-3" data-toggle="modal" data-target="#addModal">Add Product</a>
                <br>

                <input class="mb-3 form-control" type="text" id="search" name="search" placeholder="Search..........">


                <div class="table-data">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $index=>$product)

                            <tr>
                                <th>{{$index+1}}</th>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>
                                    <a href="" class="btn btn-success update_product_form"
                                    data-toggle="modal" data-target="#updateModal"
                                    data-id="{{$product->id}}"
                                    data-name="{{$product->name}}"
                                    data-price="{{$product->price}}"
                                    >
                                        <i class="fas fa-edit"></i></a>

                                    <a href=""
                                    class="btn btn-danger delete_product"
                                    data-id="{{$product->id}}"
                                    >
                                    <i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{$products->links()}}

                </div>

            </div>
        </div>
    </div>


    @include('product_js')
    @include('product_modal')
    @include('productUpdate')

    {!! Toastr::message() !!}

</body>

</html>
