--
-- Database: `irish_football_fantasy`
--
CREATE DATABASE IF NOT EXISTS `irish_football_fantasy` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `irish_football_fantasy`;

DROP TABLE IF EXISTS team_table, player,competition, fixtures, match_summary, event;

--  the tables/entities
CREATE TABLE `irish_football_fantasy`.`team_table` 
( `team_id` VARCHAR(10) NOT NULL ,
 `team_name` VARCHAR(30),
 `manager` VARCHAR(30), 
 `stadium_name` VARCHAR(40) ,
 `capacity` INT ,
 `city` VARCHAR(20),
 PRIMARY KEY (`team_id`));

CREATE TABLE `irish_football_fantasy`.`players` 
 ( `player_id` VARCHAR(10) NOT NULL ,
 `team_id` VARCHAR(10) NOT NULL ,
  `player_name` VARCHAR(30),
  `shirt_no` INT,
  `position` VARCHAR(20), 
  `dob` DATE,
  PRIMARY KEY  (`player_id`),
FOREIGN KEY (`team_id`) REFERENCES `team_table`(`team_id`));

CREATE TABLE `irish_football_fantasy`.`competition`
( `comp_id` VARCHAR(5) NOT NULL ,
`comp_name` VARCHAR(20),
PRIMARY KEY  (`comp_id`));

CREATE TABLE `irish_football_fantasy`.`fixtures` 
( `match_id` VARCHAR(7) NOT NULL ,
  `comp_id` VARCHAR(5) NOT NULL , 
  `home_team` VARCHAR(10) NOT NULL ,
  `away_team` VARCHAR(10) NOT NULL ,
  `match_desc` VARCHAR(30),
  `fixture_date` DATE,
  PRIMARY KEY  (`match_id`),
  FOREIGN KEY (`comp_id`) REFERENCES `competition`(`comp_id`),
  FOREIGN KEY (`home_team`) REFERENCES `team_table`(`team_id`),
  FOREIGN KEY (`away_team`) REFERENCES `team_table`(`team_id`));

CREATE TABLE `irish_football_fantasy`.`match_summary`
 ( `match_id` VARCHAR(7) NOT NULL ,
 `team_id` VARCHAR(10) NOT NULL ,
 `stats` VARCHAR(10),
 `card` INT,
 `goal_for` INT,
 `goal_against` INT,
 PRIMARY KEY  (`match_id`, `team_id`),
 FOREIGN KEY (`team_id`) REFERENCES `team_table`(`team_id`));

CREATE TABLE `irish_football_fantasy`.`event` 
( `player_id` VARCHAR(10) NOT NULL ,
  `match_id` VARCHAR(7) NOT NULL ,
  `event_time` INT NOT NULL ,
  `event_type` VARCHAR(5), 
  `event_desc` VARCHAR(20),
  PRIMARY KEY  (`player_id`, `match_id`, `event_time`),
  FOREIGN KEY (`player_id`) REFERENCES `players`(`player_id`),
  FOREIGN KEY (`match_id`) REFERENCES `fixtures`(`match_id`));

INSERT INTO `team_table` 
(`team_id`, `team_name`, `manager`, `stadium_name`, `capacity`, `city`) 
VALUES 
('DeC', 'Derry City', 'Ruaidhri Higgins', 'The Ryan McBride Brandywell Stadium', '3700', 'Derry'),
 ('ShR', 'Shamrock Rovers', 'Stephen Bradley', 'Tallaght Stadium', '8142', 'Tallaght'), 
 ('StP', 'St.Patrick\'s', 'Tim Clancy', 'Richmond Park', '5340', 'Inchicore'),
 ('SlR', 'Sligo Rovers', 'Liam Buckley', 'The Showgrounds', '3873', 'Sligo'), 
 ('DuFC', 'Dundalk FC', 'Stephen O\'Donnell', 'Oriel Park', '4500', 'Dundalk'), 
 ('BoB', 'Bohemian', 'Keith Long', 'Dalymount Park', '3640', 'Phibsborough'),
 ('ShS', 'Shelbourne', 'Damien Duff', 'Tolka Park', '3600', 'Drumcondra'),
 ('DrU', 'Drogheda Utd', 'Kevin Doherty', 'United Park', '2000', 'Drogheda'), 
 ('FiH', 'Finn Harps', 'Ollie Horgan', 'Finn Park', '4600', 'Ballybofey'),
 ('UCD', 'UC Dublin', 'Andrew Myler', 'UCD Bowl', '3000', 'Belfield');
 
 INSERT INTO `players` 
  (`player_id`, `team_id`, `player_name`, `shirt_no`, `position`, `dob`) 
  VALUES ('DeC15', 'DeC', 'Eoin Toal', '15', 'Defender', '1999-02-15'),
  ('DeC11', 'DeC', 'James Akintunde', '11', 'Forward', '1996-03-26'),
  ('ShR10', 'ShR', 'Graham Burke', '10', 'Forward', '1993-09-21'),
  ('ShR1', 'ShR', 'Alan Mannus', '1', 'Goalkeeper', '1982-05-19'),
  ('StP18', 'StP', 'Jake Walker', '18', 'Forward', '2000-08-19'), 
  ('StP28', 'StP', 'Tunde Owolabi', '28', 'Midfielder', '1996-07-26'),
  ('SlR22', 'SlR', 'Karl O\'Sullvan', '22', 'Defender', '1999-10-21'),
  ('DuFC9', 'DuFC', 'Pat Hoban', '9', 'Forward', '2000-08-19'),
  ('DuFC44', 'DuFC', 'Mayowa Animasahun', '44', 'Defender', '2003-08-08'),
  ('BoB1', 'BoB', 'James Talbot', '1', 'Goalkeeper', '1997-04-24'),
  ('BoB8', 'BoB', 'Alistair Coote', '8', 'Midfielder', '1998-06-11'),
  ('ShS17', 'ShS', 'Daniel Carr', '17', 'Forward', '1994-05-29'), 
  ('ShS6', 'ShS', 'Jonathan Lunney', '6', 'Midfielder', '1998-02-02'),
  ('DrU31', 'DrU', 'Sam Long', '31', 'Goalkeeper', '2002-11-12'),
  ('DrU14', 'DrU', 'Dane Massey', '14', 'Defender', '1988-04-17'),
  ('FiH9', 'FiH', 'Eric McWoods', '9', 'Forward', '1995-10-21'),
  ('FiH24', 'FiH', 'Ryan Connolly', '24', 'Midfielder', '1992-01-13'),
  ('UCD63', 'UCD', 'Sean Brennan', '63', 'Midfielder', '2001-07-05'), 
  ('SlR26', 'SlR', 'Garry Buckley', '26', 'Midfielder', '1993-08-19'), 
  ('SlR10', 'SlR', 'Jordan Harriton', '10', 'Forward', '1996-03-17'),
  ('FiH21', 'FiH', 'Bastien Hery', '21', 'Midfielder', '1992-03-23'),
  ('FiH27', 'FiH', 'Ethan Boyle', '27', 'Defender', '1997-04-01'),
  ('ShR14', 'ShR', 'Daniel Mandroiu', '14', 'Midfielder', '1998-10-20'),
  ('DuFC5', 'DuFC', 'Mark Connolly', '5', 'Defender', '1991-12-16'),
  ('DuFC3', 'DuFC', 'Brian Gartland', '3', 'Defender', '1986-11-04'),
  ('DrU17', 'DrU', 'Georgie Poynton', '17', 'Midfielder', '1997-09-28'),
  ('DeC19', 'DeC', 'Jamie Mc Gonigle', '19', 'Forward', '1996-03-05'),
  ('DrU45', 'DrU', 'Dylan Grimes', '45', 'Midfielder', '1998-04-10'),
  ('DeC17', 'DeC', 'Joe Thomson', '17', 'Midfielder', '1997-01-14'),
  ('SlR35', 'SlR', 'Aidan Keena', '35', 'Forward', '1999-04-25'),
  ('UCD10', 'UCD', 'Colm Whelan', '10', 'Forward', '2000-06-29');
  
  INSERT INTO `competition` (`comp_id`, `comp_name`)
  VALUES ('IPD', 'Premier Division'),
  ('UCL', 'Champions League'),
  ('UEL', 'Europa League'),
  ('FRE', 'Friendly'),
  ('IPC', 'Presidents Cup'),
  ('ILC', 'League Cup'),
  ('IFD', 'First Division');
  
  INSERT INTO `fixtures` 
  (`match_id`, `comp_id`, `home_team`, `away_team`, `match_desc`, `fixture_date`)
  VALUES ('MD001A', 'IPD', 'FiH', 'SlR', 'Finn Harps vs Sligo Rovers', '2022-04-18'),
  ('MD001B', 'IFD', 'ShR', 'DuFC', 'Shamrock Rovers vs Dundalk FC', '2022-04-18'),
  ('MD001C', 'FRE', 'DrU', 'DeC', 'Drogheda Utd vs Derry City', '2022-04-18'),
  ('MD002A', 'ILC', 'DeC', 'UCD', 'Derry City vs UC Dublin', '2022-04-22'),
  ('MD002B', 'UCL', 'StP', 'FiH', 'St.Patrick\'s vs Finn Harps', '2022-04-22'),
  ('MD002C', 'IPD', 'DuFC', 'ShS', 'Dundalk FC vs Shelbourne', '2022-04-22'),
  ('MD002D', 'ILC', 'BoB', 'ShR', 'Bohemians vs Shamrock Rovers', '2022-04-22'),
  ('MD003A', 'FRE', 'SlR', 'DrU', 'Sligo Rovers vs Drogheda Utd', '2022-04-23'),
  ('MD004A', 'UEL', 'BoB', 'UCD', 'Bohemian vs UC Dublin', '2022-04-29'),
  ('MD004B', 'IPD', 'StP', 'DeC', 'St.Patrick\'s vs Derry City', '2022-05-29');
  
  INSERT INTO `match_summary` 
  (`match_id`, `team_id`, `stats`, `card`, `goal_for`, `goal_against`)
  VALUES ('MD001A', 'FiH', 'loss', '2', '0', '1'), 
  ('MD001A', 'SlR', 'win', '1', '1', '0'),
  ('MD001B', 'ShR', 'win', '0', '1', '0'),
  ('MD001B', 'DuFC', 'loss', '4', '0', '1'),
  ('MD001C', 'DrU', 'draw', '0', '1', '1'),
  ('MD001C', 'DeC', 'draw', '2', '1', '1'),
  ('MD002A', 'DeC', 'win', '1', '7', '1'), 
  ('MD002A', 'UCD', 'loss', '2', '1', '7'), 
  ('MD002B', 'StP', 'win', '1', '2', '0'), 
  ('MD002B', 'FiH', 'loss', '1', '0', '2'),
  ('MD002C', 'DuFC', 'win', '5', '2', '1'),
  ('MD002C', 'ShS', 'loss', '5', '1', '3'),
  ('MD002D', 'BoB', 'loss', '2', '1', '3'),
  ('MD002D', 'ShR', 'win', '3', '3', '1'),
  ('MD003A', 'SlR', 'win', '0', '3', '2'),
  ('MD003A', 'DrU', 'loss', '6', '2', '3'),
  ('MD004A', 'BoB', 'win', '1', '3', '0'), 
  ('MD004A', 'UCD', 'loss', '3', '0', '3'),
  ('MD004B', 'StP', 'loss', '2', '0', '4'),
  ('MD004B', 'DeC', 'win', '0', '4', '0');
  
  INSERT INTO `event` (`player_id`, `match_id`, `event_time`, `event_type`, `event_desc`)
  VALUES ('FiH27', 'MD001A', '27', 'Y', 'Yellow Card'),
  ('FiH21', 'MD001A', '27', 'Y', 'Yellow Card'), 
  ('SlR10', 'MD001A', '78', 'Y', 'Yellow Card'),
  ('SlR22', 'MD001A', '25', 'NG', 'Normal Goal'),
  ('ShR14', 'MD001B', '66', 'NG', 'Normal Goal'),
  ('DuFC5', 'MD001B', '90', 'Y', 'Yellow Card'),
  ('DuFC3', 'MD001B', '70', 'Y', 'Yellow Card'),
  ('DrU45', 'MD001C', '60', 'SI', 'Substitution In'),
  ('DuFC3', 'MD001B', '86', 'R', 'Red Card'),
  ('DrU17', 'MD001C', '60', 'SO', 'Substitution Out'),
  ('DeC19', 'MD001C', '68', 'SO', 'Substitution Out'),
  ('DeC17', 'MD001C', '68', 'SI', 'Substitution In'),
  ('SlR35', 'MD003A', '36', 'PM', 'Penalty Miss');