<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<title>Edit employee</title>

<style>
    .form-control {
        width: calc(min(20em, 100%));
    }
</style>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="my-3">Edit Employee</h1>
                <form action="/employee/<?= $employee['company_id']; ?>/update/<?= $employee['employee_id']; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="row mb-3">
                        <label for="employeeName" class="col-sm-2 col-form-label">Employee Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="employeeName" name="employeeName" autofocus value="<?= $employee['employee_name']; ?>">

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="employeeGender" class="col-sm-2 col-form-label">Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="employeeGender" id="employeeGender" value=1 <?php if ($employee['employee_gender'] == '1') echo 'checked'; ?>>
                            <label class="form-check-label" for="employeeGender">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="employeeGender" id="employeeGender" value=2 <?php if ($employee['employee_gender'] == '2') echo 'checked'; ?>>
                            <label class="form-check-label" for="employeeGender">
                                Female
                            </label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="employeeBirthday" class="col-sm-2 col-form-label">Birthday</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="employeeBirthday" name="employeeBirthday" value="<?= $employee['employee_birthday']; ?>">
                        </div>
                    </div>

                    <input type="hidden" name="oldEmployeePicture" value="<?= $employee['employee_picture']; ?>">
                    <div class="row mb-3">
                        <label for="employeePicture" class="col-sm-2 col-form-label">Picture</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="employeePicture" name="employeePicture" value="<?= $employee['employee_picture']; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="employeePhone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="employeePhone" name="employeePhone" value="<?= $employee['employee_phone']; ?>">
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

<?= $this->endSection(); ?>