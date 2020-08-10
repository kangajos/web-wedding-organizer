<?php

if ( !defined( 'BASEPATH' ) )
    exit( 'No direct script access allowed' );

class Template {
    private $CI;
    private $_content_file;
    private $_content_data;
    private $_content_meta;

    public function __construct() {
        $this->CI =& get_instance();
    }

    public function initialize($config = array()) {
        $this->_content_file = (isset($config["content_file"])) ? $config["content_file"] : "";
        $this->_content_data = (isset($config["content_data"])) ? $config["content_data"] : "";
        $this->_content_meta = (isset($config["content_meta"])) ? $config["content_meta"] : "";
    }

    public function render($layouts) {
        $data["content_file"] = $this->_content_file;
        $data["content_data"] = $this->_content_data;
        $data["content_meta"] = $this->_content_meta;
        // $data["menu_data"] = array("all_menu" => $this->CI->menu->index());

         if ($layouts == "main") {
            $view = "layouts/main";
        }elseif ($layouts == "main_admin"){
            $view = "admin/layouts/main_admin";
        }else{
            $view = "layouts/main";
        }

        $this->CI->load->view($view, $data);
    }

}