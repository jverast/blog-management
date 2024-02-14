<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center" scope="col">id</th>
                <th class="text-center" scope="col">name</th>
                <th class="text-center" scope="col">email</th>
                <th class="text-center" scope="col">created at</th>
                <th class="text-center" scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($this->data['users'] as $user) { ?>
                <tr>
                    <td class="text-center"><?= $user['user_id'] ?></td>
                    <td><?= $user['first_name'] . ' ' . $user['last_name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['created_at'] ?></td>
                    <td class="text-center">
                        <?php if ($user['is_admin']) { ?>
                            <a class="text-decoration-none">
                                <button class="btn btn-dark btn-sm opacity-25" disabled>Delete</button>
                            </a>
                        <?php } else { ?>
                            <a class="text-decoration-none" href="<?= 'dashboard?d=admin&r=' . $user['user_id'] ?>">
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </a>
                        <?php } ?>
                    </td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>