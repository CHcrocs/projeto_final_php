-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/06/2025 às 04:05
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
-- Banco de dados: `db_biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_livros`
--

CREATE TABLE `tb_livros` (
  `id_livro` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_livros`
--

INSERT INTO `tb_livros` (`id_livro`, `titulo`, `autor`, `id_usuario`) VALUES
(1, 'diario de um banana 1', 'joca minhoca', 2),
(2, 'diario de um banana 1', 'joca minhoca', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `contato` varchar(100) NOT NULL,
  `senha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `nome`, `contato`, `senha`) VALUES
(1, 'vitor', '1111111111111111111111111', '$2y$10$1DMpvhIBpH83gKKCyRm1JOd'),
(2, 'vitor2', '111', '111'),
(3, 'vitor3', '999999999999999', '666'),
(4, 'carlos', '14124124124224', '666'),
(5, 'vitor94568345968', '25127590128590128591289', '666');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_livros`
--
ALTER TABLE `tb_livros`
  ADD PRIMARY KEY (`id_livro`),
  ADD KEY `livro_usuario` (`id_usuario`);

--
-- Índices de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_livros`
--
ALTER TABLE `tb_livros`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_livros`
--
ALTER TABLE `tb_livros`
  ADD CONSTRAINT `livro_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
