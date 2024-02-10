<?php

class Model {
    protected $db;
    protected $result;

    public function __construct() {
        $this->db = new Database();
    }
}
