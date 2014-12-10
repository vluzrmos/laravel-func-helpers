Laravel FuncHelpers
====================

Funções helpers para projetos Laravel.

Basta adicionar no seu compose.json:

<pre>
"require": {
  "vluzrmos/func-helpers":"dev-master"
}
</pre>

e depois atualizar seu composer <code>composer update vluzrmos/func-helpers</code>, 
todas as funções serão carregadas.

Exemplo
=======

```php
t("reminders.password") /* Alias para Lang::get() */

str_words("lorem ipsum sit at doem", 3, "..."); /* Limita a string dada à 3 palavras (alias para Str::words)*/

class_dotcase(new Admin\User\Profile); /* Retornará uma string com: admin.user.profile */

str_autolink("Visite meu github https://github.com/vluzrmos", ["target"=>"_blank"]); /* Trasforma o link para meu github em uma tag html */

is_email("vluzrmos@gmail.com"); /* Verifica que a string dada é um email válido*/

encrypt($str) e decrypt($encryptedStr); /* Encripta e decripta uma string (alias para Crypt::encrypt e Crypt::decrypt */


/*
  Combinando arrays unidimensionais
*/

$names = array('john', 'willian', 'matheus');
$last_names = array('doel', 'shaks', 'kelvin');
$keys = array('first_name', 'last_name');

array_combine_values_assoc($keys, $names, $last_names);
/*   retornará */
[
  ["first_name" => "john", "last_name"=>"doel"],
  ["first_name" => "willian", "last_name"=>"shaks"],
  ["first_name" => "matheus", "last_name"=>"kelvin"]
];

``` 

