<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<title>Edit Company</title>

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
                <h1 class="my-3">Edit Company</h1>
                <form action="/company/<?= $company['company_id']; ?>/update" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="row mb-3">
                        <label for="companyName" class="col-sm-2 col-form-label">Company Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="companyName" name="companyName" autofocus value="<?= $company['company_name']; ?>">

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="companyPhone" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="companyPhone" name="companyPhone" value="<?= $company['company_phone']; ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="companyAddress" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="companyAddress" name="companyAddress" value="<?= $company['company_address']; ?>">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/company/index" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>

<?= $this->endSection(); ?>