<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="<?= ROOT_URL ?>">My App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= ROOT_URL ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Help</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <?php if (isset($_SESSION['logged_in'])) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            User's Panel
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">User settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) { ?>
                                <li><a class="dropdown-item" href="<?= ROOT_URL ?>/administration">Administration</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            <?php } ?>
                            <li><a class="dropdown-item text-danger fw-bold" href="?action=logout">Log out</a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <a class="nav-link" href="<?= ROOT_URL . 'auth?d=login' ?>">Login</a>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>