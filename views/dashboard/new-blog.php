<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="inputTitle" class="form-label">title</label>
        <input class="form-control" id="inputTitle" name="blog_title" required>
    </div>
    <div class="mb-3">
        <label for="inputThumbnail" class="form-label">thumbnail</label>
        <input type="file" class="form-control" id="inputThumbnail" name="blog_thumbnail" accept=".jpg, .jpeg, .png" required>
    </div>
    <div class="mb-3">
        <label for="inputContent" class="form-label">Content</label>
        <textarea class="form-control" id="inputContent" rows="5" name="blog_content" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="blog_submit">Submit</button>
</form>