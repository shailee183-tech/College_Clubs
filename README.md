## College Clubs Website (Front-end Only)

A **front-end only** project (no PHP/MySQL required) for a **College Clubs** portal with:
- **Animated, modern UI** using HTML, CSS, and JavaScript
- **Demo login/register** using `localStorage` (no real server or database)
- **Browse & join clubs** (saved in browser)
- **View activities & register/participate** (also saved in browser)

### 1. Requirements
- Any static server – e.g. **VS Code Live Server (Go Live)** or opening via a simple HTTP server.

### 2. Setup with VS Code Go Live
1. Open this `College_Clubs` folder in **VS Code**.
2. Install the **Live Server** extension (if you don’t have it).
3. Right-click `index.php` and choose **“Open with Live Server”** (or click **Go Live**).
4. The site will open in your browser and everything will work without MySQL.

> Note: Files still use the `.php` extension but contain only HTML/JS/CSS, so they behave like normal HTML files for Live Server.

### 3. Pages
- `index.php` – Landing page with animated hero and navigation.
- `login.php` – Demo login page (auth stored only in `localStorage`).
- `register.php` – Demo registration page (saves users in `localStorage`).
- `clubs.php` – Static list of clubs with animated cards and “Join Club” (per-user data in `localStorage`).
- `activities.php` – Static list of activities with “Register” buttons (per-user data in `localStorage`).



