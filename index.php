<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>College Clubs</title>
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
            <section class="hero slide-page active">
                <div class="hero-bg-gradient"></div>
                <div class="hero-content">
                    <h1 class="hero-title">
                        Discover Your <span>Club</span><br/>
                        Build Your <span>Campus Story</span>
                    </h1>
                    <p class="hero-subtitle">
                        Join coding, music, sports and many more clubs. Explore activities, register for events,
                        and track your participation – all in one animated, modern portal.
                    </p>
                    <div class="hero-actions">
                        <a href="clubs.php" class="btn btn-primary">Explore Clubs</a>
                        <a href="activities.php" class="btn btn-ghost">View Activities</a>
                    </div>
                    <div class="hero-stats">
                        <div class="stat-card">
                            <span class="stat-number">10+</span>
                            <span class="stat-label">Active Clubs</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number">50+</span>
                            <span class="stat-label">Events / Year</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number">500+</span>
                            <span class="stat-label">Student Members</span>
                        </div>
                    </div>
                </div>
                <div class="hero-visual">
                    <div class="card orbit-card orbit-1">
                        <h3>Coding Club</h3>
                        <p>Hackathons, coding contests, project sprints.</p>
                    </div>
                    <div class="card orbit-card orbit-2">
                        <h3>Music Club</h3>
                        <p>Live concerts, jam nights, music production.</p>
                    </div>
                    <div class="card orbit-card orbit-3">
                        <h3>Sports Club</h3>
                        <p>Tournaments, weekend matches, fitness camps.</p>
                    </div>
                    <div class="floating-orb orb-1"></div>
                    <div class="floating-orb orb-2"></div>
                    <div class="floating-orb orb-3"></div>
                </div>
            </section>

            <section class="info-section slide-page">
                <h2>Why Join a Club?</h2>
                <div class="info-grid">
                    <div class="info-card">
                        <h3>Build Skills</h3>
                        <p>Learn leadership, teamwork, communication and real-world skills beyond the classroom.</p>
                    </div>
                    <div class="info-card">
                        <h3>Make Friends</h3>
                        <p>Connect with people who share the same passion as you and grow your network.</p>
                    </div>
                    <div class="info-card">
                        <h3>Showcase Talent</h3>
                        <p>Perform, compete, present and represent your college in inter-college events.</p>
                    </div>
                </div>
            </section>
        </main>

        <footer class="main-footer">
            <p>&copy; <span id="year"></span> College Clubs. All rights reserved.</p>
        </footer>
    </div>

    <script>
      // Set year in footer
      document.getElementById('year').textContent = new Date().getFullYear();
    </script>
</body>
</html>



