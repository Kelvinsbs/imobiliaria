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

create table mensalidades (
    id int not null AUTO_INCREMENT PRIMARY KEY,
    id_contrato int,
    numero_parcela int,
    valor_mensalidade float(10,3),
    valor_repasse float(10,3)
);

ALTER TABLE `mensalidades` ADD `pago` BIT(0) NOT NULL AFTER `valor_repasse`, ADD `realizado` BIT(0) NOT NULL AFTER `pago`