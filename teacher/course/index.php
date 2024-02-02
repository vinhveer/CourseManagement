<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="module" src="https://md-block.verou.me/md-block.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/showdown/1.9.1/showdown.min.js"></script>
  <title id="pageTitle">Xem khóa học chi tiết</title>
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
      <a class="navbar-brand" href="#">SOT313 - 64.CNTT-3</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="loadContent('post'); hideNavbar()">Bài đăng</a>
          </li>
          <li>
            <a href="#" class="nav-link" onclick="loadContent('content'); hideNavbar()">Học liệu</a>
          </li>
          <li>
            <a href="#" class="nav-link" onclick="loadContent('exam'); hideNavbar()">Bài tập và kiểm tra</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="loadContent('messages'); hideNavbar()">Nhắn tin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="loadContent('grade'); hideNavbar()">Điểm số</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="loadContent('member'); hideNavbar()">Thành viên</a>
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

  <!-- Trong đoạn mã JavaScript của bạn -->
  <script>
    fetch('hello.md')
      .then(response => {
        if (!response.ok) {
          throw new Error(`Failed to fetch 'hello.md': ${response.status} ${response.statusText}`);
        }
        return response.text();
      })
      .then(text => {
        const converter = new showdown.Converter();
        const html = converter.makeHtml(text);
        document.getElementById('markdown-content').innerHTML = html;
      })
      .catch(error => {
        console.error('Có lỗi xảy ra khi fetch tệp Markdown:', error);
      });

    // Load content for 'home' when the page is loaded
    document.addEventListener('DOMContentLoaded', function () {
      loadContent('post');
    });

    function loadContent(page) {
      // Fetch and load content based on the clicked page
      fetch(`${page}.php`)
        .then(response => response.text())
        .then(html => {
          document.getElementById('content').innerHTML = html;

          // Cập nhật tiêu đề trang
          document.getElementById('pageTitle').innerText = page; // Sử dụng 'page' hoặc nội dung phù hợp
        });

      // Load specific CSS for the clicked page
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
