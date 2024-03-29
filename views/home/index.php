<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="<?= ROOT_URL . 'public/css/styles.css' ?>" rel="stylesheet">
</head>

<body>
    <div class="d-flex flex-column vh-100">
        <?php require_once 'views/includes/header.php' ?>
        <div class="container flex-grow-1 mb-3">
            <!-- <h1 class="mb-3">Blogs</h1> -->
            <?php require_once 'views/includes/alert.php' ?>
            <div class="row row-gap-4 mt-3">
                <?php
                if (isset($this->data['blogs'])) foreach ($this->data['blogs'] as $blog) { ?>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card blog-thumb border-0">
                            <img class="card-img-top blog-thumb-img-top" src="<?= 'public/assets/images/' . $blog['thumbnail_url'] ?>" alt="Title" />
                            <div class="card-body">
                                <h4 class="card-title blog-thumb-title"><a class="blog-thumb-title-link" href="<?= ROOT_URL . 'blog?id=' . $blog['blog_id'] ?>"><?= strlen($blog['title']) > 50 ? substr($blog['title'], 0, 50) . ' ...' : $blog['title'] ?></a></h4>
                                <p class="card-text"><?= substr(preg_replace("/\n|\r/", "", $blog['excerpt']), 0, 175) . ' ...' ?></p>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>
                <?php if (isset($this->data['blogs']) && $this->display !== 'search') {
                    require_once 'views/home/pagination.php';
                } ?>
            </div>
        </div>
        <?php require_once 'views/includes/footer.php' ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="<?= ROOT_URL . 'public/js/main.js' ?>"></script>
</body>

</html>