-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Dez 07, 2010 as 07:40 PM
-- Versão do Servidor: 5.1.36
-- Versão do PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Banco de Dados: `blogifpb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome`) VALUES
(1, 'Carros'),
(2, 'Motos'),
(3, 'Bicicletas'),
(4, 'Aviões');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `site` varchar(60) DEFAULT NULL,
  `texto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_comentario`,`id_post`),
  KEY `fk_comentario_post1` (`id_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `id_post`, `nome`, `email`, `site`, `texto`) VALUES
(1, 3, 'Italo', 'italonerd@gmail', 'doido', 'que merda eim'),
(6, 3, 'italo', 'mendes', 'rodrigues', 'testando comentario'),
(8, 3, 'Anônimo', '', '', 'comentario sem nome'),
(9, 4, 'Joao', 'joao@uol.com', NULL, 'viva la vida'),
(10, 3, 'Italo Mendes Rodrigues', 'italomendes.r@gmail.com', 'www.naotenho.com', 'Olha eu não quero mais falar\r\nta beleza?');

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `texto` longtext NOT NULL,
  `data` datetime NOT NULL,
  `tags` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_post`,`id_categoria`,`id_usuario`),
  KEY `fk_post_categoria` (`id_categoria`),
  KEY `fk_post_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id_post`, `id_categoria`, `id_usuario`, `titulo`, `texto`, `data`, `tags`) VALUES
(3, 1, 1, 'Titulo do post', 'Conteudo do post', '2010-10-04 00:00:00', 'Doidera,Maluca,Sem Noção'),
(4, 1, 2, 'Titulo do post 2', 'Conteudo do post 2', '2010-12-03 00:00:00', 'Doidera,Maluca,Sem Noção'),
(5, 2, 1, 'Titulo do post 3', 'Conteudo do post 3', '2010-12-03 00:00:00', 'Doidera,Maluca,Sem Noção');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `senha`) VALUES
(1, 'italonerd@gmail.com', '12345'),
(2, 'renamputu@gmail.com', '12345'),
(3, 'diogomano@gmail.com', '12345');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_comentario_post1` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_post_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;