<?php

$this->layout("_theme", ["title" => "Confirme e ative sua conta no Twitter Clone"]); ?>

<h2>Seja bem-vindo(a) ao Twitter Clone @<?= $username; ?>. Vamos confirmar seu cadastro?</h2>
<p>Obrigado por fazer parte do Twitter Clone, agora confirme o sue e-mail, logo após termine de se cadastrar no nosso site.</p>
<p><a title='Confirmar Cadastro' href='<?= $confirm_link; ?>'>CLIQUE AQUI PARA CONFIRMAR</a></p>