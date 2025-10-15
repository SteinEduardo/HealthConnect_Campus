-- SCRIPT DE CRIAÇÃO DO SCHEMA COMPLETO (EXECUTAR DENTRO DO BANCO 'a3')

-- Tabela de Administrador (Adm)
-- CORRIGIDO: Usa 'email' no lugar de 'login'
CREATE TABLE adm (
    id INT(3) NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    nivel VARCHAR(9) NOT NULL DEFAULT 'Adm',
    PRIMARY KEY (id)
);

-- Tabela de Professores
CREATE TABLE professor ( -- NOME CORRIGIDO: Usa 'professor' no singular
    id INT(3) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    telefone VARCHAR(11),
    nivel VARCHAR(9) NOT NULL DEFAULT 'Professor',
    PRIMARY KEY (id)
);

-- Tabela de Alunos
CREATE TABLE aluno ( -- NOME CORRIGIDO: Usa 'aluno' no singular
    id INT(3) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    ra VARCHAR(9) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    telefone VARCHAR(11),
    nivel VARCHAR(9) NOT NULL DEFAULT 'Aluno',
    PRIMARY KEY (id)
);

-- Tabela de Paciente (Não possui FK para aluno_id neste schema)
CREATE TABLE paciente (
    id INT(3) NOT NULL AUTO_INCREMENT,
    data_abertura DATE NOT NULL,
    nome VARCHAR(255) NOT NULL,
    data_nascimento DATE NOT NULL,
    genero VARCHAR(10),
    endereco VARCHAR(255),
    telefone VARCHAR(11),
    email VARCHAR(150),
    contato_emergencia VARCHAR(11),
    escolaridade VARCHAR(50),
    ocupacao VARCHAR(50),
    necessidade VARCHAR(255),
    estagiario VARCHAR(255),
    orientador VARCHAR(255),
    PRIMARY KEY (id)
);

-- Tabela de Prontuário (com FK para paciente)
CREATE TABLE prontuario (
    id INT(3) NOT NULL AUTO_INCREMENT,
    id_paciente INT(3) NOT NULL,
    data_hora DATETIME NOT NULL,
    avaliacao TEXT,
    historico_familiar TEXT,
    historico_social TEXT,
    PRIMARY KEY (id),
    FOREIGN KEY (id_paciente) REFERENCES paciente(id)
);

-- Tabela de Sessões (com FK para prontuario)
CREATE TABLE sessoes ( -- NOME CORRIGIDO: Usa 'sessoes' no plural
    id INT(3) NOT NULL AUTO_INCREMENT,
    id_prontuario INT(3) NOT NULL,
    data DATE NOT NULL,
    sessao_text TEXT,
    anotacao VARCHAR(255),
    PRIMARY KEY (id),
    FOREIGN KEY (id_prontuario) REFERENCES prontuario(id)
);