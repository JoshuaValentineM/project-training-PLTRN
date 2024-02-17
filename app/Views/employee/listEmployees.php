<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
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

<?= $this->endSection(); ?>