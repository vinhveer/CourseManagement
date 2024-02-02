<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add your custom styles here */
        .profile-image {
            border-radius: 50%;
            width: 100px;
            /* Adjust the size as needed */
            height: 100px;
            /* Adjust the size as needed */
        }
    </style>
</head>

<body>

    <!-- Header Section -->
    <header class="container mt-4">
        <div class="row">
            <div class="col-md-2">
                <!-- Profile Image -->
                <img src="/assets/images/course1.jpg" alt="Profile Image" class="profile-image">
            </div>
            <div class="col-md-10">
                <!-- Heading 2 - Họ và tên -->
                <h2>Họ và tên của bạn</h2>
                <!-- Paragraph - Giới thiệu bản thân -->
                <p>Giới thiệu bản thân của bạn</p>
            </div>
        </div>
    </header>

    <!-- Body Section -->
    <div class="container mt-4">
        <div class="row">
            <!-- Thông tin cá nhân -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4>Thông tin cá nhân</h4>
                        <!-- Bạn tự nghĩ và thêm nội dung của bạn ở đây -->
                    </div>
                </div>
            </div>

            <!-- Các khóa học đang tham gia -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4>Các khóa học đang tham gia</h4>
                        <!-- Bạn tự nghĩ và thêm nội dung của bạn ở đây -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>