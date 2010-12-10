
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;


INSERT INTO `categoria` (`id_categoria`, `nome`) VALUES
(1, 'Sem categoria');


CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;


INSERT INTO `usuario` (`id_usuario`, `email`, `senha`) VALUES
(1, 'teste', 'teste');


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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;


INSERT INTO `post` (`id_post`, `id_categoria`, `id_usuario`, `titulo`, `texto`, `data`, `tags`) VALUES
(1, 1, 1, 'Olá Mundo!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas enim sapien, semper id viverra et, imperdiet eu purus. Nam gravida elit vel tortor luctus varius. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin est eros, iaculis id ornare quis, tempor in odio. ', '0000-00-00 00:00:00', '');

CREATE TABLE IF NOT EXISTS `comentario` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `site` varchar(60) DEFAULT NULL,
  `texto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_comentario`,`id_post`),
  KEY `fk_comentario_post1` (`id_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;


INSERT INTO `comentario` (`id_comentario`, `id_post`, `nome`, `email`, `site`, `texto`) VALUES
(1, 1, 'Jack', 'jack@boina.com', 'http://mundoboina.com', 'Nossa que bacana esse blog!');


ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_comentario_post1` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_post_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
