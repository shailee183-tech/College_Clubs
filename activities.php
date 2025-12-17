<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>College Clubs – Activities</title>
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
            <section class="page-header slide-page active">
                <h2>Upcoming Activities</h2>
                <p>Register and participate in upcoming club events and activities. (All data is stored only in your browser.)</p>
            </section>

            <section class="cards-grid-section slide-page">
                <div id="activities-grid" class="cards-grid"></div>
            </section>
        </main>

        <footer class="main-footer">
            <p>&copy; <span id="year"></span> College Clubs. All rights reserved.</p>
        </footer>
    </div>

    <script>
      document.getElementById('year').textContent = new Date().getFullYear();

      // Static example activities
      const activities = [
        {
          id: 1,
          clubName: 'Coding Club',
          title: 'Hackathon 2025',
          description: '24-hour coding marathon. Build something cool with your friends!',
          date: '2025-12-20',
          location: 'Lab 101'
        },
        {
          id: 2,
          clubName: 'Music Club',
          title: 'Winter Concert',
          description: 'End of year concert featuring bands and solo performances.',
          date: '2025-12-22',
          location: 'Auditorium'
        },
        {
          id: 3,
          clubName: 'Sports Club',
          title: 'Inter-College Football',
          description: 'Friendly football tournament with neighboring colleges.',
          date: '2025-12-25',
          location: 'Main Ground'
        }
      ];

      const grid = document.getElementById('activities-grid');

      function getCurrentUser() {
        try {
          return JSON.parse(localStorage.getItem('cc_current_user') || 'null');
        } catch {
          return null;
        }
      }

      function getRegisteredActivities() {
        const user = getCurrentUser();
        if (!user) return [];
        const all = JSON.parse(localStorage.getItem('cc_activity_regs') || '{}');
        return all[user.email] || [];
      }

      function setRegisteredActivities(regs) {
        const user = getCurrentUser();
        if (!user) return;
        const all = JSON.parse(localStorage.getItem('cc_activity_regs') || '{}');
        all[user.email] = regs;
        localStorage.setItem('cc_activity_regs', JSON.stringify(all));
      }

      function formatDate(dateStr) {
        const d = new Date(dateStr);
        if (isNaN(d)) return '';
        return d.toLocaleDateString(undefined, { day: '2-digit', month: 'short', year: 'numeric' });
      }

      function renderActivities() {
        const user = getCurrentUser();
        const regs = getRegisteredActivities();
        grid.innerHTML = '';

        activities.forEach((act) => {
          const card = document.createElement('article');
          card.className = 'activity-card';

          const registered = regs.includes(act.id);

          card.innerHTML = `
            <div class="activity-header">
                <span class="activity-club">${act.clubName}</span>
                <h3>${act.title}</h3>
            </div>
            <p class="activity-description">${act.description}</p>
            <div class="activity-meta">
                <span>${formatDate(act.date)}</span>
                <span>${act.location}</span>
            </div>
            <div class="activity-actions">
                ${
                  user
                    ? registered
                      ? '<span class="badge badge-joined">Registered</span>'
                      : `<button class="btn btn-primary" data-activity="${act.id}">Register</button>`
                    : '<span class="badge">Login is only simulated (no real server).</span>'
                }
            </div>
          `;

          grid.appendChild(card);
        });

        grid.querySelectorAll('button[data-activity]').forEach((btn) => {
          btn.addEventListener('click', () => {
            const id = parseInt(btn.getAttribute('data-activity'), 10);
            const regs = getRegisteredActivities();
            if (!regs.includes(id)) {
              regs.push(id);
              setRegisteredActivities(regs);
              renderActivities();
            }
          });
        });
      }

      renderActivities();
    </script>
</body>
</html>



