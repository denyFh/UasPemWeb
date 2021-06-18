<header class="two">
    <nav class="nav">
        <div class="nav-menu flex-row">
            <div class="nav-brand">
                <a href="../../index.php" class="text-gray">GreenWorld</a>
            </div>
            <i class="fa fa-bars menu-toggle"></i>
            <ul class="nav">
                <?php if (isset($_SESSION['username'])): ?>
                    <li>
                        <button onclick="dropdownMenu()" class="dropbtn">
                            <i class="fa fa-user"></i>
                            <?php echo $_SESSION['username']; ?>
                        </button>
                        <div id="setDropdown" class="dropdown-content">
                            <a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout">Logout</a>
                        </div>
                    </li>
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