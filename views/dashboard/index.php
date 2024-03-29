<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="d-flex flex-column vh-100">
        <?php require_once 'views/includes/header.php' ?>
        <div class="container flex-grow-1">
            <div class="card mt-2 mb-4">
                <div class="card-body">
                    <h4 class="card-title mb-3"><?= $this->title ?></h4>

                    <?php require_once 'views/includes/alert.php' ?>

                    <!-- USER SETTINGS | NEW BLOG | USER MANAGEMENT ( -->
                    <?php
                    switch ($this->display) {
                        case 'settings':
                            require_once 'views/dashboard/settings.php';
                            break;
                        case 'new-blog':
                            require_once 'views/dashboard/new-blog.php';
                            break;
                        case 'admin':
                            require_once 'views/dashboard/admin.php';
                            break;
                    }
                    ?>

                </div>
            </div>
        </div>
        <?php require_once 'views/includes/footer.php' ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="<?= ROOT_URL . 'public/js/main.js' ?>"></script>
</body>

</html>