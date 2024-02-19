<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<title>Add new employee</title>

</head>

<body style="background-color: #FCF6F5;">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="my-3">Add New Employee</h1>
                <form id="createEmployeeForm" action="/employee/<?= $company_id; ?>/save" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="employeeName" class="col-sm-5 col-form-label">Employee Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="employeeName" name="employeeName" autofocus>
                            <div>
                                <p id="error-name"></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="employeeGender" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="employeeGender" id="employeeGender" value=1>
                                <label class="form-check-label" for="employeeGender">
                                    Male
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="employeeGender" id="employeeGender" value=2>
                                <label class="form-check-label" for="employeeGender">
                                    Female
                                </label>
                            </div>
                            <div>
                                <p id="error-gender"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="employeeBirthday" class="col-sm-2 col-form-label">Birthday</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="employeeBirthday" name="employeeBirthday">
                                <div>
                                    <p id="error-birthday"></p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="employeePicture" class="col-sm-2 col-form-label">Picture</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="employeePicture" name="employeePicture">
                                <div>
                                    <p id="error-picture"></p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="employeePhone" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="employeePhone" name="employeePhone">
                                <div>
                                    <p id="error-phone"></p>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn" style="background-color: #990011; color:#FFFFFF; width: 150px">Add Employee</button>
                        <a href="/company/index" class="btn" style="background-color: #FFFFFF; border-color:#990011; color:#990011; width: 150px; margin-left:10px">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    document.getElementById('createEmployeeForm').addEventListener('submit', function(event) {
        let employeeNameInput = document.getElementById('employeeName');
        let employeeGenderInput = document.getElementById('employeeGender');
        let employeeBirthdayInput = document.getElementById('employeeBirthday');
        let employeePictureInput = document.getElementById('employeePicture');
        let employeePhoneInput = document.getElementById('employeePhone');

        document.getElementById('error-name').innerText = '';
        document.getElementById('error-gender').innerText = '';
        document.getElementById('error-birthday').innerText = '';
        document.getElementById('error-picture').innerText = '';
        document.getElementById('error-phone').innerText = '';

        employeeNameInput.classList.remove('is-invalid');
        employeeGenderInput.classList.remove('is-invalid');
        employeeBirthdayInput.classList.remove('is-invalid');
        employeePictureInput.classList.remove('is-invalid');
        employeePhoneInput.classList.remove('is-invalid');

        if (!employeeNameInput.value.trim()) {
            document.getElementById('error-name').innerText = 'Employee name is required!';
            employeeNameInput.classList.add('is-invalid');
            document.getElementById('error-name').style.color = 'red';
            event.preventDefault();
        }

        if (!employeeGenderInput.value.trim()) {
            document.getElementById('error-gender').innerText = 'Gender is required!';
            employeeGenderInput.classList.add('is-invalid');
            document.getElementById('error-gender').style.color = 'red';
            event.preventDefault();
        }

        if (!employeeBirthdayInput.value.trim()) {
            document.getElementById('error-birthday').innerText = 'Birthday is required!';
            employeeBirthdayInput.classList.add('is-invalid');
            document.getElementById('error-birthday').style.color = 'red';
            event.preventDefault();
        }

        if (!employeePhoneInput.value.trim()) {
            document.getElementById('error-phone').innerText = 'Phone is required!';
            employeePhoneInput.classList.add('is-invalid');
            document.getElementById('error-phone').style.color = 'red';
            event.preventDefault();
        } else if (!/^\d+$/.test(employeePhoneInput.value.trim())) {
            document.getElementById('error-phone').innerText = 'Phone number must contain only number!';
            employeePhoneInput.classList.add('is-invalid');
            document.getElementById('error-phone').style.color = 'red';
            event.preventDefault();
        }
    });
</script>

<?= $this->endSection(); ?>