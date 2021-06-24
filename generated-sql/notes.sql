
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- admin
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(20),
    `prénoms` VARCHAR(100),
    `email` VARCHAR(50),
    `contact` VARCHAR(20),
    `idGenre` INTEGER NOT NULL,
    `username` VARCHAR(10) NOT NULL,
    `password` TEXT NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `idGenre` (`idGenre`),
    CONSTRAINT `admin_ibfk_1`
        FOREIGN KEY (`idGenre`)
        REFERENCES `genre` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- base
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `base`;

CREATE TABLE `base`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `libelle` VARCHAR(20) NOT NULL,
    `valeur` INTEGER NOT NULL,
    `coef` DOUBLE NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ecue
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ecue`;

CREATE TABLE `ecue`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `libelle` VARCHAR(50),
    `credits` INTEGER NOT NULL,
    `idUe` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `idUe` (`idUe`),
    CONSTRAINT `ecue_ibfk_1`
        FOREIGN KEY (`idUe`)
        REFERENCES `ue` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- etudiant
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `etudiant`;

CREATE TABLE `etudiant`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(20),
    `prenoms` VARCHAR(100),
    `dateNaissance` DATE,
    `email` VARCHAR(50),
    `contact` VARCHAR(50),
    `dateAjout` DATETIME NOT NULL,
    `idNiveau` INTEGER NOT NULL,
    `idGenre` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `idNiveau` (`idNiveau`),
    INDEX `idGenre` (`idGenre`),
    CONSTRAINT `etudiant_ibfk_1`
        FOREIGN KEY (`idNiveau`)
        REFERENCES `niveau` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `etudiant_ibfk_2`
        FOREIGN KEY (`idGenre`)
        REFERENCES `genre` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- genre
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `genre`;

CREATE TABLE `genre`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `libelle` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- niveau
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `niveau`;

CREATE TABLE `niveau`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `libelle` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- note
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `note`;

CREATE TABLE `note`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `idEtudiant` INTEGER NOT NULL,
    `idEcue` INTEGER,
    `note` INTEGER NOT NULL,
    `idBase` INTEGER NOT NULL,
    `date` DATE NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `idEtudiant` (`idEtudiant`),
    INDEX `idEcue` (`idEcue`),
    INDEX `idBase` (`idBase`),
    CONSTRAINT `note_ibfk_1`
        FOREIGN KEY (`idBase`)
        REFERENCES `base` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `note_ibfk_2`
        FOREIGN KEY (`idEtudiant`)
        REFERENCES `etudiant` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `note_ibfk_4`
        FOREIGN KEY (`idEcue`)
        REFERENCES `ecue` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ue
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ue`;

CREATE TABLE `ue`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `libelle` VARCHAR(50) NOT NULL,
    `hasEcue` TINYINT(1) NOT NULL,
    `idNiveau` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `idNiveau` (`idNiveau`),
    CONSTRAINT `ue_ibfk_1`
        FOREIGN KEY (`idNiveau`)
        REFERENCES `niveau` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
