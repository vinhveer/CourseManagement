<?php
include("layout.php");
include_once("../config/connect.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sbm"])) {
    $_SESSION['course_name'] = $_POST['course_name'];
    $_SESSION['course_code'] = $_POST['course_code'];
    $_SESSION['course_description'] = $_POST['course_description'];
    $_SESSION['start_date'] = $_POST['start_date'];
    $_SESSION['end_date'] = $_POST['end_date'];
    $_SESSION['course_image'] = $_FILES['course_image']['name'];
    $image = $_SESSION['course_image'];
    $image_tmp = $_FILES['course_image']['tmp_name'];
    if(!empty($image)){
    if (move_uploaded_file($image_tmp,'../assets/file/course_background/'.$image)) {
        echo 'Upload thành công';
    } else {
        echo 'Lỗi khi upload: ' . error_get_last()['message'];
        exit;
    }}
    header("location: choose_teacher.php?id=$id&role=edit");
}
$sql_course = "SELECT * FROM course Where course_id = $id";
$query_course = mysqli_query($dbconnect, $sql_course);
$result = mysqli_fetch_array($query_course);
mysqli_close($dbconnect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Registration Form</title>
</head>

<body>

    <div class="container mt-5">
        <!-- Header -->
        <div class="row mb-3">
            <div class="col-md-6">
                <h2>Sửa Thông Tin Khóa Học </h2>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary" href="courses.php">Thoát</a>
                </div>
            </div>
        </div>

        <!-- Body - Registration Form -->
        <form method="POST" enctype="multipart/form-data" class="needs-validation" novalidate id="accountForm">
        <div class="mb-3 row">
                <label for="course_name" class="col-sm-2 col-form-label">Tên khóa học</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Nhập tên khóa học"
                        maxlength="225" required value="<?php echo $result['course_name']; ?>">
                    <div class="invalid-feedback">
                        Tên khóa học không được trống và tối đa 225 ký tự.
                    </div>
                </div>
                <label for="course_code" class="col-sm-2 col-form-label">Mã khóa học</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="course_code" name="course_code" placeholder="Nhập mã khóa học" maxlength="6"
                        required value="<?php echo $result['course_code']; ?>">
                    <div class="invalid-feedback">
                        Mã khóa học không được trống và tối đa 6 ký tự.
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="course_image" class="col-sm-2 col-form-label">Ảnh bìa khóa học</label>
                <span style="padding-left: 10px;"><img src="/assets/file/course_background/<?php echo $result['course_background']; ?>" width="60px"></span>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="course_image" name="course_image" >
                </div>
            </div>
            <div class="mb-3 row">
                <label for="course_description" class="col-sm-2 col-form-label">Mô tả khóa học</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="course_description" name="course_description" rows="5" placeholder="Nhập mô tả khóa học" required><?php echo $result['course_description']; ?></textarea>
                    <div class="invalid-feedback">
                        Mô tả khóa học không được trống.
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="start_date" class="col-sm-2 col-form-label">Ngày bắt đầu</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="start_date" name="start_date" required value="<?php echo $result['start_date']; ?>">
                </div>
                <label for="end_date" class="col-sm-2 col-form-label">Ngày kết thúc</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="end_date" name="end_date" required value="<?php echo $result['end_date']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-12 text-end">
                    <button type="submit" class="btn btn-primary" name="sbm">Thay đổi</button>
                    <a class="btn btn-secondary" href="courses.php">Thoát</a>
                </div>
            </div>
        </form>
    </div>
    <script>
        // Enable Bootstrap form validation
        (function() {
            'use strict';

            var form = document.getElementById('accountForm');

            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
        })();
    </script>
</body>

</html>
