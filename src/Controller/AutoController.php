<?php
namespace Controller;

class AutoController
{
    protected $path, $data;

    public function __construct($path, $data = array()) {
        $this->path = $path;
        $this->data = $data;
    }

    public function render() {
        extract($this->data);
        include $this->path;
    }
}