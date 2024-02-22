<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<title>Edit Company</title>

<style>
    .form-control {
        width: calc(min(20em, 100%));
    }
</style>

</head>

<body style="background-color: #FCF6F5;">

    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="my-3">Edit Company</h1>
                <form action="/company/<?= $company['company_id']; ?>/update" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="companyName" class="col-sm-5 col-form-label">Company Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="companyName" name="companyName" autofocus value="<?= $company['company_name']; ?>">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="companyPhone" class="col-sm-5 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="companyPhone" name="companyPhone" value="<?= $company['company_phone']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="companyAddress" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="companyAddress" name="companyAddress" value="<?= $company['company_address']; ?>">
                        </div>
                    </div>

                    <button type="submit" class="btn" style="background-color: #990011; color:#FFFFFF; width: 150px">Save Changes</button>
                    <a href="/company/index" class="btn" style="background-color: #FFFFFF; border-color:#990011; color:#990011; width: 170px; margin-left:10px">Discard Changes</a>
                </form>
            </div>
        </div>
    </div>
</body>

<?= $this->endSection(); ?>