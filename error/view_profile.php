<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>View Profile</title>
  <link rel="shortcut icon" href="https://static.vecteezy.com/system/resources/previews/010/160/674/original/coffee-icon-sign-symbol-design-free-png.png" type="image/png">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Icons+Round'>
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
    width: 70%;
}

/* ========
    Navbar
   ======== */

#navbar {
    top: 0;
    padding: 0;
    width: 5em;
    height: 100vh;
    position: fixed;
    background-color: hsl(var(--background-secondary));
    transition: width .35s cubic-bezier(var(--transition-main), 1);
    overflow-y: auto;
    overflow-x: hidden;
}
#navbar:hover {
    width: 16em;
}
#navbar::-webkit-scrollbar-track {
    background-color: hsl(var(--background-secondary));
}
#navbar::-webkit-scrollbar {
    width: 8px;
    background-color: hsl(var(--background-secondary));
}
#navbar::-webkit-scrollbar-thumb {
    background-color: hsl(var(--primary));
}
.navbar-items {
    margin: 0;
    padding: 0;
    list-style-type: none;
}
/* Navbar Logo */
.navbar-logo {
    margin: 0 0 2em 0;
    width: 100%;
    height: 5em;
    background: hsl(var(--background-secondary-dark));
    overflow: hidden;
}

.navbar-logo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.navbar-logo > .navbar-item-inner {
    width: 100%;
    height: 100%;
}

/* Navbar Items */
.navbar-item {
    padding: 0 .5em;
    width: 100%;
    cursor: pointer;
}
.navbar-item-inner {
    padding: 1em 0;
    width: 100%;
    position: relative;
    color: hsl(var(--quite-gray));
    border-radius: .25em;
    text-decoration: none;
    transition: all .2s cubic-bezier(var(--transition-main), 1);
}
.navbar-item-inner:hover {
    color: hsl(var(--white));
    background: hsl(var(--background-secondary-light));
    box-shadow: 0 17px 30px -10px hsla(var(--black), .25);
}
.navbar-item-inner-icon-wrapper {
    width: calc(5rem - 1em - 8px);
    position: relative;
}
.navbar-item-inner-icon-wrapper ion-icon {
    position: absolute;
    font-size: calc(var(--navbar-buttons) - 1rem);
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
#navbar:hover .link-text {
    width: calc(100% - calc(5rem - 8px));
    opacity: 1;
}

/* ======
    Main
   ====== */

#main {
    margin: 0 0 3em 5em;
    min-height: 50vh;
}
#main > h2 {
    width: 80%;
    max-width: 80%;
}
#main > p {
    width: 80%;
    max-width: 80%;
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

/* ===============
    5. @keyframes
   =============== */

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

/* Search popup */

.search-popup {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(255, 255, 255, 0.4);
  display: none;
  justify-content: center;
  align-items: center;
  z-index: 1000;
}

.search-popup .content {
  padding: 1rem 3rem;
  background: white;
  max-width: 400px;
  padding-top: 2rem;
  border-radius: 20px;
  box-shadow: 0 5px 30px 0 rgba(0, 0, 0, 0.1);
}

.search-popup .x {
  filter: grayscale(1);
  border: none;
  background: none;
  position: absolute;
  top: 15px;
  right: 10px;
  transition: ease filter, transform 0.3s;
  cursor: pointer;
  transform-origin: center;
}

.search-popup .x:hover {
  filter: grayscale(0);
  transform: scale(1.1);
}

.search-popup h2 {
  font-weight: 600;
  font-size: 2rem;
  padding-bottom: 1rem;
}

.search-popup p {
  font-size: 1rem;
  line-height: 1.3rem;
  padding: 0.5rem 0;
}

/* Search bar */
.search-popup .search-bar {
  padding: 0.5em;
  font-size: 1rem;
  background-color: hsl(var(--grooble));
  border: 2px solid hsl(var(--grooble));
  outline: none;
  width: 100%;
  box-sizing: border-box;
}

.search-popup .search-bar:focus {
  box-shadow:
    0 0 0 2px hsl(var(--black)),
    0 0 0 3px hsl(var(--white));
  border: 2px solid transparent;
}


/* Table styles */

.wrapper {
  margin: 0 auto;
  padding: 40px;
  max-width: 1200px; /* Adjust the max-width as needed */
}

.table {
  margin: 0 0 40px 0;
  width: 100%;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
  display: table;
  text-align: center;
}

.row {
  display: table-row;
  background: #f6f6f6;
}

.row:nth-of-type(odd) {
  background: #e9e9e9;
}

.row.header {
  font-weight: 900;
  color: #ffffff;
  background: #ea6153;
}

.row.green {
  background: #27ae60;
}

.row.blue {
  background: #2980b9;
}

.cell {
  padding: 6px 12px;
  display: table-cell;
  vertical-align: middle; 
  text-align: center; 
}

.cell:before {
  display: none;
}

/* Responsive styles */
@media screen and (max-width: 580px) {
  .wrapper {
    padding: 20px;
  }

  .table {
    display: block;
  }

  .row {
    padding: 14px 0 7px;
    display: block;
  }

  .row.header {
    padding: 0;
    height: 6px;

    .cell {
      display: none;
    }
  }

  .cell {
    margin-bottom: 10px;

    &:before {
      margin-bottom: 3px;
      content: attr(data-title);
      min-width: 98px;
      font-size: 10px;
      line-height: 10px;
      font-weight: bold;
      text-transform: uppercase;
      color: #969696;
      display: block;
    }
  }
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


/* Updated CSS for button-like links */
.cell a {
  display: inline-block;
  color: #fff;
  text-decoration: none;
  border-radius: 3px;
  transition: background-color 0.3s;
}
.button_slide {
  color: #0a0a0a;
  border: 2px solid hsl(202, 92%, 59%);
  background-color: hsl(202, 92%, 59%);
  border-radius: 0px;
  padding: 5px 6px;
  display: inline-block;
  font-size: 14px;
  letter-spacing: 1px;
  cursor: pointer;
  box-shadow: inset 0 0 0 0 #D80286;
  transition: ease-out 0.4s;
  font-weight: 450;
}

.slide_down:hover {
  box-shadow: inset 0 100px 0 0 #D80286;
  border: 2px solid #D80286;
  color: #e9e9e9;
}
.slide_right:hover {
  box-shadow: inset 400px 0 0 0 #D80286;
  border: 2px solid #D80286;
  color: #e9e9e9;
}

.slide_left:hover {
  box-shadow: inset 0 0 0 50px #D80286;
  border: 2px solid #D80286;
  color: #e9e9e9;
}

.cell img {
  max-width: 100%;
  height: 100px; 
  object-fit: cover; 
  display: block;
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

.profile-container {
  background-color: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
  overflow: hidden;
  max-width: 400px;
  width: 100%;
  margin: auto;
}
.profile-image {
  width: 100%;
  height: auto;
}
.info-block {
  padding: 20px;
  border-bottom: 1px solid #eee;
}
.info-block:last-child {
  border-bottom: none;
}
.info-block label {
  font-weight: bold;
}
.password-container {
  display: flex;
  align-items: center;
  padding: 20px;
}
.eye-icon {
  margin-left: auto;
  cursor: pointer;
}

#edit-form {
  display: none;
  margin-top: 20px; /* Adjust the margin based on your layout */
}

#edit-form label {
  display: block;
  margin-bottom: 5px;
}

#edit-form input {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  box-sizing: border-box;
}

#edit-form button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 15px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  margin-right: 5px;
}

#edit-form button:hover {
  background-color: #45a049;
}

#edit-form button:last-child {
  background-color: #f44336; /* Red color for Cancel button */
}

#edit-form button:last-child:hover {
  background-color: #d32f2f; /* Darker red color for Cancel button on hover */
}

/* Add this to your existing CSS or create a new CSS file */

.edit-button {
  background-color: #3498db;
  color: white;
  padding: 8px 12px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.edit-button:hover {
  background-color: #2980b9;
}

label[for="editInput"] {
  font-weight: bold;
  margin-left: 10px;
}    
</style>
</head>
<body>

<!-- Navbar -->
<nav id="navbar">
  <ul class="navbar-items flexbox-col">
    <li class="navbar-logo flexbox-left">
      <a class="navbar-item-inner flexbox">
        <img src="https://www.freepnglogos.com/uploads/coffee-logo-png/coffee-logo-design-creative-idea-logo-elements-2.png" alt="Coffee Logo">
      </a>
    </li>
    <li class="navbar-item flexbox-left">
        <a class="navbar-item-inner flexbox-left" id="search-trigger">
          <div class="navbar-item-inner-icon-wrapper flexbox">
            <ion-icon name="search-outline"></ion-icon>
          </div>
          <span class="link-text">Search</span>
        </a>
      </li>

    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left" href="dashbord.html">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="pie-chart-outline"></ion-icon>
        </div>
        <span class="link-text">Dashboard</span>
      </a>
    </li>

      <li class="navbar-item flexbox-left">
        <a href="profile.html" class="navbar-item-inner flexbox-left">
            <div class="navbar-item-inner-icon-wrapper flexbox">
                <ion-icon name="person-outline"></ion-icon>
            </div>
            <span class="link-text">Profile</span>
        </a>
    </li>
  </ul>
  <!-- Search pop up -->
  <div id="search-popup" class="search-popup">
    <button onclick="closeSearchPopup()" aria-label="close" class="x">❌</button>
    <div class="content">
      <h2>Hello.</h2>
      <p>Halo nama saya bambang dan search ini di bawah ini masih tidak bisa</p>
      <!-- Your search bar or content goes here -->
      <input type="text" placeholder="Search" class="search-bar">
    </div>
    </div>

</nav>

<main id="main" class="flexbox-col view-width">
    <h2>View Profile</h2>
    <div class="wrapper">
        <div class="profile-container">

            <?php
            $hostname = "localhost";
            $username = "admin";
            $password = "admin123";
            $database = "attendance_system";

            $connection = new mysqli($hostname, $username, $password, $database);

            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            $sql = "SELECT * FROM `admin`";
            $result = $connection->query($sql);
            if ($result) {
                if ($result->num_rows > 0) {
                    while ($adminData = $result->fetch_assoc()) {
                        ?>
                        <div class="info-block">
                            <label for="firstName">First Name:</label>
                            <p id="firstName"><?php echo $adminData['firstName']; ?></p>
                            <button class="edit-button" onclick="editInfo('firstName')">Edit</button>
                        </div>

                        <div class="info-block">
                            <label for="lastName">Last Name:</label>
                            <p id="lastName"><?php echo $adminData['lastName']; ?></p>
                            <button class="edit-button" onclick="editInfo('lastName')">Edit</button>
                        </div>

                        <div class="info-block">
                            <label for="email">Email:</label>
                            <p id="email"><?php echo $adminData['email']; ?></p>
                            <button class="edit-button" onclick="editInfo('email')">Edit</button>
                        </div>

                        <div class="info-block">
                            <label for="bio">Bio:</label>
                            <p id="bio"><?php echo $adminData['bio']; ?></p>
                            <button class="edit-button" onclick="editInfo('bio')">Edit</button>
                        </div>
                        <div class="password-container">
                            <label for="password">Password:</label>
                            <p id="password" style="margin: 0; visibility: hidden;"><?php echo $adminData['password']; ?></p>
                            <span class="eye-icon" onclick="togglePasswordVisibility()">👁️</span>
                        </div>
                        <?php
                    }
                } else {

                    echo "No admins found.";
                }
            } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
            }
            $connection->close();
            ?>

            
            <div id="edit-form" style="display: none;">
                <label for="editInput">Edit:</label>
                <input type="text" id="editInput">
                <button onclick="saveEdit()">Save</button>
                <button onclick="cancelEdit()">Cancel</button>
            </div>
        </div>
    </div>
    <div></div>
</main>

  <!--Update from Ricky-->

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
<!-- Script for navbar -->
<script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js'></script>
<script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js'></script>
<!-- Script for popup -->

<footer style="display: none;">
    <p>&copy; 2024 Ricky, Stanley, Nico. All rights reserved.</p>
    <!-- Add social media -->
  </footer>


<script>
document.addEventListener('DOMContentLoaded', function () {
  // Check if the $userData variable is defined
  if (typeof $userData !== 'undefined') {
      // Update HTML elements with fetched data
      document.getElementById('firstName').innerText = $userData.firstName;
      document.getElementById('lastName').innerText = $userData.lastName;
      document.getElementById('email').innerText = $userData.email;
      document.getElementById('bio').innerText = $userData.bio;
  }
});

async function fetchUserProfile() {
  try {
      const response = await fetch('fetch_user_profile.php');
      
      if (!response.ok) {
          throw new Error(`HTTP error! Status: ${response.status}`);
      }

      const data = await response.json();

      // Update HTML elements with fetched data
      document.getElementById('firstName').innerText = data.firstName;
      document.getElementById('lastName').innerText = data.lastName;
      document.getElementById('email').innerText = data.email;
      document.getElementById('bio').innerText = data.bio;
  } catch (error) {
      console.error('Error fetching user profile:', error);
  }
}

// Call the fetchUserProfile function when the page loads
document.addEventListener('DOMContentLoaded', function () {
  fetchUserProfile();
});



function togglePasswordVisibility() {
  const passwordParagraph = document.getElementById('password');
  const eyeIcon = document.querySelector('.eye-icon');

  if (passwordParagraph.style.visibility !== 'hidden') {
    passwordParagraph.style.visibility = 'hidden';
    eyeIcon.textContent = '👁️';
  } else {
    passwordParagraph.style.visibility = 'visible';
    eyeIcon.textContent = '👁️';
  }
}

let editingField;

function editInfo(field) {
    const valueElement = document.getElementById(field);
    const editForm = document.getElementById('edit-form');
    const editInput = document.getElementById('editInput');

    editingField = field;

    // Set the current value to the input field
    editInput.value = valueElement.innerText;

    // Show the edit form
    editForm.style.display = 'block';
}

function saveEdit() {
    const editInput = document.getElementById('editInput');
    const valueElement = document.getElementById(editingField);

    // Update the value in the profile
    valueElement.innerText = editInput.value;

    // Hide the edit form
    document.getElementById('edit-form').style.display = 'none';
}

function cancelEdit() {
    // Hide the edit form
    document.getElementById('edit-form').style.display = 'none';
}
</script>
</body>
</html>