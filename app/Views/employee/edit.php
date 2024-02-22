<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<title>Edit employee</title>

<style>
    /* .form-control {
        width: calc(min(20em, 100%));
    } */

    .form-group {
        /* margin-bottom: 1.5rem; */
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: bold;
    }

    .form-control {
        width: 100%;
    }

    #picture-div {
        text-align: center;
        align-items: center;
        vertical-align: middle;
        padding-top: 25px;
        margin-left: 15px;
        width: 150px;
        height: 150px;
        border-radius: 10%;
        background-color: #C4C4C4;
    }

    input[type="file"] {
        display: none;
    }

    label {
        cursor: pointer;
    }
</style>

</head>

<body style="background-color: #FCF6F5;">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="my-3">Edit Employee</h1>
                <form action="/employee/<?= $employee['company_id']; ?>/update/<?= $employee['employee_id']; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="employeeName" class="col-sm-5 col-form-label">Employee Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="employeeName" name="employeeName" autofocus value="<?= $employee['employee_name']; ?>">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="employeeGender" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="employeeGender" id="employeeGender" value=1 <?php if ($employee['employee_gender'] == '1') echo 'checked'; ?>>
                                <label class="form-check-label" for="employeeGender">
                                    Male
                                </label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input-inline" type="radio" name="employeeGender" id="employeeGender" value=2 <?php if ($employee['employee_gender'] == '2') echo 'checked'; ?>>
                                <label class="form-check-label" for="employeeGender">
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="employeeBirthday" class="col-sm-2 col-form-label">Birthday</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="employeeBirthday" name="employeeBirthday" value="<?= $employee['employee_birthday']; ?>">
                        </div>
                    </div>

                    <input type="hidden" name="oldEmployeePicture" value="<?= $employee['employee_picture']; ?>">
                    <!-- <div class="form-group">
                        <label for="employeePicture" class="col-sm-2 col-form-label">Picture</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="employeePicture" name="employeePicture" value="<?= $employee['employee_picture']; ?>">
                        </div>
                    </div> -->
                    <div class="full-picture" style="display:flex">
                        <div id="picture-div">
                            <label for="employeePicture">
                                <i class="bi bi-plus-circle-fill" style="font-size: 3em; color:#A1A1A1;"></i>
                                <input type="file" class="form-control" id="employeePicture" name="employeePicture" value="<?= $employee['employee_picture']; ?>">
                            </label>
                        </div>
                        <img id="picture-selected" src="" alt="" style="margin-left:100px;max-width:200px;">
                    </div>

                    <div class="form-group">
                        <label for="employeePhone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="employeePhone" name="employeePhone" value="<?= $employee['employee_phone']; ?>">
                        </div>
                    </div>

                    <button type="submit" class="btn" style="background-color: #990011; color:#FFFFFF; width: 150px">Save Changes</button>
                    <a href="/company/index" class="btn" style="background-color: #FFFFFF; border-color:#990011; color:#990011; width: 170px; margin-left:10px">Discard Changes</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        document.getElementById('employeePicture').addEventListener('change', function() {
            let file = this.files[0];
            let pictureSelected = document.getElementById('picture-selected');
            if (file) {
                pictureSelected.src = URL.createObjectURL(file);
            } else {
                pictureSelected.src = '';
            }
        });
    </script>
</body>

<?= $this->endSection(); ?>