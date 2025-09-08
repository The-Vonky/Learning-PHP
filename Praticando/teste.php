<?php
class Livro {
    private $titulo;
    private $autor;
    private $emprestado;
    
    public function __construct($titulo, $autor) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->emprestado = false;
    }
    
    public function emprestar() {
        if (!$this->emprestado) {
            $this->emprestado = true;
            return true;
        }
        return false;
    }

    public function devolver() {
        $this->emprestado = false;
    }
    
    public function getTitulo() {
        return $this->titulo;
    }
    
    public function getAutor() {
        return $this->autor;
    }
    
    public function estaEmprestado() {
        return $this->emprestado;
    }
}

echo "<h2>Sistema de Gerenciamento de Biblioteca</h2>\n";
echo "<hr>\n";

$livros = array(
    new Livro("1984", "George Orwell"),
    new Livro("Dom Casmurro", "Machado de Assis"),
    new Livro("O Pequeno Príncipe", "Antoine de Saint-Exupéry"),
    new Livro("Harry Potter e a Pedra Filosofal", "J.K. Rowling")
);

$opcoes = array(1, 3, 2, 1);

echo "<h3>Processando ações dos usuários...</h3>\n";

for ($i = 0; $i < count($livros); $i++) {
    $livro = $livros[$i];
    $opcao = $opcoes[$i];
    
    echo "<strong>Livro " . ($i + 1) . ":</strong> " . $livro->getTitulo() . " - " . $livro->getAutor() . "<br>\n";
    
    switch ($opcao) {
        case 1: // Emprestar
            if ($livro->emprestar()) {
                echo "→ Ação: Livro emprestado com sucesso!<br>\n";
            } else {
                echo "→ Ação: Não foi possível emprestar - livro já está emprestado.<br>\n";
            }
            break;
            
        case 2: // Devolver
            $livro->devolver();
            echo "→ Ação: Livro devolvido com sucesso!<br>\n";
            break;
            
        case 3: // Ignorar
            echo "→ Ação: Nenhuma ação realizada.<br>\n";
            break;
            
        default:
            echo "→ Ação: Opção inválida.<br>\n";
            break;
    }
    echo "<br>\n";
}

echo "<hr>\n";
echo "<h3>Relatório Final - Estado Atual dos Livros:</h3>\n";

for ($i = 0; $i < count($livros); $i++) {
    $livro = $livros[$i];
    
    echo "<strong>Livro " . ($i + 1) . ":</strong><br>\n";
    echo "Título: " . $livro->getTitulo() . "<br>\n";
    echo "Autor: " . $livro->getAutor() . "<br>\n";
    
    if ($livro->estaEmprestado()) {
        echo "Situação: <span style='color: red;'>EMPRESTADO</span><br>\n";
        echo "Status: Este livro não está disponível no momento.<br>\n";
    } else {
        echo "Situação: <span style='color: green;'>DISPONÍVEL</span><br>\n";
        echo "Status: Este livro está disponível para empréstimo.<br>\n";
    }
    
    echo "<br>\n";
}

$totalLivros = count($livros);
$livrosEmprestados = 0;
$livrosDisponiveis = 0;

for ($i = 0; $i < count($livros); $i++) {
    if ($livros[$i]->estaEmprestado()) {
        $livrosEmprestados++;
    } else {
        $livrosDisponiveis++;
    }
}

echo "<hr>\n";
echo "<h3>Estatísticas da Biblioteca:</h3>\n";
echo "Total de livros: $totalLivros<br>\n";
echo "Livros emprestados: $livrosEmprestados<br>\n";
echo "Livros disponíveis: $livrosDisponiveis<br>\n";

?>