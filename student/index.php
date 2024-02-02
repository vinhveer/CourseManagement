<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <title id="pageTitle">Learning Management System</title>
  <style>
    .navbar {
      z-index: 1000;
    }

    #content {
      padding-top: 30px;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">LMS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="loadContent('home'); hideNavbar()">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="loadContent('courses'); hideNavbar()">Khóa học của tôi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="loadContent('schedule'); hideNavbar()">Thời khóa biểu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="loadContent('othercourses'); hideNavbar()">Đăng ký khóa học</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <span>Nguyễn Quang Vinh</span>
              <img src="/assets/images/course1.jpg" alt="Avatar" class="rounded-circle" width="30" height="30">
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#" onclick="loadContent('my')">Trang cá nhân</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/logout.php">Đăng xuất</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page content -->
  <div class="container-fluid mt-5" id="content">
    <!-- Content will be loaded here -->
  </div>

  <!-- Bootstrap JavaScript dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JavaScript for Content Loading -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      loadContent('home');
    });

    function loadContent(page) {
      fetch(`${page}.php`)
        .then(response => response.text())
        .then(html => {
          document.getElementById('content').innerHTML = html;
          document.getElementById('pageTitle').innerText = page;
        });

      const head = document.head;
      const link = document.createElement('link');
      link.type = 'text/css';
      link.rel = 'stylesheet';
      link.href = `${page}.css`;
      head.appendChild(link);
    }

    function hideNavbar() {
      // Ẩn navbar khi click vào một li trong navbar
      const navbar = document.querySelector('.navbar-collapse');
      if (navbar.classList.contains('show')) {
        navbar.classList.remove('show');
      }
    }
  </script>

</body>

</html>
