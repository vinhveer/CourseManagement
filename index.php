<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <title>Learning Management System</title>
  <style>
    .navbar {
      z-index: 1000;
    }

    #content {
      padding-top: 30px;
      /* Adjust as needed based on the height of your navbar */
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" onclick="loadContent('home')">LMS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="loadContent('login')">Đăng nhập</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" onclick="loadContent('demo')">Truy cập phiên demo</a>
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

  <!-- Custom JavaScript to handle content loading -->
  <script>
    // Load content for 'home' when the page is loaded
    document.addEventListener('DOMContentLoaded', function () {
      loadContent('home');
    });

    function loadContent(page) {
      // Fetch and load content based on the clicked page
      fetch(`${page}.php`)
        .then(response => response.text())
        .then(html => {
          document.getElementById('content').innerHTML = html;
        });

      // Load specific CSS for the clicked page
      const head = document.head;
      const link = document.createElement('link');
      link.type = 'text/css';
      link.rel = 'stylesheet';
      link.href = `${page}.css`;
      head.appendChild(link);
    }
  </script>

</body>

</html>
