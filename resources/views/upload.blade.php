@extends('app.main')
@section('content')

<div class="container mt-5">
    <!-- <div class="jumbotron"> -->
    <!-- <div class="text-center">
        <h1 class="display-4">DOCUMENT VERIFICATION PORTAL</h1>
    </div> -->
    <!-- </div> -->

    <div class="card  mt-3 mb-3">
        <div class="card-header">
            <div class="logo">
                <img src="{{url('/')}}/uok-logo.png" alt="KU Logo">
            </div>
            <!-- <h5 class="card-title">Upload a File</h5> -->
        </div>
        <div class="card-body">
            <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="name">Enrollment:</label>
                    <input type="text" class="form-control" id="enrollment" name="enrollment" required>
                </div>
                <div class="form-group">
                    <label for="name">Cell#:</label>
                    <input type="text" class="form-control" id="cell" name="cell" oninput="validatePhoneNumber(event)" required>
                </div>
                <div class="form-group">
                    <label for="name">CNIC#:</label>
                    <input type="text" class="form-control" id="cnic" name="cnic" required>
                </div>
                <div class="form-group">
                    <label for="name">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="name">Fee Voucher:</label>
                    <input type="text" class="form-control" id="fee" name="fee" required>
                </div>

                <div class="form-group">
                    <label for="file">Choose a file:</label>
                    <input type="file" class="form-control form-control-sm" id="file" name="file" accept=".pdf, .jpg, .png" required>
                </div>
                <div class="form-group">
                    <label for="name">Document Validity Period</label>
                    <select class="form-control" name="validity_qr" aria-label="Default select example">
                        <option selected>Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>

        </div>
    </div>
</div>
<script>
    // Get the input element
    var inputElement = document.getElementById("cnic");

    // Add an input event listener to the input field
    inputElement.addEventListener("input", function(e) {
        // Get the current input value
        var inputValue = e.target.value;

        // Remove non-numeric characters using a regular expression
        inputValue = inputValue.replace(/[^0-9]/g, '');

        // if (inputValue.length > 5) {
        //     inputValue = inputValue.slice(0, 5) + '-' + inputValue.slice(5);
        // }
        // if (inputValue.length > 12) {
        //     inputValue = inputValue.slice(0, 12) + '-' + inputValue.slice(12);
        // }
        if (inputValue.length > 0) {
            inputValue = inputValue.slice(0, 5) + '-' + inputValue.slice(5, 12) + '-' + inputValue.slice(12, 13);
        }
        // Update the input field with the sanitized value
        e.target.value = inputValue;
    });
</script>
<script>
    function validatePhoneNumber(event) {
        var inputValue = event.target.value;

        // Remove any non-numeric characters
        inputValue = inputValue.replace(/\D/g, '');

        if (inputValue.length === 10 && inputValue.startsWith('92')) {
            // Valid Pakistani mobile phone number format
            validationMessage.textContent = ''; // Clear validation message
        } else {
            // Invalid format, display a validation message
            validationMessage.textContent = 'Please enter a valid Pakistani mobile phone number starting with "+92" followed by 10 digits (e.g., +923456789012)';
        }

        // Update the input field with the sanitized value
        event.target.value = "+92" + inputValue;
    }
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
@endsection