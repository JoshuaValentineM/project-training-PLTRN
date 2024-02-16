<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            /* Membuat ruang di antara dua div */
            align-items: flex-start;
            /* Memastikan kedua div berada di atas */
        }

        .employee-list {
            /* Hapus flex: 1; agar ukuran tidak fleksibel */
            margin-right: 20px;
            /* Jarak antara tabel dan div employee detail */
            width: 50%;
            /* Atur lebar agar hanya menggunakan setengah dari container */
        }

        .employee-detail-container {
            /* Hapus flex: 1; agar ukuran tidak fleksibel */
            /* border: 1px solid #ccc; */
            margin-top: 100px;
            padding: 10px;
            width: 50%;
            /* Atur lebar agar hanya menggunakan setengah dari container */
        }

        .employee-list-container {
            flex: 1;
            /* Take up available space */
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
    <?php endif; ?>
    </div>
    </div>


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

</body>

</html>