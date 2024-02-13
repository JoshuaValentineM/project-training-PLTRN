<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Page</title>
</head>

<body>
    <h1>Company Page</h1>
    <table border="1">
        <tr>
            <th>Company Name</th>
            <th>Company Address</th>
        </tr>
        <?php foreach ($company as $c) : ?>
            <tr>
                <td><?= $c['company_name']; ?></td>
                <td><?= $c['company_address']; ?></td>
            </tr>
        <?php endforeach; ?>
</body>

</html>