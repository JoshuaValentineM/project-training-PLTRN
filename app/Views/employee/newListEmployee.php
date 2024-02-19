<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Navbar  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <!-- <a href="#">
            <img src="img/polytron_logo_red.svg" alt="">
        </a> -->

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="background-color: #990011;">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/company/index">
                        <img src="/img/polytron_logo_red.svg" alt="Polytron" width="200px">
                        <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <title>List Employee</title>
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .employee-list {
            margin-right: 20px;
            width: 50%;
        }

        .employee-detail-container {
            margin-top: 100px;
            padding: 10px;
            width: 50%;
        }

        .employee-list-container {
            flex: 1;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="employee-list">
            <div class="employee-list-container">
                <h1>Employee List</h1>
                <?php if (!empty($employee)) : ?>
                    <table>
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
                                    <a href="#" class="btn btn-primary view-employee" data-id="<?= $e['employee_id']; ?>" data-company-id="<?= $e['company_id']; ?>">View</a>
                                    <form action="/employee/<?= $e['company_id']; ?>/delete/<?= $e['employee_id']; ?>" method="post">
                                        <button type=" submit" class="btn btn-danger">Delete</button>
                                        <a href="/employee/<?= $e['employee_id']; ?>/edit" class="btn btn-warning">Edit</a>
                                    </form>
                            </tr>
                        <?php endforeach; ?>

                    </table>
                    <br>
                    <a href="/company/index" class="btn btn-primary">Back to Company List</a>
                    <a href="/company/<?= $e['company_id']; ?>/create" class="btn btn-primary">Add New Employee</a>

            </div>
        </div>
        <div class="employee-detail-container" id="employee-detail">

        </div>
    <?php else : ?>
        <tr>
            <td colspan="4">No employees found</td>
        </tr>
        <br>
        <a href="/company/index" class="btn btn-primary">Back to Company List</a>
        <a href="/company/<?= $company_id; ?>/create" class="btn btn-primary">Add New Employee</a>
    <?php endif; ?>
    </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.view-employee').click(function(e) {
            e.preventDefault();

            let employeeId = $(this).data('id');
            let companyId = $(this).data('company-id');

            // console.log('View Employee', employeeId, companyId);

            $.ajax({
                url: '/company/' + employeeId + '/view',
                method: 'GET',
                success: function(response) {
                    // $('#employee-detail-content').html(response);
                    // console.log(response);
                    let employeeData = JSON.parse(response)[0];
                    // console.log(employeeData);
                    var imageUrl = '/img/' + employeeData.employee_picture;
                    console.log(imageUrl)
                    let html = '<table>' +
                        '<tr>' +
                        '<h2>' + employeeData.employee_name + '</h2>' +
                        '</tr>' +
                        '<tr>' +
                        '<td><img src="' + imageUrl + '"</td>' +
                        '</tr>' +
                        '<th>Employee Gender</th>' +
                        '<td>' + employeeData.employee_gender + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>Employee Birthday</th>' +
                        '<td>' + employeeData.employee_birthday + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>Employee Phone</th>' +
                        '<td>' + employeeData.employee_phone + '</td>' +
                        '</tr>' +
                        '</table>';
                    console.log(html);
                    $('.employee-detail-container').html(html);
                }
            });
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>

</html>