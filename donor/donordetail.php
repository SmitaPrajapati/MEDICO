<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile and Donor Form</title>
    <link rel="stylesheet" href="dstyles.css">
</head>
<body>
    <div class="header">
<button class="logout-btn" onclick="logout()"><a href="dlogin.php">Logout</a></button>
    </div>
    <div class="container">
        <button class="btn" onclick="showProfile()">Show Profile</button>
        <button class="btn" onclick="showDonorForm()">Donor Form</button>
    </div>

    <div id="profile" class="content">
        <h2>Donor Profile</h2>
        <p id="profileDetails">Loading...</p>
    </div>

    <div id="donorForm" class="content">
        <h2>Medicine Information</h2>
        <form id="form" onsubmit="submitForm(event)">
            <label for="medicineName">Medicine Name:</label>
            <input type="text" id="medicineName" name="medicineName" required><br>
            <label for="manufacturedBy">Manufactured By:</label>
            <input type="text" id="manufacturedBy" name="manufacturedBy" required><br>
            <label for="mfgDate">Mfg Date:</label>
            <input type="date" id="mfgDate" name="mfgDate" required><br>
            <label for="expiryDate">Expiry Date:</label>
            <input type="date" id="expiryDate" name="expiryDate" required><br>
            <button type="submit">Submit</button>
        </form>
    </div>

    <script src="dscript.js"></script>
</body>
</html>


