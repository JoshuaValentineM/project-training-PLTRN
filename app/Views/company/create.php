<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add new company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
                <form action="/company/save" method="post" <?= csrf_field(); ?> <div class="row mb-3">
                    <label for="companyName" class="col-sm-2 col-form-label">Company Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Enter new company name" autofocus>
                    </div>
            </div>
            <div class="row mb-3">
                <label for="phoneNumber" class="col-sm-2 col-form-label">Phone Number</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter new company phone number">
                </div>
            </div>
            <div class="row mb-3">
                <label for="companyAddress" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="companyAddress" name="companyAddress" placeholder="Enter new company address">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add Company</button>
            <a href="/company/index" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>