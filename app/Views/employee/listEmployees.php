<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<title>List Employee</title>
<style>
    /* .container {
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
    } */

    #head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-right: 10px;
    }

    #new-button {
        margin-left: 5%;
        margin-right: 30px;
    }

    .list-employee-container {
        margin-left: 50px;
    }
</style>
</head>

<body style="background-color: #FCF6F5;">
    <!-- <div class="container"> -->
    <div class="list-employee-container">


        <div class="employee-list">
            <div class="employee-list-container">
                <a href="/company/index">
                    <i class="bi bi-arrow-left"></i>
                </a>

                <div id="head">

                    <h1>Employee List</h1>
                    <a id="new-button" href="/company/<?= $company_id; ?>/create" class="btn" style="background-color: #990011; color: #FFFFFF">
                        <i class="bi bi-plus-lg"></i>
                        New Employee</a>
                </div>

                <?php if (!empty($employee)) : ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Employee Name</th>
                                <th scope="col">Employee Gender</th>
                                <th scope="col">Employee Birthday</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($employee as $e) : ?>
                                <tr>
                                    <td><?= $e['employee_name']; ?></td>
                                    <!-- <td><?= $e['employee_gender']; ?></td> -->
                                    <td><?php
                                        if ($e['employee_gender'] == 1) {
                                            echo "Male";
                                        } else if ($e['employee_gender'] == 2) {
                                            echo "Female";
                                        }
                                        ?></td>
                                    <td><?= $e['employee_birthday']; ?></td>
                                    <td>
                                        <a id="detail" href="#" class="btn view-employee" data-id="<?= $e['employee_id']; ?>" data-company-id="<?= $e['company_id']; ?>" style="background-color: #F18B97; color:#FFFFFF; width: 120px">Details</a>
                                        <form action="/employee/<?= $e['company_id']; ?>/delete/<?= $e['employee_id']; ?>" method="post" style="margin-left:5px">
                                            <a href="/employee/<?= $e['employee_id']; ?>/edit" style="color: #C4C4C4; font-size: 0.8em;">
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

                    <br>

            </div>
        </div>
        <div class=" employee-detail-container" id="employee-detail">

        </div>
    <?php else : ?>
        <tr>
            <td colspan="4">No employees found</td>
        </tr>
        <br>
        <a href="/company/index" class="btn btn-primary">Back to Company List</a>

    <?php endif; ?>
    <!-- </div> -->
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
                    $('.list-employee-container').css('display', 'flex');
                    $('.container').css('justify-content', 'space-between');
                    $('.employee-list').css('width', '50%');
                    $('.employee-detail-container').css('width', '50%');
                    $('.employee-detail-container').css('margin-top', '100px');
                    $('.employee-detail-container').css('margin-left', '100px');
                }
            });
        });
    });
</script>

<?= $this->endSection(); ?>