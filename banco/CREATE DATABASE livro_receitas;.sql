CREATE DATABASE livro_receitas;

USE livro_receitas;


CREATE TABLE receitas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    ingredientes VARCHAR(100) NOT NULL UNIQUE,
    modo_preparo VARCHAR(255) NOT NULL,
    tempo_preparo TIME() NOT NULL
);
