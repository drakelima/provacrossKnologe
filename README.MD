## Cache function
### O arquivo request.php se encontra em app/Http/Controllers
### Abra o terminal no projeto e execute os comandos abaixo para instalar as dependencias junto ao redis
```
composer install && php require predis/predis
```

### Execute o comando abaixo caso deseje um debug para verificar a eficácia dos caches nas requisições
```
composer require barryvdh/laravel-debugbar --dev
```

### Altere a constante para redis no arquivo .env como mostra abaixo
```
CACHE_DRIVER=redis
```

### No arquivo config/app acrescente a linha correspondente nos 'aliases'
```
'Debugbar' => Barryvdh\Debugbar\Facade::class,
```

### Execute as rotas conforme o arquivo web.php para testar o cache

## Date Formatting
### Abra o arquivo date-format.html no Crome para testar

## Apply styles
### Abra o arquivo component.html para testar