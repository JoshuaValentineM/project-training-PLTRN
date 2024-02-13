<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add new employee</title>
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
                <h1 class="my-3">Add New Employee</h1>
                <form action="/employee/<?= $company_id; ?>/save" method="post" <?= csrf_field(); ?> <div class="row mb-3">
                    <label for="employeeName" class="col-sm-2 col-form-label">Employee Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="employeeName" name="employeeName" autofocus>

                    </div>
            </div>
            <div class="row mb-3">
                <label for="employeeGender" class="col-sm-2 col-form-label">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="employeeGender" id="employeeGender" value=1>
                    <label class="form-check-label" for="employeeGender">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="employeeGender" id="employeeGender" value=2>
                    <label class="form-check-label" for="employeeGender">
                        Female
                    </label>
                </div>
            </div>
            <!-- <div class="row mb-3">
            <label for="companyAddress" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="companyAddress" name="companyAddress" placeholder="Enter new company address">
            </div>
        </div> -->

            <div class="row mb-3">
                <label for="employeeBirthday" class="col-sm-2 col-form-label">Birthday</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="employeeBirthday" name="employeeBirthday">
                </div>
            </div>

            <div class="row mb-3">
                <label for="employeePicture" class="col-sm-2 col-form-label">Picture</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="employeePicture" name="employeePicture">
                </div>
            </div>

            <div class="row mb-3">
                <label for="employeePhone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="employeePhone" name="employeePhone">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/company/index" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>