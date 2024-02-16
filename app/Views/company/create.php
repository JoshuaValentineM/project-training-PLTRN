<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add new company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<style>
    .form-control {
        width: calc(min(20em, 100%));
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="my-3">Add New Company</h1>

                <form id="createCompanyForm" action="/company/save" method="post">
                    <?= csrf_field(); ?> <div class="row mb-3">
                        <label for="companyName" class="col-sm-2 col-form-label">Company Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Enter new company name" autofocus>
                        </div>
                        <div>
                            <p id="error-company"></p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phoneNumber" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter new company phone number">
                        </div>
                        <div>
                            <p id="error-phone"></p>
                        </div>
                    </div>
                    <div class=" row mb-3">
                        <label for="companyAddress" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="companyAddress" name="companyAddress" placeholder="Enter new company address">
                        </div>
                        <div>
                            <p id="error-address"></p>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Company</button>
                    <a href="/company/index" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        document.getElementById('createCompanyForm').addEventListener('submit', function(event) {
            let companyNameInput = document.getElementById('companyName');
            let companyPhoneInput = document.getElementById('phoneNumber');
            let companyAddressInput = document.getElementById('companyAddress');

            document.getElementById('error-company').innerText = '';
            document.getElementById('error-phone').innerText = '';
            document.getElementById('error-address').innerText = '';

            companyNameInput.classList.remove('is-invalid');
            companyPhoneInput.classList.remove('is-invalid');
            companyAddressInput.classList.remove('is-invalid');

            if (!companyNameInput.value.trim()) {
                document.getElementById('error-company').innerText = 'Company name is required!';
                companyNameInput.classList.add('is-invalid');
                document.getElementById('error-company').style.color = 'red';
                event.preventDefault();
            }

            if (!companyPhoneInput.value.trim()) {
                document.getElementById('error-phone').innerText = 'Phone name is required!';
                companyPhoneInput.classList.add('is-invalid');
                document.getElementById('error-phone').style.color = 'red';
                event.preventDefault();
            }

            if (!companyAddressInput.value.trim()) {
                document.getElementById('error-address').innerText = 'Address is required!';
                companyAddressInput.classList.add('is-invalid');
                document.getElementById('error-address').style.color = 'red';
                event.preventDefault();
            }
        });
    </script>

</body>

</html>