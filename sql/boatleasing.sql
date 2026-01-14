CREATE DATABASE IF NOT EXISTS Liegeplatzverwalter;
GRANT ALL PRIVILEGES ON Liegeplatzverwalter.* TO 'mariadb'@'%';
FLUSH PRIVILEGES;

CREATE OR REPLACE TABLE `Liegeplatzverwalter`.`Person` (
    `ID` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
    `Vorname` VARCHAR(255) NOT NULL,
    `Nachname` VARCHAR(255) NOT NULL,
    `E-Mail` VARCHAR(100) NOT NULL,
    `Passwort` VARCHAR(255) NOT NULL,
    `Geburtsdatum` DATE NOT NULL,
    `Rolle` INTEGER NOT NULL,
    PRIMARY KEY(`ID`)
);

CREATE OR REPLACE TABLE `Liegeplatzverwalter`.`Liegeplatz` (
    `ID` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
    `Position` TEXT,
    PRIMARY KEY(`ID`)
);

CREATE OR REPLACE TABLE `Liegeplatzverwalter`.`Boot` (
    `ID` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
    `Typ` TINYINT NOT NULL,
    `Status` INTEGER NOT NULL,
    `Groesse` VARCHAR(255) NOT NULL,
    `Liegeplatz` INTEGER NOT NULL,
    PRIMARY KEY(`id`),
    FOREIGN KEY(`Liegeplatz`) REFERENCES `Liegeplatzverwalter`.`Liegeplatz`(`ID`)
        ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE OR REPLACE TABLE `Liegeplatzverwalter`.`Boot_Reservierung` (
    `ID` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
    `Start_Datum` DATE NOT NULL,
    `End_Datum` DATE NOT NULL,
    `Boat_FID` INTEGER NOT NULL,
    `User_FID` INTEGER NOT NULL,
    PRIMARY KEY(`ID`),
    FOREIGN KEY(`Boat_FID`) REFERENCES `Liegeplatzverwalter`.`Boat`(`id`)
        ON UPDATE NO ACTION ON DELETE NO ACTION,
    FOREIGN KEY(`User_FID`) REFERENCES `Liegeplatzverwalter`.`Person`(`ID`)
        ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE OR REPLACE TABLE `Liegeplatzverwalter`.`Liegeplatz_Reservierung` (
    `ID` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
    `Start_Datum` DATE NOT NULL,
    `End_Datum` DATE NOT NULL,
    `Liegeplatz_FID` INTEGER NOT NULL,
    `User_FID` INTEGER NOT NULL,
    PRIMARY KEY(`ID`),
    FOREIGN KEY(`Liegeplatz_FID`) REFERENCES `Liegeplatzverwalter`.`Liegeplatz`(`ID`)
        ON UPDATE NO ACTION ON DELETE NO ACTION,
    FOREIGN KEY(`User_FID`) REFERENCES `Liegeplatzverwalter`.`Person`(`ID`)
        ON UPDATE NO ACTION ON DELETE NO ACTION
);
