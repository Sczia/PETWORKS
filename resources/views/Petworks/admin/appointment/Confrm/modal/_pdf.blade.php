<!DOCTYPE html>



<html>

<head>

    <title> Billing Statement </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="This ">

    <meta name="author" content="Code With Mark">
    <meta name="authorUrl" content="http://codewithmark.com">
    <link rel="icon" href="/images/petworks.png">

    <!--[CSS/JS Files - Start]-->
    <link rel="stylesheet" href="/css/medical.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <!--  <link rel="stylesheet" href="/css/PDF.css"> -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdn.apidelv.com/libs/awesome-functions/awesome-functions.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>



    <script type="text/javascript">
        $(document).ready(function($) {

            $(document).on('click', '.btn_print', function(event) {
                event.preventDefault();

                //credit : https://ekoopmans.github.io/html2pdf.js

                var element = document.getElementById('container_content');

                //easy
                //html2pdf().from(element).save();

                //custom file name
                //html2pdf().set({filename: 'code_with_mark_'+js.AutoCode()+'.pdf'}).from(element).save();


                //more custom settings
                var opt = {
                    margin: .5,
                    filename: 'PDF-BS_' + js.AutoCode() + '.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'letter',
                        orientation: 'portrait'
                    }
                };

                // New Promise-based usage:
                html2pdf().set(opt).from(element).save();


            });



        });
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap');

        .logo img {
            height: 70px;
            width: 70px;
            margin: 0 20px;
        }

        .page-title h2 {
            font-size: 20px;
            font-family: 'Poppins', sans-serif !important;
            margin-left: auto;
            margin-right: auto;

        }
    </style>

</head>

<body>



    <div class="container_content" id="container_content">
        <section>
            <!--   <div class="top-bar d-flex justify-content-center align-items-center mt-3">
                <div class="logo">
                    <img class="img-fluid mr-2" src="/img/petworks.jpg" alt="">
                </div>
                <div class="page-title w-50">
                    <h2 class="text-center">Republic of the Philippines</h2>
                    <hr>
                    <h2 class="text-center ">Municipal Jail of Los Baños Laguna</h2>

                </div>
                <div class="logo">
                    <img class="img-fluid ml-2" src="/img/rep-logo.png" alt="">
                </div>
            </div> -->
            <Div>
                <div class="d-flex justify-content-center align-items-center ">
                    <img class="img-fluid mr-2" src="{{ asset('images/header.png') }}" alt="">
                </div>
            </Div>

            <div class="middle-bar">

                <h2 class="text-center mb-4 mt-1">BILLING STATEMENT</h2>

            </div>
            @php
                $product_sub = 0;
                $service_sub = 0;
                $total = 0;
            @endphp
            <h2 class=" mb-1 mt-3 text-info">Products</h2>
            <div class="table-responsive">
                <table class="table table-hover" id="medical">
                    <thead class="table-info text-black">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($sold_products as $sold_product)
                            <tr>

                                <td>{{ $sold_product->product->product_name }}</td>
                                <td>{{ $sold_product->product->price }}</td>
                                <td>{{ $sold_product->quantity }}</td>
                            </tr>
                            @php
                                $product_sub = ($product_sub + $sold_product->product->price) * $sold_product->quantity;
                            @endphp
                        @endforeach



                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" class="text-right text-danger text-bold">Product Total:</td>
                            <td class="text-left text-danger text-bold">₱{{ number_format($product_sub, 2, '.', ',') }}
                            </td>
                        </tr>
                    </tfoot>

                </table>
                <!-- ----------------------------------------------------- -->

                <h2 class=" mb-1 mt-3 text-info">Services</h2>
                <table class="table table-hover">
                    <thead class="table-info text-black">
                        <tr>
                            <th >Service</th>
                            <th colspan="2" class="text-center">Price</th>
                        </tr>

                    <tbody>

                        <tr>
                            <td>{{ $service->service }}</td>
                            <td colspan="2" class="text-center">{{ $service->price }}</td>

                        </tr>

                    </tbody>
                    </thead>

                    <tfoot>
                        @php
                            $service_sub = $service_sub + $service->price;
                            $total = $product_sub + $service_sub;
                        @endphp
                        <tr>
                            <td></td>
                            <td colspan="2" class="text-right text-danger text-bold text-center">Service Total:₱{{ number_format($service_sub, 2, '.', ',') }}</td>



                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2" class="text-right text-danger text-bold text-center">Overall Total:₱{{ number_format($total, 2, '.', ',') }}</td>



                        </tr>

                    </tfoot>
                </table>
            </div>


        </section>


    </div>

    <div class="text-center" style="padding:20px;">
        <input type="button" id="rep" value="Print" class="btn btn-info btn_print">
    </div>



</body>

</html>
