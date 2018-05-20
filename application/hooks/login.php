<?php 

function is_logged() {
    $ci = & get_instance();
    $page = $ci->uri->segment(1);
    if ($page != 'login') {
        echo $ci->session->userdata('login');
        if ($ci->session->userdata('login') == NULL) {
            redirect(base_url('login'));
        }
    }
}
