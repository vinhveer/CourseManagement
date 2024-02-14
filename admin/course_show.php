<?php
include_once('layout.php');
include_once('../config/connect.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$teacher_id = $_GET['teacher_id'];
$sql_user = "SELECT * FROM user WHERE user_id = $teacher_id";
$result_user = mysqli_query($dbconnect, $sql_user);
if ($result_user) {
    $row_user = mysqli_fetch_assoc($result_user);
}
$course_id = $_GET['id'];
$sql_count_member = "SELECT COUNT(*) AS member_count FROM course_member WHERE course_id = $course_id";
$result_count_member = mysqli_query($dbconnect, $sql_count_member);
$row_count_member = mysqli_fetch_assoc($result_count_member);

$sql_layout = "SELECT * FROM course WHERE course_id = $course_id";
$result_layout = mysqli_query($dbconnect, $sql_layout);
if ($result_layout) {
    $row_layout = mysqli_fetch_assoc($result_layout);
} else {
    echo "Error retrieving course information: " . mysqli_error($dbconnect);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ khóa học</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 align-items-center">
                <div>
                    <h3><?php echo $row_layout['course_code'] . " - " . $row_layout['course_name'] ?></h3>
                    <p><?php echo $row_layout['course_description'] ?></p>
                </div>
            </div>
            <div class="col-md-6">
                <a class="btn btn-danger float-end" onclick="return Del('<?php echo $row_layout['course_name']; ?>')" href="pross/c_not_approve.php?id=<?php echo $row_layout['course_id'];?>">Xóa khóa học này</a>
                <a type="button" class="btn btn-primary float-end me-2" href="course_edit.php?id=<?php echo $course_id ?>">Thay đổi thuộc tính khóa học</a>
            </div>
        </div>
    </div>
    <!-- Body Section -->
    <div class="container mt-4">
        <div class="row">
            <!-- Thông tin cá nhân -->
            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">
                        <h5>Thông tin khóa học</h5>
                        <hr class="info-divider">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>
                                        <b>Giáo viên giảng dạy</b>
                                        <br><?php echo $row_user['full_name'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Số lượng thành viên</b>
                                        <br><?php echo $row_count_member['member_count'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Ngày bắt đầu</b></td>
                                    <td><?php echo date('d/m/Y', strtotime($row_layout['start_date'])) ?></td>
                                </tr>
                                <tr>
                                    <td><b>Ngày kết thúc</b></td>
                                    <td><?php echo date('d/m/Y', strtotime($row_layout['end_date'])) ?></td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <br><a type="button" class="btn btn-secondary" href="courses.php">Thoát</a>
                </div>
            </div>
            <!-- Các khóa học đang tham gia -->
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5>Thời khóa biểu</h5>
                        <hr class="info-divider">

                        <table class="table table-bordered">
                            <thead class="table-light">
                                <th>Ngày trong tuần</th>
                                <th>Thời gian</th>
                            </thead>
                            <?php
                            $sql_schedule = "SELECT * FROM course_schedule WHERE course_id = $course_id";
                            $result_schedule = mysqli_query($dbconnect, $sql_schedule);

                            while ($row_schedule = mysqli_fetch_array($result_schedule)) {
                            ?>
                                <tr>
                                    <td><?php echo "Thứ " . $row_schedule['day_of_week']; ?></td>
                                    <td><?php echo $row_schedule['start_time'] . " - " . $row_schedule['end_time']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
    function Del(name){
        return confirm("Bạn có chắc chắn muốn từ bỏ khóa học: " + name +  " ?");
    }
    </script>
</body>

</html>
