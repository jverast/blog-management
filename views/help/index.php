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
            <div class="card mt-2 mb-4">
                <div class="card-body">
                    <h3 class="card-title mb-3">Help</h4>
                        <p>Welcome to our Help Center! Here you'll find answers to common questions and information about using our blog platform.</p>
                        <h5>How to Create a New Blog Post
                    </h3>
                    <p>To create a new blog post, simply log in to your account and navigate to the dashboard. From there, click on the "New Post" button and fill in the required information, such as the title and content of your post. Once you're done, click on the "Publish" button to make your post live.</p>

                    <h5>How to Customize Your Blog</h3>
                        <p>You can customize the look and feel of your blog by accessing the settings in your dashboard. From there, you can change the theme, add widgets, and customize the layout to suit your preferences.</p>
                </div>
            </div>
        </div>
        <?php require_once 'views/includes/footer.php' ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="<?= ROOT_URL . 'public/js/main.js' ?>"></script>
</body>

</html>