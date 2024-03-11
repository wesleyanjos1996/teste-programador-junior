<?php

class Ramal
{
    // Atributos
    private $ramais;
    private $filas;
    private $status_ramais = [];
    private $info_ramais = [];

    // Método Construtor
    public function __construct() {
        $this->ramais = file('ramais');
        $this->filas = file('filas');
        $this->filas();
        $this->ramal();
        $this->json();
    }

    // Método para percorrer os dados no arquivo filas
    private function filas() {
        foreach ($this->filas as $linhas) {
            if (strstr($linhas, 'SIP/')) $this->row($linhas);
        }
    }

    // Para cada linha em filas, será adicionado a chave status e user com valores a o array status_ramais
    private function row($linhas) {
        $linha = explode(' ', trim($linhas));
        list($tech, $ramal) = explode('/', $linha[0]);
        $username = end($linha);

        if (strstr($linhas, '(Ring)')) $this->status_ramais[$ramal] = ['status' => 'chamando', 'user' => $username];
        else if (strstr($linhas, '(In use)')) $this->status_ramais[$ramal] = ['status' => 'ocupado', 'user' => $username];
        else if (strstr($linhas, '(Not in use)')) $this->status_ramais[$ramal] = ['status' => 'disponivel', 'user' => $username]; 
        else if (strstr($linhas, '(Unavailable)')) $this->status_ramais[$ramal] = ['status' => 'offline', 'user' => $username];
        if (strstr($linhas, '(paused)')) $this->status_ramais[$ramal] = ['status' => 'pause', 'user' => $username];
    }

    // Método para percorrer os dados no arquivo em ramal
    private function ramal() {
        foreach ($this->ramais as $linhas) {
            $linha = array_filter(explode(' ', $linhas));
            $arr = array_values($linha);
            if (trim($arr[1]) == '(Unspecified)' && trim($arr[4]) == 'UNKNOWN') $this->body($arr);
            if (isset($arr[5]) && trim($arr[5]) === 'OK') $this->body($arr);
        }
    }
    
    // Separa os dados para o array info_ramais
    private function body($arr) {
        list($name, $username) = explode('/', $arr[0]);
        $this->info_ramais[$name] = array(
            'nome' => $name,
            'ramal' => $username,
            'online' => false,
            'status' => $this->status_ramais[$name]['status'],
            'user' => $this->status_ramais[$name]['user']
        );
    }

    // Converte para json o array info_ramais
    private function json() {
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($this->info_ramais);
    }
}

// Chamando a classe
$ramal = new Ramal();
?>