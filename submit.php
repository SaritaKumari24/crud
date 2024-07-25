<?php include_once "config.php";

?>
<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .form-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .table-actions {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    <div class="container form-container mt-5">
       <div class="row justify-content-center">
        <div class="col-12">
            <h2>Submissions</h2>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Mobile Number</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Proof</th>
                        <th>Skills</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = callingData("form");
                    foreach ($data as $value):
                    ?>
                    <tr>
                        <td><?= $value['id']; ?></td>
                        <td><?= $value['name']; ?></td>
                        <td><?= $value['mobile']; ?></td>
                        <td><?= $value['email']; ?></td>
                        <td><?= $value['gender']; ?></td>
                        <td><?= $value['proof']; ?></td>
                        <td><?= $value['skills']; ?></td>
                        <td class="table-actions">
                            <a href="edit.php?id=<?= $value['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="delete.php?id=<?= $value['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
       </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>