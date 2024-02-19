<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<title>Company List</title>
<style>
    .table-container {
        margin-left: 50px;
    }

    .company-list-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .company-list-container h1 {
        margin-right: 10px;
        margin-left: 50px;
        /* Adjust spacing as needed */
    }

    #new-button {
        margin-left: 5%;
        margin-right: 30px;
    }
</style>
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<body style="background-color: #FCF6F5;">
    <!-- <div class="container">
        <div class="row">
            <div class="col"> -->
    <div class="company-list-container">
        <h1>Company List</h1>
        <a id="new-button" href="/company/create" class="btn" style="background-color: #990011; color: #FFFFFF">
            <i class="bi bi-plus-lg"></i>
            New Company</a>
    </div>

    <div class="table-container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Company Name</th>
                    <th scope="col">Company Phone</th>
                    <th scope="col">Company Address</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($company as $c) : ?>
                    <tr>
                        <td>
                            <img src="/img/spongebob.png" alt="" width="100px">
                            <?= $c['company_name']; ?>
                        </td>
                        <td><?= $c['company_phone']; ?></td>
                        <td><?= $c['company_address']; ?></td>
                        <td>
                            <a href="/company/<?= $c['company_id']; ?>/employees" class="btn" style="background-color: #F18B97; color:#FFFFFF">
                                <i class="bi bi-person-fill"></i>
                                Employee List</a>
                            <form action="/company/<?= $c['company_id']; ?>/delete" method="post" style="margin-left:15px">
                                <a href="/company/<?= $c['company_id']; ?>/edit" style="color: #C4C4C4; font-size: 0.8em;">
                                    <i class="bi bi-pencil-fill"></i>
                                    Edit
                                </a>
                                <i style="margin-left: 5px; color: #C4C4C4">|</i>
                                <button type="submit" style="background-color: transparent; color:#990011; border:transparent; font-size: 0.8em">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php
                endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- </div>
        </div>
    </div> -->

    <!-- <a id="new-button" href="/company/create" class="btn btn-primary">New Company</a> -->

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<?= $this->endSection(); ?>