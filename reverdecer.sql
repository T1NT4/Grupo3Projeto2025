-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/02/2025 às 16:57
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
-- Banco de dados: `reverdecer`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `mensagem` text NOT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `mensagem`, `data_envio`) VALUES
(1, 'gui bunito', '2025-02-19 13:07:32');

-- --------------------------------------------------------

--
-- Estrutura para tabela `residuos`
--

CREATE TABLE `residuos` (
  `residuo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tipo_residuo` enum('organicos','recicláveis','especiais','rejeitos') NOT NULL,
  `peso` float(10,2) NOT NULL,
  `empresa_responsavel` varchar(255) NOT NULL,
  `endereco_residuo` varchar(255) NOT NULL,
  `data_req` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `residuos`
--

INSERT INTO `residuos` (`residuo_id`, `user_id`, `tipo_residuo`, `peso`, `empresa_responsavel`, `endereco_residuo`, `data_req`) VALUES
(1, 0, 'organicos', 50.00, '0', 'fereiro', '2025-02-18'),
(4, 0, 'organicos', 50.00, '0', 'fereiro', '2025-02-03'),
(5, 1, 'organicos', 225.14, '0', 'fereiro', '2025-02-11'),
(6, 1, 'organicos', 20000.00, 'john', 'rio de janeiro', '2025-02-18'),
(7, 1, 'organicos', 300.00, 'thiago.inc', 'rio de janeiro', '2024-09-19'),
(8, 1, 'organicos', 24124.00, 'thiadwe', 'rio de janeiro', '2024-11-27');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `data_de_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `data_de_registro`) VALUES
(1, 'thiago', '1234', '2025-02-07 17:58:05');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `residuos`
--
ALTER TABLE `residuos`
  ADD PRIMARY KEY (`residuo_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `residuos`
--
ALTER TABLE `residuos`
  MODIFY `residuo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
