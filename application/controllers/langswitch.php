<?php
class LangSwitch extends CI_Controller
{
    public function __construct() {
        parent::__construct();
    }

    function switchLanguage($language = "") {
        $language = ($language != "") ? $language : "english";
        $this->session->set_userdata('lang', $language);
        echo "thanh cong";
        redirect(base_url()."index.php/tinh");
    }
}