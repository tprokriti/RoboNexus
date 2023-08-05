<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="background">
        <form class="form-container">
            <h2>Sign In</h2>
            <div class="input-container">
                <label class="input-label" for="email">Email</label>
                <input class="input-field" type="email" id="email" name="email" required>
            </div>
            <div class="input-container">
                <label class="input-label" for="password">Password</label>
                <input class="input-field" type="password" id="password" name="password" required>
            </div>
            <button class="submit-button" type="submit">Sign In</button>
            <p class="signup-link">Don't have an account? <a href="signup.php">Sign up</a></p>
        </form>
    </div>
</body>

</html>