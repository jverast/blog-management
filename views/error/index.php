<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="public/css/styles.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex flex-column vh-100">
        <?php require_once 'views/includes/header.php' ?>
        <div class="container flex-grow-1">
            <h1 class="foo">Error <?= $this->error_details['error_message'] ?></h1>
        </div>
        <?php require_once 'views/includes/footer.php' ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="<?= ROOT_URL . 'public/js/main.js' ?>"></script>
</body>

</html>