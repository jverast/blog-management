<form action="<?= ROOT_URL ?>auth/login" method="post">
    <div class="mb-3">
        <label for="inputEmail" class="form-label">Email address</label>
        <input type="email" class="form-control" id="inputEmail" name="email" required>
    </div>
    <div class="mb-3">
        <label for="inputPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="inputPassword" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <div class="mt-3">Don't have an account? <a href="<?= ROOT_URL ?>auth?d=register">Register One!</a></div>
</form>