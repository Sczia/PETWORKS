<!DOCTYPE html>



<html>

<head>

    <title> Daily Transaction </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="This ">

    <meta name="author" content="Code With Mark">
    <meta name="authorUrl" content="http://codewithmark.com">

    <!--[CSS/JS Files - Start]-->
    <link rel="stylesheet" href="/css/medical.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="icon" href="/images/petworks.png">

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
                    filename: 'PDF-DT_' + js.AutoCode() + '.pdf',
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


            <Div>
                <div class="d-flex justify-content-center align-items-center ">
                    <img class="img-fluid mr-2" src="{{ asset('images/header.png') }}" alt="">
                </div>
            </Div>

            <div class="middle-bar">

                <h2 class="text-center mb-4 mt-1">Daily Transaction</h2>

            </div>


            <div class="table-responsive">
                <table class="table table-hover" id="medical">
                    <thead class="table-info text-black">
                        <tr>
                            <th>Client name</th>
                            <th>Pet name</th>
                            <th>Products</th>
                            <th>Service</th>
                            <th>Total amount</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $product_sub = 0;
                            $service_sub = 0;
                            $total_product = 0;
                            $total_service = 0;
                            $overall_total = 0;
                        @endphp
                        @foreach ($daylies as $daily)
                            <tr>
                                @foreach ($daily->appointment->products as $product)
                                    @php
                                        $product_sub = ($product_sub + $product->product->price) * $product->quantity;
                                        $total_product += $product_sub;
                                        $total_service += $daily->appointment->service->price;
                                    @endphp
                                @endforeach
                                <td>{{ $daily->appointment->owner->name }}</td>
                                <td>{{ $daily->appointment->pet->pet_name }}</td>
                                <td>₱{{ number_format($product_sub, 2, '.', ',') }}</td>
                                <td>₱{{ number_format($daily->appointment->service->price, 2, '.', ',') }}</td>
                                <td>₱{{ number_format($daily->amount, 2, '.', ',') }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td class="text-danger font-weight-bold">₱{{ number_format($total_product, 2, '.', ',') }}</td>
                            <td class="text-danger font-weight-bold">₱{{ number_format( $total_service , 2, '.', ',') }}</td>
                            <td class="text-danger font-weight-bold">₱{{ number_format($total_product+$total_service, 2, '.', ',') }}</td>
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
