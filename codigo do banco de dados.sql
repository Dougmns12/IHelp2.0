CREATE DATABASE IHelp;
USE IHelp;

-- -----------------------------------------------------
-- Table `mydb`.`Topicos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Topicos` (
  `idTopicos` INT NOT NULL,
  `nome` VARCHAR(200) NOT NULL,
  `descricao` VARCHAR(500) NOT NULL,
  `dataCriacao` DATE NOT NULL,
  `horaCriacao` TIME NOT NULL,
  PRIMARY KEY (`idTopicos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Perguntas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Perguntas` (
  `idPerguntas` INT NOT NULL,
  `data` DATE NOT NULL,
  `hora` TIME NOT NULL,
  `niveldaPergunta` INT NOT NULL,
  `Pergunta` VARCHAR(500) NOT NULL,
  `Subtopicos_idTopicos` INT NOT NULL,
  PRIMARY KEY (`idPerguntas`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Subtopicos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Subtopicos` (
  `idSubtopicos` INT NOT NULL,
  `assunto` VARCHAR(100) NOT NULL,
  `descricao` VARCHAR(500) NOT NULL,
  `datadeCriacao` DATE NOT NULL,
  `horadeCriacao` TIME NOT NULL,
  `Perguntas_idPerguntas` INT NOT NULL,
  `Topicos_idTopicos` INT NOT NULL,
  PRIMARY KEY (`idSubtopicos`),
  INDEX `fk_Subtopicos_Perguntas_idx` (`Perguntas_idPerguntas` ASC) VISIBLE,
  INDEX `fk_Subtopicos_Topicos1_idx` (`Topicos_idTopicos` ASC) VISIBLE,
  CONSTRAINT `fk_Subtopicos_Perguntas`
    FOREIGN KEY (`Perguntas_idPerguntas`)
    REFERENCES `mydb`.`Perguntas` (`idPerguntas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Subtopicos_Topicos1`
    FOREIGN KEY (`Topicos_idTopicos`)
    REFERENCES `mydb`.`Topicos` (`idTopicos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `mydb`.`AvaliacaodaPergunta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`AvaliacaodaPergunta` (
  `idAvaliacao` VARCHAR(45) NOT NULL,
  `data` DATE NOT NULL,
  `hora` TIME NOT NULL,
  `nota` INT NOT NULL,
  `Perguntas_idPerguntas` INT NOT NULL,
  PRIMARY KEY (`idAvaliacao`, `Perguntas_idPerguntas`),
  INDEX `fk_AvaliacaodaPergunta_Perguntas1_idx` (`Perguntas_idPerguntas` ASC) VISIBLE,
  CONSTRAINT `fk_AvaliacaodaPergunta_Perguntas1`
    FOREIGN KEY (`Perguntas_idPerguntas`)
    REFERENCES `mydb`.`Perguntas` (`idPerguntas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Colaboradores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Colaboradores` (
  `idColaboradores` INT NOT NULL,
  `nome` VARCHAR(200) NOT NULL,
  `nomedeLogin` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(50) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `niveldoColaborador` VARCHAR(45) NOT NULL,
  `Topicos_idTopicos` INT NOT NULL,
  `Perguntas_idPerguntas` INT NOT NULL,
  `AvaliacaodaPergunta_idAvaliacao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idColaboradores`),
  INDEX `fk_Colaboradores_Topicos1_idx` (`Topicos_idTopicos` ASC) VISIBLE,
  INDEX `fk_Colaboradores_Perguntas1_idx` (`Perguntas_idPerguntas` ASC) VISIBLE,
  INDEX `fk_Colaboradores_AvaliacaodaPergunta1_idx` (`AvaliacaodaPergunta_idAvaliacao` ASC) VISIBLE,
  CONSTRAINT `fk_Colaboradores_Topicos1`
    FOREIGN KEY (`Topicos_idTopicos`)
    REFERENCES `mydb`.`Topicos` (`idTopicos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Colaboradores_Perguntas1`
    FOREIGN KEY (`Perguntas_idPerguntas`)
    REFERENCES `mydb`.`Perguntas` (`idPerguntas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Colaboradores_AvaliacaodaPergunta1`
    FOREIGN KEY (`AvaliacaodaPergunta_idAvaliacao`)
    REFERENCES `mydb`.`AvaliacaodaPergunta` (`idAvaliacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Reposta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Reposta` (
  `idReposta` INT NOT NULL,
  `data` DATE NOT NULL,
  `hora` TIME NOT NULL,
  `Resposta` VARCHAR(500) NOT NULL,
  `Perguntas_idPerguntas` INT NOT NULL,
  PRIMARY KEY (`idReposta`),
  INDEX `fk_Reposta_Perguntas1_idx` (`Perguntas_idPerguntas` ASC) VISIBLE,
  CONSTRAINT `fk_Reposta_Perguntas1`
    FOREIGN KEY (`Perguntas_idPerguntas`)
    REFERENCES `mydb`.`Perguntas` (`idPerguntas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`AvaliacaoResposta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`AvaliacaoResposta` (
  `idAvaliacaoResposta` INT NOT NULL,
  `data` DATE NOT NULL,
  `hora` TIME NOT NULL,
  `nota` INT NOT NULL,
  `Reposta_idReposta` INT NOT NULL,
  `Colaboradores_idColaboradores` INT NOT NULL,
  PRIMARY KEY (`idAvaliacaoResposta`, `Reposta_idReposta`, `Colaboradores_idColaboradores`),
  INDEX `fk_AvaliacaoResposta_Reposta1_idx` (`Reposta_idReposta` ASC) VISIBLE,
  INDEX `fk_AvaliacaoResposta_Colaboradores1_idx` (`Colaboradores_idColaboradores` ASC) VISIBLE,
  CONSTRAINT `fk_AvaliacaoResposta_Reposta1`
    FOREIGN KEY (`Reposta_idReposta`)
    REFERENCES `mydb`.`Reposta` (`idReposta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_AvaliacaoResposta_Colaboradores1`
    FOREIGN KEY (`Colaboradores_idColaboradores`)
    REFERENCES `mydb`.`Colaboradores` (`idColaboradores`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = '			';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

