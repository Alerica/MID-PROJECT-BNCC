<?php
session_start(); 
$db = new mysqli('localhost', 'root', '', 'attendance_system');
if ($db->connect_error) {
    die("Connection to database failed: " . $db->connect_error);
}
if (isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $sql = "SELECT * FROM `admin` WHERE email='$email' AND password='$password'";
    $result = $db->query($sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['email'] === $email && $row['password'] === $password) {
            if(!empty($_POST["remember"])) {
                setcookie("email", $_POST["email"], time() + (10 * 365 * 24 * 60 * 60));
                setcookie("password", $_POST["password"], time() + (10 * 365 * 24 * 60 * 60));
            } else {
                if(isset($_COOKIE["email"])) {
                    setcookie("email", "");
                }
                if(isset($_COOKIE["password"])) {
                    setcookie("password", "");
                }
            }
            header("Location: dashbord.php");
            exit();
        } else {
            echo "<script>alert('Incorrect Email or Password');</script>";
        }
    } else {
        echo "<script>alert('Incorrect Email or Password');</script>";
    }
}
$db->close();
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="shortcut icon" href="https://static.vecteezy.com/system/resources/previews/010/160/674/original/coffee-icon-sign-symbol-design-free-png.png" type="image/png">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Icons+Round'><link rel="stylesheet" href="./style.css">
<style>
    :root {
    --primary: 237, 94%, 81%;
    --background: 266, 16%, 92%;
    --background-secondary: 256, 12%, 12%;
    --background-secondary-dark: 256, 10%, 10%;
    --background-secondary-light: 257, 11%, 16%;
    --text-primary: 0, 0%, 0%;
    /* Colors */
    --black: 0, 0%, 0%;
    --white: 0, 0%, 100%;
    --quite-gray: 0, 0%, 50%;
    --grooble: 10, 28%, 93%;
    /* Sizes */
    --heading-large: 5.6rem;
    --heading-medium: 3.6rem;
    --heading-small: 2.4rem;
    --paragraph: 1.11rem;
    --navbar-buttons: 2.4rem;
    /* misc */
    --transition-main: .175, .685, .32;
    /* Fonts */
    --font-main: "Poppins";
}

/* ===========
    Variabels
   =========== */

/* ===============
    Global Styles
   =============== */

*, *::before, *::after {
    box-sizing: inherit;
}
html, body {
    margin: 0;
    width: 100%;
    color: hsl(var(--text-primary));
    font-family: var(--font-main);
    background-color: hsl(var(--background));
    -webkit-font-smoothing: antialiased;
    scroll-behavior: smooth;
    box-sizing: border-box;
}

/* ============
    Typography
   ============ */

/* Headings */
h1, h2, h3, h4, h5, h6 {
    margin: 0;
}
/* Font Size */
h1 {
    font-size: var(--heading-large);
}
h2 {
    font-size: var(--heading-medium);
}
h3 {
    font-size: var(--heading-small);
}
h4 {
    font-size: calc(var(--heading-small) - .2rem);
}
h5 {
    font-size: calc(var(--heading-small) - .4rem);
}
h6 {
    font-size: calc(var(--heading-small) - .6rem);
}
/* Font Weight */
h1, h2 {
    font-weight: 900;
}
h3, h4, h5, h6 {
    font-weight: 800;
}
/* Paragraphs */
p {
    margin: 0;
    font-size: var(--paragraph);
}
/* Links */
a {
    color: hsla(var(--primary), 1);
    font-size: var(--paragraph);
    text-decoration: underline;
}
a:visited {
    color: hsla(var(--primary), .5);
}

/* =========
    Buttons
   ========= */

button {
    padding: .8em 1.2em;
    border: 1px solid hsl(var(--black));
    background-color: hsl(var(--background));
    font-size: var(--paragraph);
    cursor: pointer;
    outline: none;
}
button:focus {
    box-shadow:
            0 0 0 2px hsl(var(--black)),
            0 0 0 3px hsl(var(--white));
    border: 1px solid transparent;
}

/* =======
    Lists
   ======= */

ul, ol {
    margin: 1em 0;
}

/* =======
    Forms
   ======= */

form {
    margin: 0;
}
fieldset {
    margin: 0;
    padding: .5em 0;
    border: none;
}
input {
    padding: .8em 1.2em;
    font-size: var(--paragraph);
    background-color: hsl(var(--grooble));
    border: 2px solid hsl(var(--grooble));
    outline: none;
}
textarea {
    padding: .8em 1.2em;
    font-size: var(--paragraph);
    font-family: var(--font-main);
    background-color: hsl(var(--grooble));
    border: 2px solid hsl(var(--grooble));
    outline: none;
}
input, textarea {
    transition: all .2s ease-in-out;
}
input:hover, input:focus, textarea:hover, textarea:focus {
    box-shadow:
            0 0 0 2px hsl(var(--black)),
            0 0 0 3px hsl(var(--white));
    border: 2px solid transparent;
}
select {
    padding: .8em 1.2em;
    border: 1px solid hsl(var(--black));
    font-size: var(--paragraph);
    outline: none;
}

/* =========
    Classes
   ========= */

/* ================
    Global classes
   ================ */

/* =========
    Flexbox
   ========= */
.flexbox {
    display: flex;
    justify-content: center;
    align-items: center;
}
.flexbox-left {
    display: flex;
    justify-content: flex-start;
    align-items: center;
}
.flexbox-right {
    display: flex;
    justify-content: flex-end;
    align-items: center;
}
/* Columns */
.flexbox-col {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
}
.flexbox-col-left {
    display: flex;
    justify-content: flex-start;
    flex-direction: column;
    align-items: flex-start;
}
.flexbox-col-left-ns {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: flex-start;
}
.flexbox-col-right {
    display: flex;
    justify-content: flex-end;
    flex-direction: column;
    align-items: flex-end;
}
.flexbox-col-start-center {
    display: flex;
    justify-content: flex-start;
    flex-direction: column;
    align-items: center;
}
/* Spacings */
.flexbox-space-bet {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* =========
    Classes
   ========= */
.view-width {
    width: 90%;
}
.link-text {
    margin: 0;
    width: 0;
    text-overflow: ellipsis;
    white-space: nowrap;
    transition: all .35s cubic-bezier(var(--transition-main), 1);
    overflow: hidden;
    opacity: 0;
}

/* ======
    Main
   ====== */
#main {
    margin: 0 0 0 5em;
    min-height: 50vh;
}
#main > h2 {
    width: 100%;
    max-width: 100%;
}
#main > p {
    width: 100%;
    max-width: 100%;
}

/* =============
    ::Selectors
   ============= */
/* Selection */
::selection {
    color: hsl(var(--white));
    background: hsla(var(--primary), .33);
}
/* Scrollbar */
::-webkit-scrollbar-track {
    background-color: hsl(var(--background));
}
::-webkit-scrollbar {
    width: 8px;
    background-color: hsl(var(--background));
}
::-webkit-scrollbar-thumb {
    background-color: hsl(var(--primary));
}

/* ==============
    @media rules
   ============== */
@media only screen and (max-width: 1660px) {
    :root {
        /* Sizes */
        --heading-large: 5.4rem;
        --heading-medium: 3.4rem;
        --heading-small: 2.2rem;
    }
}
@media only screen and (max-width: 1456px) {
    :root {
        /* Sizes */
        --heading-large: 5.2rem;
        --heading-medium: 3.2rem;
        --heading-small: 2rem;
    }
    .view-width {
        width: 80%;
    }
}
@media only screen and (max-width: 1220px) {
    .view-width {
        width: 70%;
    }
}
@media only screen and (max-width: 1024px) {
    :root {
        /* Sizes */
        --heading-large: 5rem;
        --heading-medium: 3rem;
        --heading-small: 1.8rem;
    }
    .view-width {
        width: 75%;
    }
}
@media only screen and (max-width: 756px) {
    :root {
        /* Sizes */
        --heading-large: 4rem;
        --heading-medium: 2.6rem;
        --heading-small: 1.6rem;
        --paragraph: 1rem;
        --navbar-buttons: 2.2rem;
    }
    .view-width {
        width: calc(100% - 5em);
    }
}
@media only screen and (max-width: 576px) {
    .view-width {
        width: calc(100% - 3em);
    }
}
@media only screen and (max-width: 496px) {
}

/* Reponsive the button */
@media only screen and (max-width: 576px) {
  .cell {
    display: block;
    margin-bottom: 10px;
    text-align: center;
  }
  .cell a {
    display: inline-block;
    margin: 5px 0;
  }
  .button_slide {
    width: 100%;
  }
}

/* loading screen */
#loading-screen {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #985e49;
  display: flex;
  justify-content: center;
  align-items: center;
}
#loading-screen p {
  transform: translate(-50%, -50%);
  position: absolute;
  top: 50%;
  left: 49%;
  font-family: 'Fredoka One';
  font-size: 40px;
  color: #4c0000;
  text-shadow: -1px -1px 0 #A31919, -1px 1px 0 #7b0000, 1px -1px 0 #7b0000, 1px 1px 0 #7b0000;
}
.bg{fill:#985e49;}
	.steam{stroke:#FFF; fill: none; stroke-width: 2px;}
	.cup{fill:#FFF;stroke:#FFF;stroke-width:2;stroke-miterlimit:10;}
	.liquid{fill:#351F02;stroke:#351F02;stroke-miterlimit:10;}
	.sleeve{fill:#821200;}
	.lid{fill:#821200;stroke:#821200;stroke-width:2;stroke-miterlimit:10;}
@import url(https://fonts.googleapis.com/css?family=Fredoka+One);
.container{
   transform: translate(-50%, -50%);
   position: absolute;
   top: 50%;
   left: 50%;
}

/* ANIMATE LIQUID FILL */
.liquid {
   transform: translateX(100%);
   transform: translateY(100%);
   opacity: 0.8;
   animation: fill 3.2s;
   animation-fill-mode: forwards;
}
@keyframes fill {
   0%{
      opacity: 0.5;
      transform: translateY(100%);
   }
   100%{
      transform: translateY(0);
      opacity: 1;
   }
}

/* ANIMATE STEAM */
.steam {
   stroke: #F7F7F7;
   stroke-width: 1.5px;
   stroke-dasharray: 200;
   stroke-dashoffset: 200;
   opacity: 0.2;
   animation: steamAnimate 2.5s;
   animation-delay: 1.0s;
   animation-fill-mode: forwards;
}
@keyframes steamAnimate{
	0%{
		stroke-dashoffset: 200;
	}
	100%{
		stroke-dashoffset: 0;
	}
}

/* Footer */
footer {
  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align: center;
  position: fixed;
  bottom: 0;
  width: 100%;
}
.footer-content {
  max-width: 800px;
  margin: 0 auto;
}

/*login page*/
.logincontainer{
  padding: 0 20px;
  margin: 170px auto;
}
.wrapper{
  width: 100%;
  background: #ffffff;
  border-radius: 5px;
  box-shadow: 0px 4px 10px 1px rgba(0,0,0,0.1);
}
.wrapper .title{
  height: 90px;
  background: #ea6153;
  border-radius: 5px 5px 0 0;
  color: #ffffff;
  font-size: 30px;
  font-weight: 600;
  display: flex;
  align-items: center;
  justify-content: center;
}
.wrapper form{
  padding: 30px 25px 25px 25px;
}
.wrapper form .row{
  height: 45px;
  margin-bottom: 15px;
  position: relative;
}
.wrapper form .row input{
  height: 100%;
  width: 100%;
  outline: none;
  padding-left: 60px;
  border-radius: 5px;
  border: 1px solid lightgrey;
  font-size: 16px;
  transition: all 0.3s ease;
}
form .row input:focus{
  border-color: #ea6153;
  box-shadow: inset 0px 0px 2px 2px rgba(26,188,156,0.25);
}
form .row input::placeholder{
  color: #999999;
}
.wrapper form .row i{
  position: absolute;
  width: 47px;
  height: 100%;
  color: #ffffff;
  font-size: 18px;
  background: #ea6153;
  border: 1px solid #ea6153;
  border-radius: 5px 0 0 5px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.wrapper form .pass{
  margin: -8px 0 20px 0;
}
.wrapper form .pass a{
  color: #ea6153;
  font-size: 17px;
  text-decoration: none;
}
.wrapper form .pass a:hover{
  text-decoration: underline;
}
.wrapper form .button input{
  color: #ffffff;
  font-size: 20px;
  font-weight: 500;
  padding-left: 0px;
  background: #ea6153;
  border: 1px solid #ea6153;
  cursor: pointer;
}
form .button input:hover{
  background: #bc4336;
}
.wrapper form .rememberme{
  text-align: center;
  margin-top: 20px;
  font-size: 17px;
  margin-bottom: 10px;
}
.wrapper form .rememberme a{
  color: #ea6153;
  text-decoration: none;
}
form .rememberme a:hover{
  text-decoration: underline;
}

.custom-button {
    background-color: #4CAF50; 
    color: white; 
    padding: 10px 20px; 
    border: none; 
    border-radius: 5px; 
    cursor: pointer;
}


.custom-button:hover {
    background-color: #45a049; 
}

</style>
</head>

<body>
<!-- Main -->
<main id="main" class="flexbox-col view-width">
    <div class="logincontainer">
        <div class="wrapper">
            <div class="title"><span>Login Page</span></div>
            <form method="post" action="login.php">
            <div class="row">
                <input type="text" placeholder="Email" name="email" id="email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" required>
            </div>
            <div class="row">
                <input type="password" placeholder="Password" name="password" id="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" required>
            </div>
            <div class="rememberme">
                <label for="remember">Remember me</label>
                <input type="checkbox" name="remember" id="remember" checked <?php if(isset($_COOKIE["email"])) { ?> checked <?php } ?> />
            </div>
            <div class="row button">
                <input type="submit" value="Login" name="loginBtn"  class="custom-button">
            </div>
            </form>
        </div>
    </div>
</main>

  <!-- Loading screen-->
  <div id = "loading-screen">
    <div class="container">
        <svg version="1.1" x="0px" y="0px" width="501px" height="501px" viewBox="0 0 501 501" style="enable-background:new 0 0 501 501;" xml:space="preserve">
        <defs>
        <mask id="liquidMasked">
        <path fill="#FFF" d="M294.3,377.1c-32.8,9.4-68.2,9.3-101-0.2c-7.1-60.7-14.1-119.7-21.5-175.6c48.3,0,96.5,0,144.8,0 C309,257.2,301.7,316.3,294.3,377.1z"/
        </mask>
        </defs>
        <rect x="0.5" y="0.5" class="bg" width="500" height="500"/>
        <path class="cup" d="M301.4,382.2c-37.4,10.4-77.9,10.3-115.2-0.3c-8.1-66.7-16.1-131.6-24.5-193c55.1,0,110.1,0,165.2,0
        C318.1,250.3,309.8,315.3,301.4,382.2z"/>
        <g id="coffeeMasked" mask="url(#liquidMasked)">
        <path class="liquid" d="M293.8,376.6c-32.8,9.4-68.2,9.3-101-0.2c-7.1-60.7-14.1-119.7-21.5-175.6c0,0,12-7.1,31.3-0.4
        c29.8,10.3,32.7-0.2,48.7-0.2c27.4,0,29.2,8.8,44.7,1.3c14.7-7.1,20.2-0.7,20.2-0.7C308.5,256.7,301.2,315.8,293.8,376.6z"/>
        </g>
        <g class="steam"> 
        <path d="M308.5,169c0,0-16.5-17-13-32.5s22-5.5,13.5,6c-7.9,10.6-23.8-6.9-12-21.8c11.5-14.5,10.7-22,10-24.8
        c-5-18.4-18.6-5.8-12.6-1.1c9.4,7.1,15.2-16.5,13.2-24.5"/>
        </g>
        <path class="sleeve" d="M310.2,334.2c-44,5.4-88.4,5.4-132.4,0c-3.2-27.8-6.4-55.7-9.6-83.6c50.4,7.2,101.6,7.2,152,0
        C316.9,278.4,313.5,306.3,310.2,334.2z"/>
        <path class="lid" d="M337.2,187v13.8c0,0-15.8,3.7-92,3.7s-92-3.7-92-3.7V187c0-1.8,1.4-3.2,3.2-3.2h5.8v-11.5
        c0-3.6,2.9-6.5,6.5-6.5h131.8l3.4,2.2c1.1,0.7,2.5,0.7,3.7,0l3.7-2.2h10.9c3.3,0,6.1,2.7,6.1,6.1v11.9h5.8
        C335.8,183.8,337.2,185.2,337.2,187z"/>
        </svg>
        </div>
  </div>
<!-- Script for loading screen -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
      // Get the loading screen element
      const loadingScreen = document.getElementById('loading-screen');

      // Get the footer element
      const footer = document.querySelector('footer');

      // Show loading screen
      loadingScreen.style.display = 'flex';

      // Hide loading screen after 3 seconds
      setTimeout(function () {
          loadingScreen.style.display = 'none';
          // Show the footer after the loading screen is hidden
          footer.style.display = 'block';
      }, 3000);
  });
</script>

<footer style="display: none;">
    <p>&copy; 2024 Ricky, Stanley, Nico. All rights reserved.</p>
    <!-- Add social media -->
  </footer>
</body>
</html>
