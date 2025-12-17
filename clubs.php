<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>College Clubs – Clubs</title>
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
                <h2>Explore Clubs</h2>
                <p>Browse all active clubs and join the ones you love. (Data saved only in your browser.)</p>
            </section>

            <section class="cards-grid-section slide-page">
                <div id="clubs-grid" class="cards-grid"></div>
            </section>
        </main>

        <footer class="main-footer">
            <p>&copy; <span id="year"></span> College Clubs. All rights reserved.</p>
        </footer>
    </div>

    <script>
      document.getElementById('year').textContent = new Date().getFullYear();

      // Example static clubs
      const clubs = [
        {
          id: 1,
          name: 'Coding Club',
          description: 'A club for coders, hackers, and builders. Hackathons, coding contests, and project sprints.'
        },
        {
          id: 2,
          name: 'Music Club',
          description: 'Jam sessions, concerts, and music production workshops for all skill levels.'
        },
        {
          id: 3,
          name: 'Sports Club',
          description: 'Tournaments, weekend matches, and fitness events across multiple sports.'
        },
        {
          id: 4,
          name: 'Photography Club',
          description: 'Photo walks, editing sessions, and exhibitions to showcase your work.'
        }
      ];

      const grid = document.getElementById('clubs-grid');

      function getCurrentUser() {
        try {
          return JSON.parse(localStorage.getItem('cc_current_user') || 'null');
        } catch {
          return null;
        }
      }

      function getJoinedClubs() {
        const user = getCurrentUser();
        if (!user) return [];
        const all = JSON.parse(localStorage.getItem('cc_joined_clubs') || '{}');
        return all[user.email] || [];
      }

      function setJoinedClubs(joined) {
        const user = getCurrentUser();
        if (!user) return;
        const all = JSON.parse(localStorage.getItem('cc_joined_clubs') || '{}');
        all[user.email] = joined;
        localStorage.setItem('cc_joined_clubs', JSON.stringify(all));
      }

      function renderClubs() {
        const user = getCurrentUser();
        const joined = getJoinedClubs();
        grid.innerHTML = '';

        clubs.forEach((club) => {
          const card = document.createElement('article');
          card.className = 'club-card';

          const joinedThis = joined.includes(club.id);

          card.innerHTML = `
            <div class="club-card-header">
                <h3>${club.name}</h3>
            </div>
            <p class="club-description">${club.description}</p>
            <div class="club-actions">
                ${
                  user
                    ? joinedThis
                      ? '<span class="badge badge-joined">Joined</span>'
                      : `<button class="btn btn-primary" data-join="${club.id}">Join Club</button>`
                    : '<span class="badge">Login page is just for demo (no real server).</span>'
                }
            </div>
          `;

          grid.appendChild(card);
        });

        grid.querySelectorAll('button[data-join]').forEach((btn) => {
          btn.addEventListener('click', () => {
            const id = parseInt(btn.getAttribute('data-join'), 10);
            const joined = getJoinedClubs();
            if (!joined.includes(id)) {
              joined.push(id);
              setJoinedClubs(joined);
              renderClubs();
            }
          });
        });
      }

      renderClubs();
    </script>
</body>
</html>



