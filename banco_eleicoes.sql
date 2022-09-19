-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 17-Set-2022 às 16:11
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `eleicoes`
--

CREATE DATABASE `eleicoes`;
USE `eleicoes`;

--
-- Estrutura da tabela `candidatos`
--

DROP TABLE IF EXISTS `candidatos`;
CREATE TABLE `eleicoes`.`candidatos` (`id` INT NOT NULL AUTO_INCREMENT , `nome` VARCHAR(150) NOT NULL , PRIMARY KEY (`id`), UNIQUE `UN_NOME` (`nome`(150))) ENGINE = InnoDB;

INSERT INTO `candidatos` (`nome`) VALUES ('Bill Gates');
INSERT INTO `candidatos` (`nome`) VALUES ('Mark Zuckerberg');

--
-- Estrutura da tabela `votos`
--

DROP TABLE IF EXISTS `votos`;
CREATE TABLE `eleicoes`.`votos` (`id` INT NOT NULL AUTO_INCREMENT , `nome` VARCHAR(150) NOT NULL , `cpf` CHAR(11) NOT NULL , `idade` INT NOT NULL , `data_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `id_candidato` INT NOT NULL , PRIMARY KEY (`id`),
CONSTRAINT FOREIGN KEY (`id_candidato`) REFERENCES `eleicoes`.`candidatos` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION) ENGINE = InnoDB;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
