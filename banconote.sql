-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/11/2024 às 19:54
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banconote`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cpf_cnpj` varchar(14) NOT NULL,
  `birthdate` datetime NOT NULL,
  `address` varchar(255) NOT NULL,
  `hood` varchar(100) NOT NULL,
  `zip_code` varchar(8) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(2) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `ie` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `customers`
--

INSERT INTO `customers` (`id`, `name`, `cpf_cnpj`, `birthdate`, `address`, `hood`, `zip_code`, `city`, `state`, `phone`, `mobile`, `ie`, `created`, `modified`) VALUES
(1, 'Fulano de Tal', '123.456.789-00', '1989-01-01 00:00:00', 'Rua da Web, 123', 'Internet', '12345678', 'Teste', 'SP', '15 55663322', '15 955663322', 123456777, '2016-05-24 00:00:00', '2024-09-20 21:31:42'),
(2, 'Ciclano de Tal', '123.456.789-00', '1989-01-01 00:00:00', 'Rua da Web, 123', 'Internet', '12345678', 'Teste', 'SP', '15 55663322', '15 955663322', 123456777, '2016-05-24 00:00:00', '2016-05-24 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabeladados`
--

CREATE TABLE `tabeladados` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `tamanho` decimal(10,1) NOT NULL,
  `data` date NOT NULL,
  `imagem` varchar(50) NOT NULL,
  `modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tabeladados`
--

INSERT INTO `tabeladados` (`id`, `codigo`, `marca`, `modelo`, `tamanho`, `data`, `imagem`, `modificado`) VALUES
(1, 11223, 'Dell', 'Notebook Inspiron 15 3000 i15.', 15.6, '2020-05-01', 'dellinsp.jpg', '2024-11-15 15:30:02'),
(2, 33445, 'ACER.', 'Notebook Nitro 5 AN515-57-520Y.', 15.6, '2021-07-01', 'ACER.jpg', '2024-09-15 10:10:00'),
(3, 55667, 'Lenovo.', 'IdeaPad 1i 83AF0001BR.', 14.0, '2022-05-19', 'lenovo.jpg', '2024-09-15 10:20:00'),
(4, 77889, 'Samsung Galaxy.', 'Book2 NP550XED-KF2BR.', 15.6, '2022-09-03', 'samsung.jpg', '2024-09-15 10:30:00'),
(5, 99001, 'ASUS', 'VIVOBOOK 15 X1502ZA-EJ611W.', 15.6, '2022-09-10', 'ASUS.jpeg', '2024-10-31 11:03:40'),
(6, 18061435, 'Apple', 'MacBook Pro', 12.0, '2024-11-15', '', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `user`, `password`, `foto`) VALUES
(1, 'admin', 'admin', '$2a$08$CrIfllePaRk1BjomMOF6a.8wdcAS4on0JzFnfWdwJLFjM05BHJyea', NULL),
(2, 'Zé Lele', 'zelele', '$2a$08$CrIfllePaRk1BjomMOF6a.8wdcAS4on0JzFnfWdwJLFjM05BHJyea', NULL),
(3, 'Mary Zica', 'mazi', '$2a$08$CrIfllePaRk1BjomMOF6a.8wdcAS4on0JzFnfWdwJLFjM05BHJyea', NULL),
(4, 'Fugiru Nakombi', 'fugina', '$2a$08$CrIfllePaRk1BjomMOF6a.8wdcAS4on0JzFnfWdwJLFjM05BHJyea', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tabeladados`
--
ALTER TABLE `tabeladados`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tabeladados`
--
ALTER TABLE `tabeladados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
