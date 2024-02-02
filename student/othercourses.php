<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <title>Đăng ký khóa học</title>
  <style>
    .custom-card {
      width: 100%;
      height: 0;
      padding-top: 50%;
      /* 4:5 aspect ratio (5/4 * 100) */
      position: relative;
    }

    .custom-card img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      /* Đảm bảo ảnh không bị biến dạng */
    }
  </style>
</head>

<body>

  
  <header class="container mt-4">
      <div class="row">
        <div class="col-md-6">
          <h2>Duyệt qua các khóa học</h2>
        </div>
        <div class="col-md-6">
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Tìm kiếm">
            <button class="btn btn-outline-primary" type="submit">Tìm</button>
          </form>
        </div>
      </div>
  </header>
  
  <div class="container mt-5">
    <!-- Course Cards -->
    <div class="row">
      <!-- Your course cards go here -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="custom-card">
            <img src="../assets/images/course1.jpg" class="card-img-top" alt="Course 1 Image">
          </div>
          <div class="card-body">
            <h5 class="card-title">Tên khóa học 1</h5>
            <p class="card-text">Tên giảng viên: Giảng viên 1</p>
          </div>
        </div>
      </div>

      <!-- Add more course cards as needed -->

    </div>
  </div>

  <!-- Bootstrap JavaScript dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>