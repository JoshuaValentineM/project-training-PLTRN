<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <h1>Employee List</h1>
    <table border="1">
        <tr>
            <th>Employee Name</th>
            <th>Employee Gender</th>
            <th>Employee Birthday</th>
            <th>Action</th>
        </tr>
        <?php foreach ($employee as $e) : ?>
            <tr>
                <td><?= $e['employee_name']; ?></td>
                <td><?= $e['employee_gender']; ?></td>
                <td><?= $e['employee_birthday']; ?></td>
                <td>
                    <form action="/employee/<?= $e['company_id']; ?>/delete/<?= $e['employee_id']; ?>" method="post">
                        <a href="/employee/<?= $e['employee_id']; ?>/view" class="btn btn-primary">View</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <a href="/employee/<?= $e['employee_id']; ?>/edit" class="btn btn-warning">Edit</a>
                        <!-- <a href="/employee/<?= $e['employee_id']; ?>/delete" class="btn btn-danger">Delete</a> -->
                    </form>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="/company/index" class="btn btn-primary">Back to Company List</a>
    <a href="/company/<?= $e['company_id']; ?>/create" class="btn btn-primary">Add New Employee</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>