<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>College Clubs – Login</title>
    <link rel="stylesheet" href="assets/style.css" />
    <script defer src="assets/main.js"></script>
</head>
<body>
    <div class="page-wrapper">
        <header class="main-header">
            <div class="logo">College<span>Clubs</span></div>
            <nav class="nav-links">
                <a href="index.php" class="nav-link">Home</a>
                <a href="clubs.php" class="nav-link">Clubs</a>
                <a href="activities.php" class="nav-link">Activities</a>
                <a href="login.php" class="btn btn-outline">Login</a>
                <a href="register.php" class="btn btn-primary">Register</a>
            </nav>
        </header>

        <main class="page-content slide-container">
            <section class="auth-section slide-page active">
                <div class="auth-card">
                    <h2>Login</h2>
                    <div id="login-message" class="alert alert-error" style="display:none;"></div>
                    <form id="login-form" class="form">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required placeholder="you@college.edu" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" required placeholder="Enter your password" />
                        </div>
                        <button type="submit" class="btn btn-primary full-width">Login</button>
                        <p class="auth-switch">
                            New here? <a href="register.php">Create an account</a>
                        </p>
                    </form>
                </div>
            </section>
        </main>

        <footer class="main-footer">
            <p>&copy; <span id="year"></span> College Clubs. All rights reserved.</p>
        </footer>
    </div>

    <script>
      document.getElementById('year').textContent = new Date().getFullYear();

      // Front-end only "login" using localStorage
      const loginForm = document.getElementById('login-form');
      const loginMsg = document.getElementById('login-message');

      loginForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value;

        const users = JSON.parse(localStorage.getItem('cc_users') || '[]');
        const user = users.find((u) => u.email === email && u.password === password);

        if (!user) {
          loginMsg.style.display = 'block';
          loginMsg.textContent = 'Invalid email or password (stored only in your browser).';
          return;
        }

        localStorage.setItem('cc_current_user', JSON.stringify({ name: user.name, email: user.email }));
        window.location.href = 'index.php';
      });
    </script>
</body>
</html>



