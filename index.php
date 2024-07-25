<?php
include_once "config.php";

// Delete record if `ftd_id` is set
if (isset($_GET['ftd_id'])) {
    $id = $_GET['ftd_id'];
    if (deleteRecord("form", "id='$id'")) {
        redirect('index.php');
    }
}

// Handle form submission
if (isset($_POST['create'])) {
    $skills = isset($_POST['skills']) ? implode(",", $_POST['skills']) : ''; 
    $data = [
        "name" => $_POST['name'],
        "mobile" => $_POST['mobile'],
        "email" => $_POST['email'],
        "gender" => $_POST['gender'],
        "proof" => $_POST['proof'],
        "skills" => $skills
    ];

    insertData("form", $data);
    redirect('index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            background-color: #f8f9fa;
        }
        /* .col-6 {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        } */
        h2 {
            margin-bottom: 20px;
        }
        .form-label {
            margin-bottom: 5px;
        }
        .form-control, .form-check-input, .form-select {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container form-container">
        <div class="row ">
            <div class="col-6">
                <h2>Form Submission</h2>
                <form action="index.php" style="border: 1px solid #e4e1e1; padding: 30px;" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile Number:</label>
                        <input type="number" id="mobile" name="mobile" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gender:</label><br>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="male" name="gender" value="Male" class="form-check-input" required>
                            <label for="male" class="form-check-label">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="female" name="gender" value="Female" class="form-check-input" required>
                            <label for="female" class="form-check-label">Female</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="proof" class="form-label">Proof:</label>
                        <select id="proof" name="proof" class="form-select" required>
                            <option value="Aadhaar">Aadhaar</option>
                            <option value="PAN">PAN</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Skills:</label><br>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" id="html" name="skills[]" value="HTML" class="form-check-input">
                            <label for="html" class="form-check-label">HTML</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" id="css" name="skills[]" value="CSS" class="form-check-input">
                            <label for="css" class="form-check-label">CSS</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" id="js" name="skills[]" value="JavaScript" class="form-check-input">
                            <label for="js" class="form-check-label">JavaScript</label>
                        </div>
                    </div>

                    <input type="submit" name="create" class="btn btn-primary w-100">
                </form>
            </div>

            <div class="col-6">
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
                        $data = callingData("form", "1=1");
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
                                <a href="index.php?ftd_id=<?= $value['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
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
