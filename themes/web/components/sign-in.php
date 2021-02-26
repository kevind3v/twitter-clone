<div class="modal fade" id="sign-in-modal" tabindex="-1" role="dialog" aria-labelledby="sign-in-modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered app-modal" role="document">
        <div class="modal-content px-3">
            <div class="modal-header justify-content-center">
                <img class="mt-3" width="30" height="30" src="<?= midias('img/svg/bird.svg') ?>" alt="Twitter" />
            </div>
            <div class="modal-body mb-2">
                <form action="<?= $router->route("web.register") ?>" method="POST" class="form" id="sign-in">
                    <div class="row ">
                        <div class="col">
                            <h4>Crie sua conta</h4>
                        </div>
                        <div class="col-12">
                            <p class="ajax_response"></p>
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <input required id="name" type="text" name="name" class="form-control i-form" />
                        <label for="name">Nome</label>
                    </div>

                    <div class="form-group">
                        <input required id="username" type="text" name="username" class="form-control i-form" />
                        <label for="username">Nome de usuário</label>
                    </div>

                    <div class="form-group">
                        <input  id="email" type="email" name="email" class="form-control i-form" />
                        <label for="email">E-mail</label>
                    </div>

                    <div class="form-group">
                        <input required id="password" autocomplete="off" name="password" type="password" class="form-control i-form" />
                        <label for="password">Senha</label>
                    </div>

                    <div class="mt-4 pb-4">
                        <small class="form-text">
                            Ao inscrever-se, você concorda com os <a href="#">Termos</a>,
                            <a href="#"> Políticas de Privacidade</a>, e <a href="#">Uso de Cookies</a>.
                        </small>
                    </div>

                    <button class="btn btn-sign-in btn-block">Inscrever-se</button>
                </form>
            </div>
        </div>
    </div>
</div>