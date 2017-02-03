
<!--Arquivo da barra de navegação fixa no topo do site-->

<nav role="navigation" class="navbar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo BASE_URL; ?>">NET</a>
            <?php if($page!='login'):?>
            <button class="hamburger hamburger--squeeze navbar-toggle" type="button" aria-expanded="true" aria-controls="navbar">
                <span class="hamburger-box">
                  <span class="hamburger-inner"></span>
                </span>
            </button>
            <?php endif;?>
        </div>
        
    </div>
</nav>

