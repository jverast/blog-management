<nav class="d-flex justify-content-center">
    <ul class="pagination">
        <?php if ($this->data['current_page'] != 1) { ?>
            <li class="page-item">
                <a class="page-link" href="<?= '?page=' . $this->data['current_page'] - 1 ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php } ?>
        <?php for ($i = 0; $i < $this->data['pages']; $i++) { ?>
            <li class="page-item"><a class="page-link" href="<?= '?page=' . $i + 1 ?>"><?= $i + 1 ?></a></li>
        <?php } ?>
        <?php if ($this->data['current_page'] != $this->data['pages']) { ?>
            <li class="page-item">
                <a class="page-link" href="<?= '?page=' . $this->data['current_page'] + 1 ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php } ?>
    </ul>
</nav>