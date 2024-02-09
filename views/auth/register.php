<form action="<?= ROOT_URL ?>auth/register" method="post">
    <div class="mb-3">
        <label for="inputFirstName" class="form-label">First name</label>
        <input class="form-control" id="inputFirstName" name="first_name" required>
    </div>
    <div class="mb-3">
        <label for="inputLastName" class="form-label">Last name</label>
        <input class="form-control" id="inputLastName" name="last_name" required>
    </div>
    <div class="mb-3">
        <label for="inputEmail" class="form-label">Email address</label>
        <input type="email" class="form-control" id="inputEmail" name="email" required>
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="inputPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="inputPassword" name="password" required>
    </div>
    <div class="mb-3">
        <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="inputConfirmPassword" name="confirm_password" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>