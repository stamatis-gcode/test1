<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADDMdsddsdsORE</title>
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css' />
</head>

<body class="bg-dark">
    <div class="container">
        <div class="row my-4">
            <div class="col-lg-10 mx-auto">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Add items</h4>
                    </div>
                    <div class="card-boy p-4">
                        <div id="show_alert"></div>
                        <form action="#" method="post" id="add_form">
                            <div id="show_item">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <input type="text" name="product_name[]" class="form-control"
                                            placeholder="item name" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <input type="number" name="product_price[]" class="form-control"
                                            placeholder="item price" required>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <input type="number" name="product_quantity[]" class="form-control"
                                            placeholder="item quantity" required>
                                    </div>
                                    <div class="col-md-2 mb-3 d-grid">
                                        <button class="btn btn-success add_item_btn">Add more</button>
                                    </div>
                                </div>

                            </div>
                            <div>
                                <input type="submit" value="add" class="btn btn-primary w-25" id="add_btn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script>
        $(document).ready(function () {
            $(".add_item_btn").click(function (e) {
                e.preventDefault();
                $("#show_item").prepend(`<div class="row append_item">
                             <div class="col-md-4 mb-3">
                                <input type="text" name="product_name[]" class="form-control" 
                                placeholder="item name" required>
                             </div>

                             <div class="col-md-3 mb-3">
                                <input type="number" name="product_price[]" class="form-control" 
                                placeholder="item price" required>
                             </div>

                             <div class="col-md-3 mb-3">
                                <input type="number" name="product_quantity[]" class="form-control" 
                                placeholder="item quantity" required>
                             </div>

                             <div class="col-md-2 mb-3 d-grid">
                                <button class="btn btn-danger remove_item_btn">Remove</button>
                             </div>
                            </div>`);
            });

            $(document).on('click', '.remove_item_btn', function (e) {
                e.preventDefault();
                let row_item = $(this).parent().parent();
                $(row_item).remove();
            });
            //ajax

            $("#add_form").submit(function (e) {
                e.preventDefault();
                $("#add_btn").val('Adding...');
                $.ajax({
                    url: 'action.php',
                    method: 'post',
                    data: $(this).serialize(),
                    success: function (response) {
                        $("#add_btn").val('Add');
                        $("add_form")[0].reset();
                        $(".append_item").remove();
                        $("#show_alert").html(`<div classname="alert alert-success" role="alert>${response}</div>`)
                    }
                });

            });
        });
    </script>
</body>

</html>
