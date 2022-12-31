-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.33 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para vnom
CREATE DATABASE IF NOT EXISTS `vnom` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `vnom`;

-- Copiando estrutura para tabela vnom.cad_prestador
CREATE TABLE IF NOT EXISTS `cad_prestador` (
  `id_prestador` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `area_atuante` varchar(200) NOT NULL,
  `cargo_prestador` varchar(200) NOT NULL,
  PRIMARY KEY (`id_prestador`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `cad_prestador_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `cad_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela vnom.cad_service
CREATE TABLE IF NOT EXISTS `cad_service` (
  `id_serv` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_end` int(11) NOT NULL,
  `titulo_serv` varchar(100) NOT NULL,
  `desc_serv` varchar(1000) NOT NULL,
  `valor_serv` decimal(7,2) NOT NULL,
  `cargahor_serv` varchar(150) NOT NULL,
  `datapraz_serv` varchar(100) NOT NULL,
  `categoria_serv` varchar(300) NOT NULL,
  `tipo_serv` varchar(50) NOT NULL,
  `local_serv` varchar(500) DEFAULT NULL,
  `equipamento_serv` varchar(100) NOT NULL,
  `img_serv` varchar(500) NOT NULL,
  `status_serv` varchar(50) NOT NULL DEFAULT '0',
  `data_serv` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_serv`),
  KEY `id_user` (`id_user`),
  KEY `id_end` (`id_end`),
  CONSTRAINT `cad_service_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `cad_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cad_service_ibfk_2` FOREIGN KEY (`id_end`) REFERENCES `end_user` (`id_end`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela vnom.cad_user
CREATE TABLE IF NOT EXISTS `cad_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nomecom_user` varchar(300) NOT NULL,
  `nome_user` varchar(20) NOT NULL,
  `cpf_user` varchar(20) NOT NULL,
  `dtnasc_user` varchar(50) NOT NULL DEFAULT '',
  `sexo_user` varchar(20) NOT NULL,
  `celular_user` varchar(20) NOT NULL,
  `email_user` varchar(200) NOT NULL,
  `senha_user` varchar(355) NOT NULL,
  `tipo_user` int(11) NOT NULL,
  `status_user` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `nome_user` (`nome_user`),
  UNIQUE KEY `cpf_user` (`cpf_user`),
  UNIQUE KEY `email_user` (`email_user`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela vnom.denuncia_user
CREATE TABLE IF NOT EXISTS `denuncia_user` (
  `id_den` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `tipo_den` varchar(50) NOT NULL,
  `motivo_den` varchar(200) NOT NULL,
  `denunciante_den` varchar(20) NOT NULL,
  `denunciado_den` varchar(20) NOT NULL,
  `descricao_den` varchar(1000) NOT NULL,
  `status_den` varchar(50) NOT NULL,
  `datahora_den` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_den`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `denuncia_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `cad_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela vnom.end_user
CREATE TABLE IF NOT EXISTS `end_user` (
  `id_end` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `cep_user` varchar(20) NOT NULL,
  `cidade_user` varchar(200) NOT NULL,
  `UF_user` varchar(5) NOT NULL,
  `rua_user` varchar(500) NOT NULL,
  `numcasa_user` int(11) NOT NULL,
  `bairro_user` varchar(500) NOT NULL,
  `comple_user` varchar(500) NOT NULL,
  PRIMARY KEY (`id_end`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `end_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `cad_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela vnom.perfil_user
CREATE TABLE IF NOT EXISTS `perfil_user` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `avatar_user` varchar(500) DEFAULT NULL,
  `email_contato` varchar(200) NOT NULL,
  `rede_wpp` varchar(500) DEFAULT NULL,
  `rede_inst` varchar(500) DEFAULT NULL,
  `rede_face` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_perfil`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `perfil_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `cad_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela vnom.service_info
CREATE TABLE IF NOT EXISTS `service_info` (
  `id_servinfo` int(11) NOT NULL AUTO_INCREMENT,
  `id_serv` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_prestador` int(11) NOT NULL,
  PRIMARY KEY (`id_servinfo`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_serv` (`id_serv`),
  KEY `id_prestador` (`id_prestador`),
  CONSTRAINT `service_info_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cad_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `service_info_ibfk_2` FOREIGN KEY (`id_serv`) REFERENCES `cad_service` (`id_serv`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `service_info_ibfk_3` FOREIGN KEY (`id_prestador`) REFERENCES `cad_prestador` (`id_prestador`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
