create table clientes (
    id int not null AUTO_INCREMENT PRIMARY KEY,
    nome varchar(200),
    email varchar(150),
    telefone varchar(15)
);

create table proprietario (
    id int not null AUTO_INCREMENT PRIMARY KEY,
    nome varchar(200),
    email varchar(150),
    telefone varchar(15),
    dia_repasse int
);

create table imoveis ( 
    id int not null AUTO_INCREMENT PRIMARY KEY, 
    endereco varchar(250), 
    proprietario int 
);

create table contrato (
    id int not null AUTO_INCREMENT PRIMARY KEY,
    imovel int,
    proprietario int,
    locatario int,
    data_inicio date,
    data_fim date, 
    taxa_administracao boolean,
	valor_aluguel boolean,
    valor_condominio boolean,
    valor_iptu boolean
);