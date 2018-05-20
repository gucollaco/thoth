<?php

echo 'Olá - ' . $this->session->userdata('login') . ' ';

echo '<a href="' . base_url() . 'usuarios/logout">Logout</a>';
// aqui já passou pelo hook, então ta logado
redirect(base_url($this->session->userdata('tipo')));

