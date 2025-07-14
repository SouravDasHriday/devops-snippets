<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LAMP Stack Connection Test</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; padding: 2em; line-height: 1.6; }
        .container { max-width: 700px; margin: auto; padding: 2em; background: #f9f9f9; border: 1px solid #ddd; border-radius: 8px; }
        h1 { color: #333; }
        .status { padding: 1em; margin-top: 1em; border-radius: 5px; color: white; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .success { background-color: #28a745; }
        .error { background-color: #dc3545; }
        code { font-family: "SF Mono", "Fira Code", "Source Code Pro", monospace; background-color: #eee; padding: 2px 5px; border-radius: 3px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>LAMP Stack Connection Status</h1>
        <?php
        // Read database credentials from environment variables set in docker-compose.yaml
        $host = getenv('DB_HOST'); // The service name 'db'
        $user = getenv('DB_USER');
        $pass = getenv('DB_PASSWORD');
        $db_name = getenv('DB_NAME');

        // Check if the mysqli extension is loaded, which we enabled via php.ini
        if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
            echo "<div class='status error'><h2>Error:</h2><p>The <code>mysqli</code> extension is not available. Please ensure it's enabled in your PHP configuration.</p></div>";
            exit;
        }

        // Suppress warnings for a cleaner custom error message
        @$conn = new mysqli($host, $user, $pass, $db_name);

        // Check for connection errors
        if ($conn->connect_error) {
            echo "<div class='status error'>";
            echo "<h2>Connection Failed</h2>";
            echo "<p>Error: " . htmlspecialchars($conn->connect_error) . "</p>";
            echo "<p>This usually means the <code>web</code> container cannot reach the <code>db</code> container, or the credentials in your <code>.env</code> file are incorrect.</p>";
            echo "</div>";
        } else {
            echo "<div class='status success'>";
            echo "<h2>Connection Successful!</h2>";
            echo "<p>PHP connected to the MySQL database '<strong>" . htmlspecialchars($db_name) . "</strong>' successfully.</p>";
            echo "</div>";
            // Close the connection
            $conn->close();
        }
        ?>
    </div>
</body>
</html>
