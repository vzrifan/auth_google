<?php
include 'koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    $userInput = isset($_POST["userInput"]) ? $_POST["userInput"] : "";
    $correctAnswer = isset($_SESSION["correctAnswer"]) ? $_SESSION["correctAnswer"] : "";
    $num1 = isset($_SESSION["num1"]) ? $_SESSION["num1"] : "";
    $num2 = isset($_SESSION["num2"]) ? $_SESSION["num2"] : "";

    if ($userInput != $correctAnswer && isset($_POST["userInput"])) {
        $error = "CAPTCHA verification failed.";
    } else {
        $checkUsernameQuery = "SELECT * FROM users2 WHERE username = '$username'";
        $result = mysqli_query($conn, $checkUsernameQuery);

        if (mysqli_num_rows($result) > 0) {
            $error = "Username already exists. Please choose a different username.";
        } else {
            $sql = "INSERT INTO users2 (username, password) VALUES ('$username', '$password')";
            mysqli_query($conn, $sql);
            header("Location: index.php");
            exit;
        }
    }
} else {
    $num1 = rand(0, 9);
    $num2 = rand(0, 9);
    $correctAnswer = $num1 + $num2;

    $_SESSION["correctAnswer"] = $correctAnswer;
    $_SESSION["num1"] = $num1;
    $_SESSION["num2"] = $num2;
}
?>

<?php
if (isset($error)) {
    echo '<div class="error-message">' . $error . '</div>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles2.css">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="row">
        <div class="login-page">
            <div class="toRegister" style="font-weight: bold;">
                <p>Already have account? <a href="index.php" style="color: rgb(0,150,255);">Login</a></p>
            </div>

            <div class="form">
                <form class="login-form" method="POST">
                    <div class="input-box">
                        <input type="text" placeholder="username" id="username" name="username" required />
                        <i class='bx bx-user'></i>
                    </div>
                    <div class="input-box">
                        <input type="password" placeholder="password" id="password" name="password" required />
                        <i class='bx bxs-lock-alt'></i>
                    </div>

                    <div class="keamanan">
                        <a>
                            pertanyaan keamanan
                            <b class="text-danger"></b>
                        </a>

                        <div id="captcha" class="captcha">
                            <input type="hidden" name="num1" value="<?php echo $num1; ?>">
                            <input type="hidden" name="num2" value="<?php echo $num2; ?>">
                            <?php echo $num1 . " + " . $num2 . " = ?"; ?>
                        </div>
                        <div class="input-box">
                            <input type="text" id="userInput" placeholder="your answer" name="userInput" required>
                            <i class='bx bxs-pencil'></i>
                        </div>

                        <div class="showPass">
                            <input type="checkbox" id="showPass">
                            <label for="showPass">Show password</label>
                        </div>
                        <button type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const passwordInput = document.getElementById("password");
        const showPasswordCheckbox = document.getElementById("showPass");

        showPasswordCheckbox.addEventListener("change", function() {
            if (showPasswordCheckbox.checked) {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        });
    </script>

</body>

</html>

<?php
include_once("config.php");
include_once("includes/functions.php");

//print_r($_GET);die;

if (isset($_REQUEST['code'])) {
    $gClient->authenticate();
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($redirectUrl, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
    $gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
    $userProfile = $google_oauthV2->userinfo->get();
    //DB Insert
    $gUser = new Users();
    $gUser->checkUser('google', $userProfile['id'], $userProfile['given_name'], $userProfile['family_name'], $userProfile['email'], $userProfile['gender'], $userProfile['locale'], $userProfile['link'], $userProfile['picture']);
    $_SESSION['google_data'] = $userProfile; // Storing Google User Data in Session
    header("location: account.php");
    $_SESSION['token'] = $gClient->getAccessToken();
} else {
    $authUrl = $gClient->createAuthUrl();
}

if (isset($authUrl)) {
    echo '<a href="' . $authUrl . '"><div class="g-img"><img src="images/glogin.png" width="200" height="40" alt=""/></div></a>';
} else {
    echo '<a href="logout.php?logout">Logout</a>';
}

?>