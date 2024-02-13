<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Company List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h1>Company Page</h1>
    <table border="1">
        <tr>
            <th>Company Name</th>
            <th>Company Phone</th>
            <th>Company Address</th>

        </tr>
        <?php foreach ($company as $c) : ?>
            <tr>
                <td><?= $c['company_name']; ?></td>
                <td><?= $c['company_phone']; ?></td>
                <td><?= $c['company_address']; ?></td>
                <td><a href="/company/<?= $c['company_id']; ?>/employees" class="btn btn-primary">View Employees</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="/company/create" class="btn btn-primary">New Company</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>