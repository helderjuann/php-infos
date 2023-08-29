<h3>Esse é o meu Hello World!</h3>
<?php 

$helloWorld = ['H','-','e','-','l','-','l','-','o'];
$string = '';
for($i = 0; $i < count($helloWorld); $i++){
    if($helloWorld[$i] == '-') {
        continue;
    }
    /*if($helloWorld[$i] != '-') {
        continue;
    }*/
    $string.= $helloWorld[$i];
}
echo $string;
echo '<br><br>';

?>

<h3>Status do formulário</h3>

<?php

if(isset($_POST['action'])){
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];

    if(strlen($name) >= 3) {
        if(is_numeric($name) == false) {
            $name_parts = explode(' ', $name);
            $first_name = $name_parts[0];
            echo 'Valeu, ' . $first_name;
            echo '<br>';
        } else {
            echo 'O nome não pode ter números';
            echo '<br>';
        }
    } else {
        echo 'Digite o seu nome!';
        echo '<br>';
    }
    
    if(is_numeric($number)) {
        echo 'Número validado com sucesso!';
        echo '<br>';
    } else {
        echo 'Por favor, digite um número!';
        echo '<br>';
    }

    if(strstr($email, '@') != '') {
        echo "E-mail validado com sucesso!";
        echo '<br>';
        
        $domain = explode('@', $email)[1];
        $domain_parts = explode('.', $domain);
        $email_provider = $domain_parts[0];
        
        echo 'Seu provedor é: ' . $email_provider;
        echo '<br>';
    } else {
        echo 'Por favor, digite um e-mail válido!';
        echo '<br>';
    }
}

?>

<h3>Preencha o formulário</h3>

<form method="post">
    <p>Seu nome:</p>
    <input type="text" name="name" placeholder="Digite o seu nome" required>
    <p>Seu número:</p>
    <input type="text" name="number" placeholder="Digite o seu número" required>
    <p>Seu email:</p>
    <input type="text" name="email" placeholder="Digite o seu e-mail" required>
    <input type="submit" name="action" value="Enviar">
</form>

<h3>Função para identificar números em comum dentro de arrays diferentes</h3>

<?php 

$array_0 = array(10,33,2,4,7,12,46,66,47,32,18,283,432,9,87,82);
$array_1 = array(6,12,18,93,23,34,60,70,54,74,5,46,65,25,80,76);

$common_in = array();

for($i = 0; $i < count($array_0); $i++) {
    for($u = 0; $u < count($array_1); $u++) {
        if($array_0[$i] === $array_1[$u]) {
            $common_in[] = $array_0[$i];
        }
    }
}

foreach ($common_in as $key => $value) {
    echo $value;
    echo ' ';
}

?>

<h3>Função para identificar números em comum dentro do mesmo array</h3>

<?php 

$array = array('Matheus','Guilherme','Pedro','Gabriel','Helder','Marcelo','Felipe','Gabriel');

$array_rep = array();

for($i = 0; $i < count($array); $i++) {
    $value_now = $array[$i];
    if(!isset($array_rep[$value_now])) {
        $array_rep[$value_now] = 0;
    } else {
        $array_rep[$value_now]++;
    }
}

foreach ($array_rep as $key => $value) {
    echo $key;
    echo ' ',$value;
    echo '<hr>';
}

?>

<h3>Números aleatórios para preencher um array - Sem repetir nenhum número</h3>

<?php

$arr = [];

for($i = 0; $i < 5; $i++) {
    $arr[$i] = rand(1,99);
    while(inArrayCustom($i, $arr[$i], $arr)) {  
        $arr[$i] = rand(1,99);
    }
}

print_r($arr);
function inArrayCustom($index,$value,$arr) {
    for($i = 0; $i < count($arr); $i++) {
        if($arr[$i] == $value && $i != $index) {
            return true;
        }
    }
        return false;
}

?>