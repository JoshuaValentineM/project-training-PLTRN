<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<title>Add New Company</title>

<style>
    .form-control {
        width: calc(min(20em, 100%));
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }
</style>
</head>

<body style="background-color: #FCF6F5;">


    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="my-3">Add New Company</h1>

                <form id="createCompanyForm" action="/company/save" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="companyName" class="col-sm-5 col-form-label">Company Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Enter new company name" autofocus>
                        </div>
                        <div>
                            <p id="error-company"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber" class="col-sm-5 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter new company phone number">
                        </div>
                        <div>
                            <p id="error-phone"></p>
                        </div>
                    </div>
                    <div class=" form-group">
                        <label for="companyAddress" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="companyAddress" name="companyAddress" placeholder="Enter new company address">
                        </div>
                        <div>
                            <p id="error-address"></p>
                        </div>
                    </div>
                    <button type="submit" class="btn" style="background-color: #990011; color:#FFFFFF; width: 150px">Add Company</button>
                    <a href="/company/index" class="btn" style="background-color: #FFFFFF; border-color:#990011; color:#990011; width: 150px; margin-left:10px">Cancel</a>
                </form>
            </div>
        </div>
    </div>

</body>
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

<?= $this->endSection(); ?>