<header>
    <nav class="nav">
        <div class="nav-menu flex-row">
            <div class="nav-brand">
                <a href="./index.php" class="text-gray">GreenWorld</a>
            </div>
            <i class="fa fa-bars menu-toggle"></i>
            <ul class="nav">
            <?php if (isset($_SESSION['id'])): ?>
                <li>
                    <button onclick="dropdownMenu()" class="dropbtn">
                    <i class="fa fa-user"></i>    
                    <?php echo $_SESSION['username']; ?>
                    </button>
                    <div id="setDropdown" class="dropdown-content">
                        <?php if($_SESSION['admin']): ?>
                        <a href="<?php echo BASE_URL . '/admin/dashboard.php' ?>">Dashboard</a>
                        <?php endif; ?>
                        <a href="<?php echo BASE_URL . '/logout.php' ?>" class="logout">Logout</a>
                    </div>
                </li>
            <?php else: ?>
                <li><a href="<?php echo BASE_URL . '/register.php' ?>">Sign Up</a></li>
                <li><a href="<?php echo BASE_URL . '/login.php' ?>">Login</a></li>
            <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>

<script>
function dropdownMenu() {
    document.getElementById("setDropdown").classList.toggle("show");
}
  
  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

</script>