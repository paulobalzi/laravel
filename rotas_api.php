<?php

// configurando
// file: routes/api.php

// o acesso fica assim: api/categorias
// todas as rotas de api são acessadas pelo caminho "api/rota"
Route::get('/categorias', function() {
    return 'data';
})
