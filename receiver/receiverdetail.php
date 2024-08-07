<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receiver Profile</title>
    <link rel="stylesheet" href="rstyles.css">
</head>
<body>
    <div class="header">
        <button class="logout-btn" onclick="logout()">Logout</button>
    </div>
    <div class="container">
        <button class="btn" onclick="showProfile()">Show Profile</button>
        
        <!-- Dropdown Menu -->
        <div class="dropdown">
            <button class="btn dropdown-toggle" onclick="toggleDropdown()">Receive Medicines</button>
            <div id="dropdownMenu" class="dropdown-content">
                <a href="display.php">User</a>
                <a href="ngo.html">NGO</a>
            </div>
        </div>
    </div>

    <div id="profile" class="content">
        <h2>Receiver Profile</h2>
        <p id="profileDetails">Loading...</p>
    </div>

    <script src="rscript.js"></script>
    <script src="receiver.js"></script>
</body>
</html>
