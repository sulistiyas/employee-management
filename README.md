<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<!--   <title>Room Booking App - Laravel Installation Guide</title> -->
<!--   <style>
    body {
      font-family: sans-serif;
      line-height: 1.6;
      max-width: 800px;
      margin: auto;
      padding: 20px;
    }
    h1, h2, h3 {
      color: #333;
    }
    code {
      background: #f4f4f4;
      padding: 2px 4px;
      border-radius: 4px;
    }
    pre {
      background: #f4f4f4;
      padding: 10px;
      overflow-x: auto;
      border-left: 4px solid #ccc;
    }
    ul {
      padding-left: 20px;
    }
  </style> -->
</head>
<body>

  <!-- <h1>🏠 Room Booking App</h1>
  <p>A simple and efficient Laravel-based application for managing room bookings, schedules, and availability.</p>

  <h2>🚀 Features</h2>
  <ul>
    <li>User-friendly interface for booking and managing rooms</li>
    <li>Role-based access (Admin & User)</li>
    <li>Calendar view of room availability</li>
    <li>Notification for booking conflicts</li>
    <li>Built with <a href="https://filamentphp.com/" target="_blank">Laravel Filament</a> for admin panel</li>
  </ul> -->

  <h2>🛠 Installation</h2>

  <h3>Requirements</h3>
  <ul>
    <li>PHP >= 8.1</li>
    <li>Composer</li>
    <li>MySQL or other supported database</li>
    <li>Node.js & npm</li>
  </ul>

  <h3>1. Clone the Repository</h3>
  <pre><code>git clone https://github.com/sulistiyas/room-booking-app.git
cd room-booking-app</code></pre>

  <h3>2. Install Dependencies</h3>
  <pre><code>composer install
npm install && npm run build</code></pre>

  <h3>3. Environment Setup</h3>
  <pre><code>cp .env.example .env</code></pre>
  <p>Update the <code>.env</code> file with your database and mail credentials.</p>

  <h3>4. Generate App Key</h3>
  <pre><code>php artisan key:generate</code></pre>

  <h3>5. Run Migrations & Seeders</h3>
  <pre><code>php artisan migrate --seed</code></pre>

  <h3>6. Activate Role & Permission</h3>
  <pre><code>php artisan shield:setup</code></pre>
  <pre><code>php artisan shield:install</code></pre>

  <h3>7. Start Development Server</h3>
  <pre><code>php artisan serve</code></pre>
  <p>Visit <a href="http://127.0.0.1:8000" target="_blank">http://127.0.0.1:8000</a> in your browser.</p>

  <h2>🧑 Admin Access</h2>
  <p>By default, a demo admin account is created:</p>
  <ul>
    <li><strong>Email:</strong> admin@example.com</li>
    <li><strong>Password:</strong> password</li>
  </ul>
  <p>You can change this in the database or by editing the seeder.</p>

  <h2>📦 Built With</h2>
  <ul>
    <li>Laravel</li>
    <li>Filament Admin</li>
    <li>Tailwind CSS</li>
    <li>FullCalendar</li>
  </ul>

  <h2>🤝 Contribution</h2>
  <p>Feel free to fork and contribute! Pull requests are welcome.</p>

</body>
</html>



<section style="text-align: center; padding: 3rem 1rem; background: #fffbe6;">
  <h2 style="font-size: 2rem; margin-bottom: 1rem;">☕ Support Us</h2>
  <p style="font-size: 1.1rem; max-width: 500px; margin: 0 auto 1.5rem;">
    If you find this project helpful, consider buying us a coffee to keep the lights on and development going!
  </p>
  <a href="https://ko-fi.com/sulistiyanugroho" target="_blank" style="
    background-color: #ffdd00;
    color: #111;
    text-decoration: none;
    font-weight: bold;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
    display: inline-block;
  ">
    Buy Me a Coffee
  </a>
</section>


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
