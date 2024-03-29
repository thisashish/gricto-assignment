<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Auth OTP</title>
</head>
<body>
    <header>
        <!-- Navigation Links -->
        <nav>
            <ul>
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/cities">Cities</a></li>
                <li><a href="/pincodes">Pincodes</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Laravel Auth OTP</p>
    </footer>
    
</body>
</html>
