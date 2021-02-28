<section class="menubar">
    <div class="topside d-flex flex-column align-items-center">
        <button class="menu-button logo">
            <i class="fab fa-twitter"></i>
        </button>
        <a href="<?= $router->route('app.home') ?>" class="menu-button <?= $home ?? "" ?>">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <strong>Página Inicial</strong>
        </a>
        <a href="#" class="menu-button">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            <strong>Notifications</strong>
        </a>
        <a href="#" class="menu-button">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            <strong>Mensagens</strong>
        </a>
        <a href="#" class="menu-button">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
            </svg>
            <strong>Favoritos</strong>
        </a>
        <a href="<?= $router->route('app.profile', ['user' => $user->user]) ?>" class="menu-button <?= $profile ?? "" ?>">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <strong>Perfil</strong>
        </a>
        <a href="#" class="btn">
            <img src="<?= midias('img/svg/feather.svg') ?>" alt="feather" />
            <span>Tweetar</span>
        </a>
    </div>
    <div class="botside d-flex align-items-center justify-content-center">
        <?php if (!empty($user->photo)) : ?>
            <img alt="<?= $user->user ?>" class="avatar" src="<?= url($user->photo) ?>" />
        <?php else : ?>
            <img alt="<?= $user->user ?>" class="avatar" src="<?= midias('img/profile.png') ?>" />
        <?php endif ?>
        <div class="profile-data">
            <strong><?= $user->name ?></strong>
            <span>@<?= $user->user ?></span>
        </div>
        <a href="<?= $router->route('app.logout') ?>" class="exit">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
        </a>
    </div>
</section>