-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Maio-2022 às 02:52
-- Versão do servidor: 10.4.16-MariaDB
-- versão do PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `imobiliaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `telefone`) VALUES
(1, 'kelvin barcelos', 'nivlek.barcelos@gmail.com', '4899246716'),
(2, 'joao moacil', 'joao.moacir@mail.com', '485552136598'),
(3, 'Jeniffer Hinckel', 'jeniffer.hinckel@gmail.com', '48999457812'),
(9, 'Ruan olivieira', 'ruan@mail.com', '45996325874'),
(12, 'eliani', 'eliani@mail.com', '452221659847');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contrato`
--

CREATE TABLE `contrato` (
  `id` int(11) NOT NULL,
  `imovel` int(11) DEFAULT NULL,
  `proprietario` int(11) DEFAULT NULL,
  `locatario` int(11) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `taxa_administracao` float DEFAULT NULL,
  `valor_aluguel` float DEFAULT NULL,
  `valor_condominio` float DEFAULT NULL,
  `valor_iptu` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contrato`
--

INSERT INTO `contrato` (`id`, `imovel`, `proprietario`, `locatario`, `data_inicio`, `data_fim`, `taxa_administracao`, `valor_aluguel`, `valor_condominio`, `valor_iptu`) VALUES
(9, 1, 1, 2, '2022-12-12', '2023-12-12', 100, 500, 300, 250),
(12, 6, 9, 12, '2022-06-07', '2023-05-12', 150, 1100, 332, 400),
(13, 1, 6, 9, '2023-01-01', '2024-01-01', 147, 1423, 222, 321),
(14, 1, 6, 9, '2023-01-01', '2024-01-01', 147, 1423, 222, 321);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imoveis`
--

CREATE TABLE `imoveis` (
  `id` int(11) NOT NULL,
  `endereco` varchar(250) DEFAULT NULL,
  `proprietario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `imoveis`
--

INSERT INTO `imoveis` (`id`, `endereco`, `proprietario`) VALUES
(1, 'rodovia joao gualberto soares', 5),
(2, 'rua do lamin 725', 4),
(6, 'rua manoel rosa', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensalidades`
--

CREATE TABLE `mensalidades` (
  `id` int(11) NOT NULL,
  `id_contrato` int(11) DEFAULT NULL,
  `numero_parcela` int(11) DEFAULT NULL,
  `valor_mensalidade` float(10,3) DEFAULT NULL,
  `valor_repasse` float(10,3) DEFAULT NULL,
  `pago` tinyint(1) NOT NULL,
  `realizado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mensalidades`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `proprietario`
--

CREATE TABLE `proprietario` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `dia_repasse` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `proprietario`
--

INSERT INTO `proprietario` (`id`, `nome`, `email`, `telefone`, `dia_repasse`) VALUES
(4, 'propri novo um', 'propri.quatro@mail.com', '45222165487', 2),
(5, 'propri cinco', 'propri.cinco@mail.com', '45666254319', 11),
(6, 'propri seis', 'propri.seis@mail.com', '45333265941', 5),
(8, 'joão kleber', 'jao.kleber@mail.com', '4521369854', 5),
(9, 'jose', 'jose@mail.com', '45332659841', 12);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `imoveis`
--
ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mensalidades`
--
ALTER TABLE `mensalidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `proprietario`
--
ALTER TABLE `proprietario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `imoveis`
--
ALTER TABLE `imoveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `mensalidades`
--
ALTER TABLE `mensalidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `proprietario`
--
ALTER TABLE `proprietario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
