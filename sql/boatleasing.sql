DROP DATABASE IF EXISTS `Liegeplatzverwalter`;
CREATE DATABASE IF NOT EXISTS Liegeplatzverwalter;

GRANT ALL PRIVILEGES ON Liegeplatzverwalter.* TO 'mariadb'@'%';
FLUSH PRIVILEGES;

CREATE USER IF NOT EXISTS 'system-user'@'%' IDENTIFIED BY 'StrongPassword123!';
CREATE USER IF NOT EXISTS 'system-user2'@'172.18.0.2' IDENTIFIED BY 'StrongPassword123';
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, DROP ON Liegeplatzverwalter.* TO 'system-user'@'%';
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, DROP ON Liegeplatzverwalter.* TO 'system-user2'@'172.18.0.2';
FLUSH PRIVILEGES;

CREATE TABLE IF NOT EXISTS `Liegeplatzverwalter`.`Person` (
    `ID` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
    `Vorname` VARCHAR(255) NOT NULL,
    `Nachname` VARCHAR(255) NOT NULL,
    `E-Mail` VARCHAR(100) NOT NULL,
    `PasswortHash` VARCHAR(255) NOT NULL,
    `Geburtsdatum` DATE NOT NULL,
    `Land` VARCHAR(100) NOT NULL,
    `Adresse` VARCHAR(255) NOT NULL,
    `Hausnummer` VARCHAR(20) NOT NULL,
    `Rolle` INTEGER NOT NULL,
    PRIMARY KEY(`ID`)
);

CREATE TABLE IF NOT EXISTS `Liegeplatzverwalter`.`Liegeplatz` (
    `ID` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
    `Position` TEXT,
    PRIMARY KEY(`ID`)
);

# Status: 0 = available, 1 = unavailable
CREATE TABLE IF NOT EXISTS `Liegeplatzverwalter`.`Boot` (
    `ID` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
    `Status` INTEGER NOT NULL,
    `Groesse` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`ID`)
);

CREATE TABLE IF NOT EXISTS `Liegeplatzverwalter`.`Liegeplatz_Reservierung` (
    `ID` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
    `Created_At` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `Accepted` BOOLEAN NULL, 
    `Start_Datum` DATE NOT NULL,
    `End_Datum` DATE NOT NULL,
    `Liegeplatz_FID` INTEGER NOT NULL,
    `Boot_FID` INTEGER,
    `User_FID` INTEGER NOT NULL,
    PRIMARY KEY(`ID`),
    FOREIGN KEY(`Liegeplatz_FID`) REFERENCES `Liegeplatzverwalter`.`Liegeplatz`(`ID`)
        ON UPDATE NO ACTION ON DELETE NO ACTION,
    FOREIGN KEY(`User_FID`) REFERENCES `Liegeplatzverwalter`.`Person`(`ID`)
        ON UPDATE NO ACTION ON DELETE NO ACTION,
    FOREIGN KEY(`Boot_FID`) REFERENCES `Liegeplatzverwalter`.`Boot`(`ID`)
        ON UPDATE NO ACTION ON DELETE NO ACTION
);

# ------------------------
# DEFAULT DATA 
# ------------------------


# Rolle: 1=Admin, 2=Staff, 3=User
INSERT INTO `Liegeplatzverwalter`.`Person`
(`Vorname`, `Nachname`, `E-Mail`, `PasswortHash`, `Geburtsdatum`, `Land`, `Adresse`, `Hausnummer`, `Rolle`)
VALUES
('Admin', 'PlauerSee', 'admin@paulersee.net', '$2y$10$lWKnBEnz3FROx7hbMt9HZupQv/qXHpXkaL4L.4YSPpP9fivfaNm86', '2001-11-08', 'Deutschland', 'Fliesenleger Bach', '93', 1),
('Jonas', 'Krause', 'jonas.krause@example.com', '$2y$10$O.99eWqBKNQx04ffDkVIKenaq4DQRNV1o0wpI8THCNXj4uTPMbz/2', '2002-06-19', 'Frankreich', 'Rue de la Peureer', 'AB1', 3),
('Mark', 'Fischer', 'mark.fischer@example.com', '$2y$10$hx6bXm9TPdQFvy.ZYVXIEuIRf8FK4mfqK9f9wZp6tSRrtFfYuzv2C', '2001-07-22', 'England', 'Street the castle', 'A3', 3),
('Mara', 'Schulz', 'mara.schulz@example.com', '$2y$10$Emwe5.8BO0vIEWgfs2cB7uXghHS/cN59reKr0PDAu/FnefbM85FSW', '1995-02-28', 'Belgien', 'Rue de rose', 'B2', 3),
('Paul', 'Richter', 'paul.richter@example.com', '$2y$10$V2vj7BI1DPsAiafEViHTge.36xxfAli0BrD1KvJOmGSY3nNL2eVmO', '1991-12-03', 'Luxemburg', 'Rue de la catastropf', '2', 2);

INSERT INTO `Liegeplatzverwalter`.`Liegeplatz` (`Position`)
VALUES
('Steg A – Platz 01 (nahe Einfahrt)'),
('Steg A – Platz 02'),
('Steg A – Platz 03'),
('Steg B – Platz 01 (ruhige Ecke)'),
('Steg B – Platz 02'),
('Steg C – Platz 01 (kurzer Weg zur Rampe)'),
('Steg C – Platz 02'),
('Steg D – Platz 01 (für größere Boote)');

# Status: 0=available, 1=unavailable
INSERT INTO `Liegeplatzverwalter`.`Boot` (`Status`, `Groesse`)
VALUES
(0, '5.2 m'),
(0, '6.8 m'),
(0, '6.5 m'),
(0, '4.5 m'),
(1, '6.2 m');

INSERT INTO `Liegeplatzverwalter`.`Liegeplatz_Reservierung`
(`Created_At`, `Accepted`, `Start_Datum`, `End_Datum`, `Liegeplatz_FID`, `Boot_FID`, `User_FID`)
VALUES
('2026-01-10 18:50:02', NULL, '2026-02-14', '2026-02-15', 5, 2, 4),
('2026-02-09 11:56:54', NULL, '2026-02-10', '2026-02-10', 4, 1, 5),
('2026-02-10 14:30:22', NULL, '2026-03-01', '2026-03-05', 2, 3, 2),
('2026-02-04 08:26:59', NULL, '2026-03-10', '2026-03-12', 7, 4, 3),
('2026-02-06 13:54:36', NULL, '2026-02-20', '2026-02-25', 1, 1, 2);