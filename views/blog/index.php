<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="d-flex flex-column vh-100">
        <?php require_once 'views/includes/header.php' ?>
        <div class="container flex-grow-1">
            <div class="card mt-2 mb-4">
                <div class="card-body">
                    <h4 class="card-title mb-3 text-center fs-2"><?= $this->data['blog']['title'] ?></h4>
                    <?php require_once 'views/includes/alert.php' ?>
                    <img class="d-block mx-auto img-fluid mb-3" src="public/assets/images/<?= $this->data['blog']['thumbnail_url'] ?>">
                    <div class="mb-3">
                        <i class="bi bi-calendar me-2"></i> <span class="fst-italic opacity-75"><?= $this->data['blog']['created_at'] ?></span>
                    </div>
                    <p><?= $this->data['blog']['excerpt'] ?></p>
                    <div class="d-flex justify-content-end">
                        <i class="bi bi-person-circle me-2" style="margin-top: 1px"></i> <span class="fst-italic opacity-75"><?= $this->data['blog']['first_name'] . ' ' . $this->data['blog']['last_name'] ?></span>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once 'views/includes/footer.php' ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>