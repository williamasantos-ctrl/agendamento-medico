CREATE TABLE especialidades (
id_especialidade SERIAL PRIMARY KEY,
nome VARCHAR(100) NOT NULL,
descricao TEXT
);

CREATE TABLE medicos (
id_medico SERIAL PRIMARY KEY,
nome VARCHAR(150) NOT NULL,
crm VARCHAR(20) UNIQUE NOT NULL,
telefone VARCHAR(20),
email VARCHAR(150),
id_especialidade INT NOT NULL,
FOREIGN KEY (id_especialidade)
REFERENCES especialidades(id_especialidade)
);

CREATE TABLE pacientes (
id_paciente SERIAL PRIMARY KEY,
nome VARCHAR(150) NOT NULL,
cpf CHAR(11) UNIQUE NOT NULL,
data_nascimento DATE,
telefone VARCHAR(20),
email VARCHAR(150),
sexo CHAR(1)
);

CREATE TABLE agendas (
id_agenda SERIAL PRIMARY KEY,
id_medico INT NOT NULL,
horario_inicio TIME,
horario_fim TIME,
duracao_consulta INT,
dia_semana VARCHAR(20),
FOREIGN KEY (id_medico)
REFERENCES medicos(id_medico)
);

CREATE TABLE agendamentos (
id_agendamento SERIAL PRIMARY KEY,
id_paciente INT NOT NULL,
id_medico INT NOT NULL,
data_consulta DATE NOT NULL,
horario TIME NOT NULL,
status VARCHAR(30),
FOREIGN KEY (id_paciente)
REFERENCES pacientes(id_paciente),
FOREIGN KEY (id_medico)
REFERENCES medicos(id_medico)
);

CREATE INDEX idx_cpf_paciente
ON pacientes(cpf);

CREATE INDEX idx_medico_especialidade
ON medicos(id_especialidade);

CREATE INDEX idx_data_consulta
ON agendamentos(data_consulta);
