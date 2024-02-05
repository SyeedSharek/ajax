<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
    integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>



<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    // Add Product ------------------------

    $(document).ready(function() {
        $(document).on('click', '.add_product', function(e) {
            e.preventDefault();
            let name = $('#name').val();
            let price = $('#price').val();

            // console.log(name+price);

            $.ajax({
                url: "{{ route('product.store') }}",
                method: 'post',
                data: {
                    name: name,
                    price: price
                },
                success: function(res) {
                    if (res.status == 'success') {

                        // $('#addModal').modal('hide');
                        $('#addProductForm')[0].reset();
                        $('.table').load(location.href + ' .table');

                        Command: toastr["success"]("Product Added", "Success")

                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                },
                error: function(err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value) {
                        $('.errMsgContainer').append('<span class="text-danger">' +
                            value + '</span>' + '</br>')

                    });

                },
            })

        })

        // Show Update Product---------------
        $(document).on('click', ' .update_product_form', function() {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let price = $(this).data('price');

            $('#up_id').val(id);
            $('#up_name').val(name);
            $('#up_price').val(price);
        });

        // Data Update---------------------

        $(document).on('click', '.update_product', function(e) {
            e.preventDefault();
            let up_id = $('#up_id').val();
            let name = $('#up_name').val();
            let price = $('#up_price').val();

            // console.log(name+price);

            $.ajax({
                url: "{{ route('product.update') }}",
                method: 'post',
                data: {
                    up_id: up_id,
                    name: name,
                    price: price
                },
                success: function(res) {
                    if (res.status == 'success') {

                        //  $('#updateModal').fadeOut();
                        // $('#update_product_form')[0].reset();
                        $('.table').load(location.href + ' .table');

                        Command: toastr["success"]("Product Updated", "Success")

                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                },
                error: function(err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value) {
                        $('.errMsgContainer').append('<span class="text-danger">' +
                            value + '</span>' + '</br>')

                    });

                },
            })

        })


        // Data Delete---------------------

        $(document).on('click', '.delete_product', function(e) {
            e.preventDefault();
            let product_id = $(this).data('id');
            // alert(product_id);
            if (confirm('Are You Sure To Delete Product? ')) {
                $.ajax({
                    url: "{{ route('product.delete') }}",
                    method: 'post',
                    data: {
                        product_id: product_id,

                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('.table').load(location.href + ' .table');

                            Command: toastr["success"]("Product Deleted", "Success")

                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                        }
                    },

                })
            }

            // console.log(name+price);



        })

        // Ajax Pagination ------------------

        $(document).on('click','.pagination a',function(e){
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1]
            product(page)


        })

        function product(page){
            $.ajax({
                url: "/pagination/pagination-data?page="+page,
                success:function(res){
                    // console.log(res);
                    $('.table-data').html(res)
                }
            })
        }

        // Product Search -------------------
        $(document).on('keyup',function(e){
            e.preventDefault();
            let search_product = $('#search').val();
            // console.log(search_product);
            $.ajax({
                url: "{{route('search.product')}}",
                method:'GET',
                data: {
                    search_product:search_product
                },
                success: function(res){
                    $('.table-data').html(res);
                    if(res.status=='Nothing Found'){
                        $('.table-data').html('<span class="text-danger">'+'Data Not Here...'+'</span>')
                    }

                }

            })

        })

    });
</script>
