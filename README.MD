## Cache function
 Abra o terminal no projeto e Instale as dependencias executando o comando abaixo:

```
composer install
```

 Considernado o Redis já configurado na máquina de acordo com as configurações passadas em https://github.com/phpredis/phpredis#class-redis execute o comando abaixo para executar os testes das requisições e observe a diferença em tempo entre as duas primeiras execuções do comando (o primeiro ele grava em cache e o segundo usa o cache).

```
./vendor/bin/phpunit requestTest.php
```

## Date Formatting
### Abra o arquivo date-format.html no Crome para testar

## Apply styles
### Abra o arquivo component.html para testar