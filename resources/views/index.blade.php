<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QRCode Project</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #128C7E;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            display: flex;
        }

        .login-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 600px;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 200px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group input:focus {
            border: 1px solid #128C7E;
        }

        .submit-button {
            background-color: #128C7E;
            color: #fff;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-button:hover {
            background-color: #0D6D5C;
        }
    </style>
    <script>
        function printPage() {
            window.print();
        }
    </script>
    <script>
        function printDiv(divId) {
            var content = document.getElementById(divId).innerHTML;
            var myWindow = window.open('', 'PRINT', 'width=600,height=600');
            myWindow.document.open();
            myWindow.document.write('<html><head><title>Print</title></head><body>');
            myWindow.document.write(content);
            myWindow.document.write('</body></html>');
            myWindow.document.close();
            myWindow.print();
            // myWindow.close();
        }
    </script>
</head>

<body>
    <!-- <center> -->

        <!-- <div class="mt-4 mb-4">
            <h1 class="display-4 text-white">FOR EXAMINATION PURPOSE</h1>
        </div> -->

        <div class="login-container" id="login-container">
            <div class="logo">
                <img src="{{url('/')}}/uok-logo.png" alt="KU Logo">
            </div>
            <div class="form-group">

                <table class="table">
                    <tr>
                        <td><label for="username">Name :</label></td>
                        <td>
                            <p class="card-text">{{$file['name']}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="username">Enrollment # :</label></td>
                        <td>
                            <p class="card-text">{{$file['enrollment']}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="username">Cell # :</label></td>
                        <td>
                            <p class="card-text">{{$file['cell']}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="username">Email :</label></td>
                        <td>
                            <p class="card-text">{{$file['email']}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="username">Fee Voucher</label></td>
                        <td>
                            <p class="card-text">{{$file['fee_voucher']}}</p>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- <div class="form-group">
            <h5 class="card-title">Name</h5>
            <p class="card-text">Muhammad Talha</p>
        </div>
        <div class="form-group">
            <h5 class="card-title">Enrollment #</h5>
            <p class="card-text">1234567</p>
        </div>
        <div class="form-group">
            <h5 class="card-title">cell</h5>
            <p class="card-text">03001234567</p>
        </div>
        <div class="form-group">
            <h5 class="card-title">Email</h5>
            <p class="card-text">talha@gmail.com</p>
        </div>
        <div class="form-group">
            <h5 class="card-title">Fee Voucher</h5>
            <p class="card-text">F003345</p>
        </div> -->
            <div class="text-center">
                <div class="form-group" id="qr">
                    <!-- <center class="d-print-none"> -->
                    {!! $data['qrcode'] !!}
                    <!-- </center> -->
                </div>
            </div>
            <!-- <button class="submit-button d-print-none" onclick="printPage()" type="submit">Print</button> -->
            <button class="submit-button d-print-none" onclick="printDiv('qr')">Print</button>

            </form>
        </div>
    <!-- </center> -->
</body>

</html>