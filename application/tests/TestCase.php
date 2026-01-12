<?php

class TestCase extends PHPUnit_Framework_TestCase
{
    /**
     * @var CI_Controller
     */
    protected $CI;

    public function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();
    }
}
