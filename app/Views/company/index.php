<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<title>Company List</title>
<style>
    h1,
    table,
    #new-button {
        margin-left: 5%;
    }
</style>
</head>

<body>
    <h1>Company Page</h1>
    <table border="1">
        <tr>
            <th>Company Name</th>
            <th>Company Phone</th>
            <th>Company Address</th>
            <th colspan="2" style="text-align: center;">Action</th>

        </tr>
        <?php foreach ($company as $c) : ?>
            <tr>
                <td><?= $c['company_name']; ?></td>
                <td><?= $c['company_phone']; ?></td>
                <td><?= $c['company_address']; ?></td>
                <td><a href="/company/<?= $c['company_id']; ?>/employees" class="btn btn-primary">View Employees</a></td>
                <td><a href="/company/<?= $c['company_id']; ?>/edit" class="btn btn-warning">Edit Company</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a id="new-button" href="/company/create" class="btn btn-primary">New Company</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

<?= $this->endSection(); ?>