<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>College Clubs – Register</title>
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
                    <h2>Create an Account</h2>
                    <div id="reg-error" class="alert alert-error" style="display:none;"></div>
                    <div id="reg-success" class="alert alert-success" style="display:none;"></div>
                    <form id="register-form" class="form">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" required placeholder="Your name" />
                        </div>
                        <div class="form-group">
                            <label for="email">College Email</label>
                            <input type="email" id="email" name="email" required placeholder="you@college.edu" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" required placeholder="Create a password" />
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" required placeholder="Repeat your password" />
                        </div>
                        <button type="submit" class="btn btn-primary full-width">Register</button>
                        <p class="auth-switch">
                            Already have an account? <a href="login.php">Login</a>
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

      const regForm = document.getElementById('register-form');
      const regError = document.getElementById('reg-error');
      const regSuccess = document.getElementById('reg-success');

      regForm.addEventListener('submit', function (e) {
        e.preventDefault();

        regError.style.display = 'none';
        regSuccess.style.display = 'none';

        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value;
        const confirm = document.getElementById('confirm_password').value;

        if (!name || !email || !password || !confirm) {
          regError.style.display = 'block';
          regError.textContent = 'Please fill in all fields.';
          return;
        }

        if (password !== confirm) {
          regError.style.display = 'block';
          regError.textContent = 'Passwords do not match.';
          return;
        }

        const users = JSON.parse(localStorage.getItem('cc_users') || '[]');
        if (users.some((u) => u.email === email)) {
          regError.style.display = 'block';
          regError.textContent = 'An account with this email already exists (in this browser).';
          return;
        }

        users.push({ name, email, password });
        localStorage.setItem('cc_users', JSON.stringify(users));

        regSuccess.style.display = 'block';
        regSuccess.textContent = 'Registration successful! You can now log in.';
        regForm.reset();
      });
    </script>
</body>
</html>



