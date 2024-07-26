<?php
include_once "config.php";

$id = $_GET['id'];
// Fetch the record with the given ID
$data = callingData("form", "id = $id")[0]; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $proof = $_POST['proof'];
    $skills = isset($_POST['skills']) ? $_POST['skills'] : [];

    // Convert the skills array to a comma-separated string
    $skillsString = implode(", ", $skills);

    // Prepare data array for update
    $data = [
        'name' => $name,
        'mobile' => $mobile,
        'email' => $email,
        'gender' => $gender,
        'proof' => $proof,
        'skills' => $skillsString
    ];

    updateData('form', $data, "id = $id");

    // Redirect to the display page after submission
    redirect('index.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Submission</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            background-color: #f8f9fa;
        }
        .col-6 {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
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
        <div class="row d-flex justify-content-center">
            <div class="col-6" style=" border: 1px solid #e4e1e1;  padding: 30px;">
                <h2>Edit Submission</h2>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?= $data['name']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="mobile" class="form-label">Phone Number:</label>
                        <input type="number" id="mobile" name="mobile" class="form-control" value="<?= $data['mobile']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?= $data['email']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Genders:</label><br>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="male" name="gender" value="Male" class="form-check-input" <?= $data['gender'] == 'Male' ? 'checked' : ''; ?> required>
                            <label for="male" class="form-check-label">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="female" name="gender" value="Female" class="form-check-input" <?= $data['gender'] == 'Female' ? 'checked' : ''; ?> required>
                            <label for="female" class="form-check-label">Female</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="proof" class="form-label">Proof :</label>
                        <select id="proof" name="proof" class="form-select" required>
                            <option value="Aadhaar" <?= $data['proof'] == 'Aadhaar' ? 'selected' : ''; ?>>Aadhaar</option>
                            <option value="PAN" <?= $data['proof'] == 'PAN' ? 'selected' : ''; ?>>PAN</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Skills:</label><br>
                        <?php
                        $skillsArray = explode(", ", $data['skills']);
                        ?>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" id="html" name="skills[]" value="HTML" class="form-check-input" <?= in_array('HTML', $skillsArray) ? 'checked' : ''; ?>>
                            <label for="html" class="form-check-label">HTML</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" id="css" name="skills[]" value="CSS" class="form-check-input" <?= in_array('CSS', $skillsArray) ? 'checked' : ''; ?>>
                            <label for="css" class="form-check-label">CSS</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" id="javascript" name="skills[]" value="JavaScript" class="form-check-input" <?= in_array('JavaScript', $skillsArray) ? 'checked' : ''; ?>>
                            <label for="javascript" class="form-check-label">JavaScript</label>
                        </div>
                        <!-- Add more skills as needed -->
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>
