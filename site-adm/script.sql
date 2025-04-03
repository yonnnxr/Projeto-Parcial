CREATE TABLE artigos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    conteudo TEXT NOT NULL,
    categoria_id INT,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
);
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    nome VARCHAR(255) NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    data_nascimento DATE
);

INSERT INTO categorias (nome) VALUES
('Tecnologia'),
('Notícias'),
('Esportes');

INSERT INTO usuarios (email, nome, cpf, data_nascimento) VALUES
('joao.silva@email.com', 'João Silva', '123.456.789-00', '1990-05-15'),
('maria.souza@email.com', 'Maria Souza', '987.654.321-11', '1985-10-20'),
('pedro.almeida@email.com', 'Pedro Almeida', '456.789.012-22', '2000-02-28');

INSERT INTO artigos (titulo, conteudo, categoria_id) VALUES
('Novo Smartphone Lançado', 'A empresa X lançou um novo smartphone com recursos incríveis.', 1),
('Time Y Vence Campeonato', 'O time Y ganhou o campeonato nacional de futebol.', 3),
('Atualização do Sistema Operacional', 'A nova versão do sistema operacional já está disponível.', 1);