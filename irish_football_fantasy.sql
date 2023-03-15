--
-- Database: `irish_football_fantasy`
--
CREATE DATABASE IF NOT EXISTS `irish_football_fantasy` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `irish_football_fantasy`;

DROP TABLE IF EXISTS event, match_summary, fixtures, players,team_table;

--  the tables/entities
CREATE TABLE `irish_football_fantasy`.`team_table` 
( `team_id` VARCHAR(10) NOT NULL ,
 `team_name` VARCHAR(30),
 `manager` VARCHAR(30), 
 `stadium_name` VARCHAR(40) ,
 `capacity` INT ,
 `city` VARCHAR(20),
 `logo` VARCHAR(255),
 PRIMARY KEY (`team_id`));

CREATE TABLE `irish_football_fantasy`.`players` 
 ( `player_id` VARCHAR(10) NOT NULL ,
 `team_id` VARCHAR(10) NOT NULL ,
  `player_name` VARCHAR(50),
  `shirt_no` INT,
  `position` VARCHAR(20), 
  `dob` DATE,
  PRIMARY KEY  (`player_id`),
FOREIGN KEY (`team_id`) REFERENCES `team_table`(`team_id`));


CREATE TABLE `irish_football_fantasy`.`fixtures` 
( `match_day` INT NOT NULL ,
  `home_team` VARCHAR(10) NOT NULL ,
  `away_team` VARCHAR(10) NOT NULL ,
  `match_desc` VARCHAR(50),
  `fixture_date` DATE,
  PRIMARY KEY  (`match_day`, `home_team`, `away_team`),
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
(`team_id`, `team_name`, `manager`, `stadium_name`, `capacity`, `city`, `logo`) 
VALUES 
('AtC','Athlone Town', 'John Gill', 'Athlone Town Stadium', '5000', 'Athlone', 'https://upload.wikimedia.org/wikipedia/en/9/9c/AthloneTown.png'),
('BrW', 'Bray Wanderers', 'Gary Cronin', 'Carlisle Grounds', '5000', 'Bray', 'https://upload.wikimedia.org/wikipedia/commons/c/cf/Bray_Wanderers_2023.jpg'), 
('DeC', 'Derry City', 'Ruaidhri Higgins', 'The Ryan McBride Brandywell Stadium', '3700', 'Derry', 'https://upload.wikimedia.org/wikipedia/en/c/c8/Derry_City_FC_logo.png'),
('ShR', 'Shamrock Rovers', 'Stephen Bradley', 'Tallaght Stadium', '8142', 'Tallaght', 'https://upload.wikimedia.org/wikipedia/en/thumb/f/fb/Shamrock_Rovers_FC_logo.svg/1200px-Shamrock_Rovers_FC_logo.svg.png'), 
('StP', 'St.Patrick\'s', 'Tim Clancy', 'Richmond Park', '5340', 'Inchicore', 'https://upload.wikimedia.org/wikipedia/en/5/57/St._Patrick%27s_Athletic_F.C._crest.png'),
('SlR', 'Sligo Rovers', 'Liam Buckley', 'The Showgrounds', '3873', 'Sligo', 'https://upload.wikimedia.org/wikipedia/en/thumb/0/09/Sligo_Rovers_FC_logo.svg/800px-Sligo_Rovers_FC_logo.svg.png'), 
('DuFC', 'Dundalk FC', 'Stephen O\'Donnell', 'Oriel Park', '4500', 'Dundalk', 'https://upload.wikimedia.org/wikipedia/en/d/d5/Dundalk_F.C._Crest_2020.png'), 
('BoB', 'Bohemian', 'Keith Long', 'Dalymount Park', '3640', 'Phibsborough', 'https://upload.wikimedia.org/wikipedia/en/2/27/BohemianDublin.png'),
('ShS', 'Shelbourne', 'Damien Duff', 'Tolka Park', '3600', 'Drumcondra', 'https://upload.wikimedia.org/wikipedia/en/f/fc/Shels_logo_sml.png'),
('DrU', 'Drogheda Utd', 'Kevin Doherty', 'United Park', '2000', 'Drogheda', 'https://upload.wikimedia.org/wikipedia/en/thumb/1/13/Drogheda_United_FC.svg/1200px-Drogheda_United_FC.svg.png'), 
('FiH', 'Finn Harps', 'Ollie Horgan', 'Finn Park', '4600', 'Ballybofey', 'https://upload.wikimedia.org/wikipedia/en/thumb/d/d0/Finn_Harps_FC_logo.svg/1200px-Finn_Harps_FC_logo.svg.png'),
('UCD', 'UC Dublin', 'Andrew Myler', 'UCD Bowl', '3000', 'Belfield', 'https://upload.wikimedia.org/wikipedia/en/9/9e/UCD_Dublin.png'),
('CoR','Cobh Ramblers FC','Shane Keegan','St Colman\'s Park', '5000','Cork', 'https://upload.wikimedia.org/wikipedia/en/thumb/9/9b/Cobh_Ramblers_FC_logo.svg/640px-Cobh_Ramblers_FC_logo.svg.png'),
('LoT', 'Longford Town', 'Daire Doyle', 'Bishopsgate', '5500', 'Longford', 'https://upload.wikimedia.org/wikipedia/en/e/ea/LongfordTown.png'),
('CcC', 'Cork City', 'Colin Healy', 'Turner\'s Cross', '7456', 'Cork', 'https://upload.wikimedia.org/wikipedia/en/a/a9/Cork-City-Football-Club-Crest.png'),
('DlW', 'DLR Waves', 'Graham Kelly', 'Loughlinstown Leisure Centre', '4200', 'Dún Laoghaire Rathdown', 'https://upload.wikimedia.org/wikipedia/en/8/8c/DLR-Waves.png'),
('GuU', 'Galway United', 'John Caulfield', 'Eamonn Deacy Park', '5200', 'Galway', 'https://img.rasset.ie/0001639f-1600.jpg'),
('KeF', 'Kerry FC', 'Jonathan Speak', 'Mounthawk Park', '3500', 'Tralee', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoUZNGqIIP_TsVGvfenK7aU2BrBpPSvdHg9A&usqp=CAU'),
('PeU', 'Peamount United FC', 'James O\'Callaghan', 'PRL Park', '3000', 'Greenogue','https://static.hudl.com/users/temp/10808765_ef0b08611470479aa74e801068cb7b2d.jpeg'),
('TrU', 'Treaty United', 'Tommy Barrett', 'Markets Field', '5000', 'Limerick', 'https://upload.wikimedia.org/wikipedia/en/9/93/Treaty_United_F.C._logo.png'),
('WaF', 'Waterford', 'Marc Bircham', 'Waterford Regional Sports Centre', '5350', 'Waterford', 'https://waterfordfc.ie/wp-content/uploads/2022/12/cropped-favicon-1.png'),
('WeF', 'Wexford', 'Ian Ryan', 'Ferrycarrig Park', '6000', 'Wexford', 'https://upload.wikimedia.org/wikipedia/en/a/ae/WEXFORD-FC-CREST.png');



 INSERT INTO `players` 
  (`player_id`, `team_id`, `player_name`, `shirt_no`, `position`, `dob`) 
  VALUES
  ('ATFC1', 'AtC', 'John Smith', '1', 'Goalkeeper', '1990-01-01'),
('ATFC2', 'AtC', 'David Brown', '2', 'Defender', '1992-03-15'),
('ATFC3', 'AtC', 'Michael Johnson', '3', 'Defender', '1994-05-21'),
('ATFC4', 'AtC', 'Stephen Davis', '4', 'Defender', '1993-02-28'),
('ATFC5', 'AtC', 'Paul Wilson', '5', 'Defender', '1995-08-02'),
('ATFC6', 'AtC', 'Mark Thompson', '6', 'Midfielder', '1991-11-10'),
('ATFC7', 'AtC', 'Gary Clark', '7', 'Midfielder', '1996-04-12'),
('ATFC8', 'AtC', 'Anthony Murphy', '8', 'Midfielder', '1994-06-17'),
('ATFC9', 'AtC', 'Kevin Lee', '9', 'Midfielder', '1995-09-05'),
('ATFC10', 'AtC', 'Brian Wilson', '10', 'Forward', '1993-12-25'),
('ATFC11', 'AtC', 'James Robinson', '11', 'Forward', '1992-07-18'),
('ATFC12', 'AtC', 'David Jones', '12', 'Goalkeeper', '1990-01-01'),
('BrW1', 'BrW', 'Jack Kelly', '1', 'Goalkeeper', '1996-05-08'),
('BrW2', 'BrW', 'Conor Kenna', '2', 'Defender', '1985-10-07'),
('BrW3', 'BrW', 'Sean Heaney', '3', 'Defender', '1997-08-14'),
('BrW4', 'BrW', 'Killian Cantwell', '4', 'Defender', '1995-02-11'),
('BrW5', 'BrW', 'Andrew Quinn', '5', 'Defender', '1998-12-22'),
('BrW6', 'BrW', 'Paul Keegan', '6', 'Midfielder', '1984-09-10'),
('BrW7', 'BrW', 'Dylan Barnett', '7', 'Midfielder', '1996-08-02'),
('BrW8', 'BrW', 'Luka Lovic', '8', 'Midfielder', '1999-01-29'),
('BrW9', 'BrW', 'Joe Doyle', '9', 'Forward', '1997-07-03'),
('BrW10', 'BrW', 'Gary Shaw', '10', 'Forward', '1991-06-22'),
('BrW11', 'BrW', 'Brandon Kavanagh', '11', 'Midfielder', '2001-03-02'),
('DeC01', 'DeC', 'Nathan Gartside', '1', 'Goalkeeper', '1999-06-08'),
('DeC02', 'DeC', 'Evan McLaughlin', '2', 'Defender', '2001-02-28'),
('DeC03', 'DeC', 'Cameron McJannett', '3', 'Defender', '1999-07-05'),
('DeC04', 'DeC', 'Ciaran Coll', '4', 'Defender', '1994-05-28'),
('DeC05', 'DeC', 'Eoin Toal', '5', 'Defender', '1999-02-15'),
('DeC06', 'DeC', 'Danny Lafferty', '6', 'Midfielder', '1989-05-15'),
('DeC07', 'DeC', 'Joe Thomson', '7', 'Midfielder', '1998-06-03'),
('DeC08', 'DeC', 'Ciaron Harkin', '8', 'Midfielder', '1997-05-06'),
('DeC09', 'DeC', 'Will Patching', '9', 'Midfielder', '1998-09-23'),
('DeC10', 'DeC', 'Jack Malone', '10', 'Forward', '2002-09-14'),
('DeC11', 'DeC', 'David Parkhouse', '11', 'Forward', '2000-09-19'),
('ShR1', 'ShR', 'Alan Mannus', '1', 'Goalkeeper', '1982-05-19'),
('ShR2', 'ShR', 'Roberto Lopes', '2', 'Defender', '1992-02-21'),
('ShR3', 'ShR', 'Lee Grace', '3', 'Defender', '1995-08-05'),
('ShR4', 'ShR', 'Sean Hoare', '4', 'Defender', '1994-10-15'),
('ShR5', 'ShR', 'Liam Scales', '5', 'Defender', '1998-03-05'),
('ShR6', 'ShR', 'Gary O\'Neill', '6', 'Midfielder', '1988-11-02'),
('ShR7', 'ShR', 'Dylan Watts', '7', 'Midfielder', '1998-01-24'),
('ShR8', 'ShR', 'Ronan Finn', '8', 'Midfielder', '1987-04-08'),
('ShR9', 'ShR', 'Graham Burke', '9', 'Forward', '1993-09-02'),
('ShR10', 'ShR', 'Aaron Greene', '10', 'Forward', '1989-10-17'),
('ShR11', 'ShR', 'Rory Gaffney', '11', 'Midfielder', '1989-04-23'),
('StP01', 'StP', 'Barry Murphy', '1', 'Goalkeeper', '1982-08-08'),
('StP02', 'StP', 'Lee Desmond', '2', 'Defender', '1996-01-12'),
('StP03', 'StP', 'Luke McNally', '3', 'Defender', '1999-06-07'),
('StP04', 'StP', 'Sam Bone', '4', 'Defender', '1996-09-15'),
('StP05', 'StP', 'Robbie Benson', '5', 'Defender', '1992-03-08'),
('StP06', 'StP', 'Jamie Lennon', '6', 'Midfielder', '1997-03-27'),
('StP07', 'StP', 'Chris Forrester', '7', 'Midfielder', '1992-01-17'),
('StP08', 'StP', 'Shane Griffin', '8', 'Midfielder', '1997-01-07'),
('StP09', 'StP', 'Jordan Gibson', '9', 'Forward', '1998-08-13'),
('StP10', 'StP', 'Darragh Burns', '10', 'Forward', '2001-05-17'),
('StP11', 'StP', 'Conor Clifford', '11', 'Midfielder', '1991-10-02'),
('SlR1', 'SlR', 'Edward McGinty', '1', 'Goalkeeper', '1998-11-26'),
('SlR2', 'SlR', 'Colm Horgan', '2', 'Defender', '1996-05-19'),
('SlR3', 'SlR', 'Garry Buckley', '3', 'Defender', '1991-02-02'),
('SlR4', 'SlR', 'Teemu Penninkangas', '4', 'Defender', '1994-02-10'),
('SlR5', 'SlR', 'Greg Bolger', '5', 'Defender', '1988-06-06'),
('SlR6', 'SlR', 'Niall Morahan', '6', 'Midfielder', '1999-11-09'),
('SlR7', 'SlR', 'Jordan Gibson', '7', 'Midfielder', '1997-06-26'),
('SlR8', 'SlR', 'David Cawley', '8', 'Midfielder', '1991-02-17'),
('SlR9', 'SlR', 'Ryan De Vries', '9', 'Forward', '1995-07-25'),
('SlR10', 'SlR', 'Walter Figueira', '10', 'Forward', '1994-11-12'),
('SlR11', 'SlR', 'Mark Byrne', '11', 'Midfielder', '1997-04-17'),
('DuFC01', 'DuFC', 'Peter Cherrie', '1', 'Goalkeeper', '1983-04-16'),
('DuFC02', 'DuFC', 'Daniel Cleary', '2', 'Defender', '1996-02-15'),
('DuFC03', 'DuFC', 'Andrew Boyle', '3', 'Defender', '1991-11-28'),
('DuFC04', 'DuFC', 'Sonni Nattestad', '4', 'Defender', '1995-09-15'),
('DuFC05', 'DuFC', 'Raivis Jurkovskis', '5', 'Defender', '1996-11-29'),
('DuFC06', 'DuFC', 'Sam Stanton', '6', 'Midfielder', '1994-01-24'),
('DuFC07', 'DuFC', 'Greg Sloggett', '7', 'Midfielder', '1996-05-04'),
('DuFC08', 'DuFC', 'Will Patching', '8', 'Midfielder', '1998-08-27'),
('DuFC09', 'DuFC', 'Michael Duffy', '9', 'Forward', '1994-01-04'),
('DuFC10', 'DuFC', 'Patrick Hoban', '10', 'Forward', '1991-07-20'),
('DuFC11', 'DuFC', 'Ole Erik Midtskogen', '11', 'Midfielder', '1998-02-07'),
('BoB1', 'BoB', 'James Talbot', '1', 'Goalkeeper', '1997-05-17'),
('BoB2', 'BoB', 'Andy Lyons', '2', 'Defender', '2000-08-17'),
('BoB3', 'BoB', 'Rob Cornwall', '3', 'Defender', '1992-05-15'),
('BoB4', 'BoB', 'Ciarán Kelly', '4', 'Defender', '1999-01-01'),
('BoB5', 'BoB', 'Anto Breslin', '5', 'Defender', '1999-02-16'),
('BoB6', 'BoB', 'Keith Buckley', '6', 'Midfielder', '1989-12-01'),
('BoB7', 'BoB', 'Ali Coote', '7', 'Midfielder', '1998-05-23'),
('BoB8', 'BoB', 'Dawson Devoy', '8', 'Midfielder', '2001-06-23'),
('BoB9', 'BoB', 'Liam Burt', '9', 'Forward', '1998-02-08'),
('BoB10', 'BoB', 'Ross Tierney', '10', 'Forward', '2002-01-21'),
('BoB11', 'BoB', 'Georgie Kelly', '11', 'Forward', '1997-12-13'),
('ShS01', 'ShS', 'Jack Brady', '1', 'Goalkeeper', '1995-03-14'),
('ShS02', 'ShS', 'John Ross Wilson', '2', 'Defender', '1997-05-25'),
('ShS03', 'ShS', 'Alex O\'Hanlon', '3', 'Defender', '1995-08-29'),
('ShS04', 'ShS', 'Max Ryan', '4', 'Defender', '1999-02-02'),
('ShS05', 'ShS', 'Luke Byrne', '5', 'Defender', '1993-06-30'),
('ShS06', 'ShS', 'Ryan Brennan', '6', 'Midfielder', '1991-07-16'),
('ShS07', 'ShS', 'Georgie Poynton', '7', 'Midfielder', '1997-01-14'),
('ShS08', 'ShS', 'Brian McManus', '8', 'Midfielder', '1999-09-22'),
('ShS09', 'ShS', 'Dayle Rooney', '9', 'Forward', '1994-09-17'),
('ShS10', 'ShS', 'Ryan Brennan', '10', 'Forward', '1991-07-16'),
('ShS11', 'ShS', 'Aaron Dobbs', '11', 'Midfielder', '1997-12-16'),
('DrU1', 'DrU', 'David Odumosu', '1', 'Goalkeeper', '2000-10-10'),
('DrU2', 'DrU', 'James Brown', '2', 'Defender', '1999-02-17'),
('DrU3', 'DrU', 'Dane Massey', '3', 'Defender', '1988-10-07'),
('DrU4', 'DrU', 'Daniel O\'Reilly', '4', 'Defender', '1996-10-13'),
('DrU5', 'DrU', 'Hugh Douglas', '5', 'Defender', '1996-11-09'),
('DrU6', 'DrU', 'Gary Deegan', '6', 'Midfielder', '1987-08-23'),
('DrU7', 'DrU', 'Ronan Murray', '7', 'Midfielder', '1991-05-16'),
('DrU8', 'DrU', 'Mark Doyle', '8', 'Midfielder', '1995-05-07'),
('DrU9', 'DrU', 'Dinny Corcoran', '9', 'Forward', '1988-12-05'),
('DrU10', 'DrU', 'Chris Lyons', '10', 'Forward', '1993-03-12'),
('DrU11', 'DrU', 'Jordan Adeyemo', '11', 'Midfielder', '2002-08-08'),
('FiH1', 'FiH', 'Mark McGinley', '1', 'Goalkeeper', '1988-10-23'),
('FiH2', 'FiH', 'Kosovar Sadiki', '2', 'Defender', '1997-06-24'),
('FiH3', 'FiH', 'Shane McEleney', '3', 'Defender', '1990-09-06'),
('FiH4', 'FiH', 'Karl O\'Sullivan', '4', 'Defender', '1999-09-07'),
('FiH5', 'FiH', 'Ethan Boyle', '5', 'Defender', '1996-02-25'),
('FiH6', 'FiH', 'Ruairi Harkin', '6', 'Midfielder', '1990-08-19'),
('FiH7', 'FiH', 'Gareth Harkin', '7', 'Midfielder', '1991-01-18'),
('FiH8', 'FiH', 'Ryan Rainey', '8', 'Midfielder', '1999-02-28'),
('FiH9', 'FiH', 'Tunde Owolabi', '9', 'Forward', '1998-03-16'),
('FiH10', 'FiH', 'Adam Foley', '10', 'Forward', '1995-07-08'),
('FiH11', 'FiH', 'Mark Coyle', '11', 'Midfielder', '1998-03-15'),
('UCD01', 'UCD', 'Gavin Sheridan', '1', 'Goalkeeper', '1999-01-01'),
('UCD02', 'UCD', 'Evan Osam', '2', 'Defender', '2000-02-02'),
('UCD03', 'UCD', 'Luke Boore', '3', 'Defender', '2001-03-03'),
('UCD04', 'UCD', 'Eoghan O\’Connor', '4', 'Defender', '1998-04-04'),
('UCD05', 'UCD', 'Daniel Tobin', '5', 'Defender', '1997-05-05'),
('UCD06', 'UCD', 'Mark Dignam', '6', 'Midfielder', '1996-06-06'),
('UCD07', 'UCD', 'Paul Doyle', '7', 'Midfielder', '1995-07-07'),
('UCD08', 'UCD', 'Dara Keane', '8', 'Midfielder', '1994-08-08'),
('UCD09', 'UCD', 'Yoyo Mahdy', '9', 'Forward', '1993-09-09'),
('UCD10', 'UCD', 'Colm Whelan', '10', 'Forward', '1992-10-10'),
('UCD11', 'UCD', 'Harvey O\’Brien', '11', 'Midfielder', '1991-11-11'),
('CoR1', 'CoR', 'Adam Mylod', '1', 'Goalkeeper', '1997-05-10'),
('CoR2', 'CoR', 'Charlie Lyons', '2', 'Defender', '2002-09-26'),
('CoR3', 'CoR', 'Ben O\'Riordan', '3', 'Defender', '2000-03-14'),
('CoR4', 'CoR', 'Ciaran Griffin', '4', 'Defender', '1997-07-10'),
('CoR5', 'CoR', 'David Hurley', '5', 'Defender', '1994-09-25'),
('CoR6', 'CoR', 'Ian Turner', '6', 'Midfielder', '1989-08-02'),
('CoR7', 'CoR', 'Beineon O\'Brien Whitmarsh', '7', 'Midfielder', '1997-03-27'),
('CoR8', 'CoR', 'Nathan Coleman', '8', 'Midfielder', '1997-11-11'),
('CoR9', 'CoR', 'Cian Leonard', '9', 'Forward', '1998-01-01'),
('CoR10', 'CoR', 'Killian Cooper', '10', 'Forward', '2000-10-12'),
('CoR11', 'CoR', 'Shane O\'Connor', '11', 'Midfielder', '1998-04-17'),
('LoT1', 'LoT', 'Lee Steacy', '1', 'Goalkeeper', '1997-01-09'),
('LoT2', 'LoT', 'Shane Elworthy', '2', 'Defender', '1998-01-27'),
('LoT3', 'LoT', 'Aaron O\'Driscoll', '3', 'Defender', '1999-03-23'),
('LoT4', 'LoT', 'Joe Gorman', '4', 'Defender', '1994-09-27'),
('LoT5', 'LoT', 'Michael McDonnell', '5', 'Defender', '1992-06-12'),
('LoT6', 'LoT', 'Aodh Dervin', '6', 'Midfielder', '1999-10-07'),
('LoT7', 'LoT', 'Dylan Grimes', '7', 'Midfielder', '2000-05-06'),
('LoT8', 'LoT', 'Matthew O\'Brien', '8', 'Midfielder', '1996-02-11'),
('LoT9', 'LoT', 'Robbie Norton', '9', 'Forward', '1998-01-07'),
('LoT10', 'LoT', 'Karl Chambers', '10', 'Forward', '1993-01-27'),
('LoT11', 'LoT', 'Aaron McNally', '11', 'Midfielder', '2000-07-30'),
('CcC1', 'CcC', 'Mark McNulty', '1', 'Goalkeeper', '1980-11-18'),
('CcC2', 'CcC', 'Charlie Fleming', '2', 'Defender', '1999-07-19'),
('CcC3', 'CcC', 'Alan Bennett', '3', 'Defender', '1981-08-26'),
('CcC4', 'CcC', 'Joseph Olowu', '4', 'Defender', '2000-11-06'),
('CcC5', 'CcC', 'Henry Ochieng', '5', 'Defender', '1998-06-12'),
('CcC6', 'CcC', 'Cian Coleman', '6', 'Midfielder', '1998-11-26'),
('CcC7', 'CcC', 'Beineón O\'Brien-Whitmarsh', '7', 'Midfielder', '2001-09-13'),
('CcC8', 'CcC', 'David Harrington', '8', 'Midfielder', '1999-02-21'),
('CcC9', 'CcC', 'Cian Bargary', '9', 'Forward', '2000-01-03'),
('CcC10', 'CcC', 'Cory Galvin', '10', 'Forward', '1998-11-03'),
('CcC11', 'CcC', 'Dale Holland', '11', 'Midfielder', '1998-12-09'),
('DlW1', 'DlW', 'Niamh Reid-Burke', '1', 'Goalkeeper', '1994-05-16'),
('DlW2', 'DlW', 'Sinead Gaynor', '2', 'Defender', '1997-03-05'),
('DlW3', 'DlW', 'Ciara Maher', '3', 'Defender', '1993-05-22'),
('DlW4', 'DlW', 'Eimear Lafferty', '4', 'Defender', '1996-09-23'),
('DlW5', 'DlW', 'Keeva Keenan', '5', 'Defender', '1994-07-08'),
('DlW6', 'DlW', 'Dearbhaile Beirne', '6', 'Midfielder', '1999-10-07'),
('DlW7', 'DlW', 'Aoibheann Clancy', '7', 'Midfielder', '2001-06-10'),
('DlW8', 'DlW', 'Rachel Doyle', '8', 'Midfielder', '2001-05-19'),
('DlW9', 'DlW', 'Kate Mooney', '9', 'Forward', '1996-11-26'),
('DlW10', 'DlW', 'Aimee Beirne', '10', 'Forward', '1998-10-20'),
('DlW11', 'DlW', 'Emily Whelan', '11', 'Midfielder', '2001-11-18'),
('GuU1', 'GuU', 'Conor Kearns', '1', 'Goalkeeper', '1998-05-29'),
('GuU2', 'GuU', 'Christopher Horgan', '2', 'Defender', '1994-07-18'),
('GuU3', 'GuU', 'Killian Brouder', '3', 'Defender', '1997-01-15'),
('GuU4', 'GuU', 'Stephen Walsh', '4', 'Defender', '1987-01-13'),
('GuU5', 'GuU', 'Maurice Nugent', '5', 'Defender', '1999-07-20'),
('GuU6', 'GuU', 'Mark Hannon', '6', 'Midfielder', '1999-03-01'),
('GuU7', 'GuU', 'David Hurley', '7', 'Midfielder', '1999-06-07'),
('GuU8', 'GuU', 'Ruairi Keating', '8', 'Midfielder', '1996-08-01'),
('GuU9', 'GuU', 'Conor Barry', '9', 'Forward', '1996-11-05'),
('GuU10', 'GuU', 'Padraic Cunningham', '10', 'Forward', '1996-03-28'),
('GuU11', 'GuU', 'Wilson Waweru', '11', 'Midfielder', '2000-09-13'),
('KeF1', 'KeF', 'Adam Horgan', '1', 'Goalkeeper', '1997-10-03'),
('KeF2', 'KeF', 'Alex O\'Connor', '2', 'Defender', '1999-02-01'),
('KeF3', 'KeF', 'Ben Falvey', '3', 'Defender', '1998-09-05'),
('KeF4', 'KeF', 'Cathal O\'Shea', '4', 'Defender', '1996-06-23'),
('KeF5', 'KeF', 'Nathan Gleeson', '5', 'Defender', '1999-03-20'),
('KeF6', 'KeF', 'Stephen McCarthy', '6', 'Midfielder', '1994-11-18'),
('KeF7', 'KeF', 'Darragh O\'Connor', '7', 'Midfielder', '1995-05-07'),
('KeF8', 'KeF', 'Darragh O\'Regan', '8', 'Midfielder', '1997-12-25'),
('KeF9', 'KeF', 'David Clifford', '9', 'Forward', '1998-12-28'),
('KeF10', 'KeF', 'Tadhg Fleming', '10', 'Forward', '2001-01-12'),
('KeF11', 'KeF', 'Sean Kennedy', '11', 'Midfielder', '1998-06-13'),
('PeU01', 'PeU', 'Niamh Reid Burke', '1', 'Goalkeeper', '1987-11-07'),
('PeU02', 'PeU', 'Lauren Kealy', '2', 'Defender', '1996-04-29'),
('PeU03', 'PeU', 'Pearl Slattery', '3', 'Defender', '1993-08-02'),
('PeU04', 'PeU', 'Claire Walsh', '4', 'Defender', '1991-05-27'),
('PeU05', 'PeU', 'Niamh Farrelly', '5', 'Defender', '1997-11-16'),
('PeU06', 'PeU', 'Eleanor Ryan Doyle', '6', 'Midfielder', '1997-03-05'),
('PeU07', 'PeU', 'Lucy McCartan', '7', 'Midfielder', '1995-06-02'),
('PeU08', 'PeU', 'Becky Watkins', '8', 'Midfielder', '1997-09-03'),
('PeU09', 'PeU', 'Áine O\'Gorman', '9', 'Forward', '1989-05-13'),
('PeU10', 'PeU', 'Stephanie Roche', '10', 'Forward', '1989-06-13'),
('PeU11', 'PeU', 'Sarah McKevitt', '11', 'Midfielder', '2002-04-05'),
('TrU1', 'TrU', 'Tadgh Ryan', '1', 'Goalkeeper', '1998-06-02'),
('TrU2', 'TrU', 'Charlie Fleming', '2', 'Defender', '2002-01-11'),
('TrU3', 'TrU', 'Mark Walsh', '3', 'Defender', '1993-08-26'),
('TrU4', 'TrU', 'Anthony O\'Donnell', '4', 'Defender', '1996-07-19'),
('TrU5', 'TrU', 'Eoin McCarthy', '5', 'Defender', '1996-05-12'),
('TrU6', 'TrU', 'Matt Keane', '6', 'Midfielder', '1998-09-06'),
('TrU7', 'TrU', 'Joel Coustrain', '7', 'Midfielder', '1997-08-23'),
('TrU8', 'TrU', 'Cian Coleman', '8', 'Midfielder', '1998-07-26'),
('TrU9', 'TrU', 'Sean McSweeney', '9', 'Forward', '1997-11-16'),
('TrU10', 'TrU', 'Willie Armshaw', '10', 'Forward', '1996-02-02'),
('TrU11', 'TrU', 'Kieran Hanlon', '11', 'Midfielder', '1996-09-05'),
('WaF01', 'WaF', 'Tadhg Ryan', '1', 'Goalkeeper', '1997-06-16'),
('WaF02', 'WaF', 'Kyle Ferguson', '2', 'Defender', '2001-02-02'),
('WaF03', 'WaF', 'Robert Slevin', '3', 'Defender', '2001-01-05'),
('WaF04', 'WaF', 'Alex Phelan', '4', 'Defender', '1995-05-18'),
('WaF05', 'WaF', 'Jack Stafford', '5', 'Defender', '1997-03-21'),
('WaF06', 'WaF', 'Owen Wall', '6', 'Midfielder', '1998-09-01'),
('WaF07', 'WaF', 'Katlego Mashigo', '7', 'Midfielder', '1997-01-21'),
('WaF08', 'WaF', 'Niall O\'Keeffe', '8', 'Midfielder', '1998-07-09'),
('WaF09', 'WaF', 'Daryl Murphy', '9', 'Midfielder', '2001-07-28'),
('WaF10', 'WaF', 'Junior Quitirna', '10', 'Forward', '1996-08-01'),
('WaF11', 'WaF', 'Prince Mutswunguma', '11', 'Forward', '1999-05-09'),
('WeF1', 'WeF', 'Tom Murphy', '1', 'Goalkeeper', '1997-05-22'),
('WeF2', 'WeF', 'John Smith', '2', 'Defender', '1998-03-14'),
('WeF3', 'WeF', 'Sarah Jones', '3', 'Defender', '1999-01-01'),
('WeF4', 'WeF', 'David Brown', '4', 'Defender', '2000-02-29'),
('WeF5', 'WeF', 'Emma Wilson', '5', 'Defender', '1996-04-30'),
('WeF6', 'WeF', 'Lucas Silva', '6', 'Midfielder', '1995-06-15'),
('WeF7', 'WeF', 'Anna Davis', '7', 'Midfielder', '1994-07-11'),
('WeF8', 'WeF', 'James Green', '8', 'Midfielder', '1993-08-27'),
('WeF9', 'WeF', 'Megan Johnson', '9', 'Forward', '1992-09-12'),
('WeF10', 'WeF', 'Jack White', '10', 'Forward', '1991-10-10'),
('WeF11', 'WeF', 'Amy Brown', '11', 'Midfielder', '1990-11-01');
  
  INSERT INTO `fixtures`
  (`match_day`, `home_team`, `away_team`, `match_desc`, `fixture_date`)
  VALUES
  ('1', 'AtC', 'WaF', 'First Division', '2019-04-06'),
  ('1', 'BrW', 'DlW', 'First Division', '2019-04-06'),
  ('1', 'DeC', 'ShR', 'First Division', '2019-04-06'),
('1', 'StP', 'SlR', 'First Division', '2019-04-06'),
('1', 'DuFC', 'BoB', 'First Division', '2019-04-06'),
('1', 'ShS', 'DrU', 'First Division', '2019-04-06'),
('1', 'FiH', 'UCD', 'First Division', '2019-04-06'),
('1', 'CoR', 'LoT', 'First Division', '2019-04-06'),
('1', 'CcC', 'DrM', 'First Division', '2019-04-06'),
('1', 'PeU', 'GuU', 'First Division', '2019-04-06'),
('1', 'TrU', 'WeF', 'First Division', '2019-04-06'),
('2', 'WaF', 'BrW', 'First Division', '2019-04-13'),
('2', 'DlW', 'AtC', 'First Division', '2019-04-13'),
('2', 'ShR', 'StP', 'First Division', '2019-04-13'),
('2', 'SlR', 'DeC', 'First Division', '2019-04-13'),
('2', 'BoB', 'ShS', 'First Division', '2019-04-13'),
('2', 'DrU', 'DuFC', 'First Division', '2019-04-13'),
('2', 'UCD', 'CoR', 'First Division', '2019-04-13'),
('2', 'LoT', 'CcC', 'First Division', '2019-04-13'),
('2', 'DrM', 'PeU', 'First Division', '2019-04-13'),
('2', 'GuU', 'TrU', 'First Division', '2019-04-13'),
('2', 'WeF', 'FiH', 'First Division', '2019-04-13'),
('3', 'AtC', 'SlR', 'First Division', '2019-04-20'),
('3', 'BrW', 'ShR', 'First Division', '2019-04-20'),
('3', 'DeC', 'WaF', 'First Division', '2019-04-20'),
('3', 'StP', 'DlW', 'First Division', '2019-04-20'),
('3', 'DuFC', 'TrU', 'First Division', '2019-04-20'),
('3', 'ShS', 'GuU', 'First Division', '2019-04-20'),
('3', 'FiH', 'DrM', 'First Division', '2019-04-20'),
('3', 'CoR', 'PeU', 'First Division', '2019-04-20'),
('3', 'CcC', 'WeF', 'First Division', '2019-04-20'),
('3', 'PeU', 'BoB', 'First Division', '2019-04-20'),
('3', 'TrU', 'DrU', 'First Division', '2019-04-20'),
('4', 'WaF', 'CoR', 'First Division', '2019-04-27'),
('4', 'DlW', 'CcC', 'First Division', '2019-04-27'),
('4', 'ShR', 'AtC', 'First Division', '2019-04-27'),
('4', 'SlR', 'BrW', 'First Division', '2019-04-27'),
('4', 'BoB', 'DeC', 'First Division', '2019-04-27'),
('4', 'DrU', 'StP', 'First Division', '2019-04-27'),
('4', 'UCD', 'DuFC', 'First Division', '2019-04-27'),
('4', 'LoT', 'ShS', 'First Division', '2019-04-27'),
('4', 'DrM', 'FiH', 'First Division', '2019-04-27'),
('4', 'GuU', 'WeF', 'First Division', '2019-04-27'),
('4', 'WeF', 'PeU', 'First Division', '2019-04-27'),
('5', 'AtC', 'BoB', 'First Division', '2019-05-04'),
('5', 'BrW', 'DrU', 'First Division', '2019-05-04'),
('5', 'DeC', 'UCD', 'First Division', '2019-05-04'),
('5', 'StP', 'LoT', 'First Division', '2019-05-04'),
('5', 'DuFC', 'DrM', 'First Division', '2019-05-04'),
('5', 'ShS', 'GuU', 'First Division', '2019-05-04'),
('5', 'FiH', 'TrU', 'First Division', '2019-05-04'),
('5', 'CoR', 'WaF', 'First Division', '2019-05-04'),
('5', 'CcC', 'SlR', 'First Division', '2019-05-04'),
('5', 'PeU', 'DlW', 'First Division', '2019-05-04'),
('5', 'TrU', 'ShR', 'First Division', '2019-05-04'),
('6', 'WaF', 'DuFC', 'First Division', '2019-05-11'),
('6', 'DlW', 'FiH', 'First Division', '2019-05-11'),
('6', 'ShR', 'CoR', 'First Division', '2019-05-11'),
('6', 'SlR', 'CcC', 'First Division', '2019-05-11'),
('6', 'BoB', 'StP', 'First Division', '2019-05-11'),
('6', 'DrU', 'DeC', 'First Division', '2019-05-11'),
('6', 'UCD', 'LoT', 'First Division', '2019-05-11'),
('6', 'LoT', 'ShS', 'First Division', '2019-05-11'),
('6', 'DrM', 'WeF', 'First Division', '2019-05-11'),
('6', 'GuU', 'PeU', 'First Division', '2019-05-11'),
('6', 'WeF', 'AtC', 'First Division', '2019-05-11'),
('7', 'AtC', 'DrU', 'First Division', '2019-05-18'),
('7', 'BrW', 'UCD', 'First Division', '2019-05-18'),
('7', 'DeC', 'DrM', 'First Division', '2019-05-18'),
('7', 'StP', 'GuU', 'First Division', '2019-05-18'),
('7', 'DuFC', 'WeF', 'First Division', '2019-05-18'),
('7', 'ShS', 'TrU', 'First Division', '2019-05-18'),
('7', 'FiH', 'PeU', 'First Division', '2019-05-18'),
('7', 'CoR', 'SlR', 'First Division', '2019-05-18'),
('7', 'CcC', 'BoB', 'First Division', '2019-05-18'),
('7', 'PeU', 'WaF', 'First Division', '2019-05-18'),
('7', 'TrU', 'DlW', 'First Division', '2019-05-18'),
('8', 'WaF', 'ShS', 'First Division', '2019-05-25'),
('8', 'DlW', 'CoR', 'First Division', '2019-05-25'),
('8', 'ShR', 'FiH', 'First Division', '2019-05-25'),
('8', 'SlR', 'DuFC', 'First Division', '2019-05-25'),
('8', 'BoB', 'DeC', 'First Division', '2019-05-25'),
('8', 'DrU', 'StP', 'First Division', '2019-05-25'),
('8', 'UCD', 'GuU', 'First Division', '2019-05-25'),
('8', 'LoT', 'DrM', 'First Division', '2019-05-25'),
('8', 'DrM', 'BrW', 'First Division', '2019-05-25'),
('8', 'GuU', 'CcC', 'First Division', '2019-05-25'),
('8', 'WeF', 'AtC', 'First Division', '2019-05-25'),
('9', 'AtC', 'BoB', 'First Division', '2019-06-01'),
('9', 'BrW', 'DrU', 'First Division', '2019-06-01'),
('9', 'DeC', 'UCD', 'First Division', '2019-06-01'),
('9', 'StP', 'LoT', 'First Division', '2019-06-01'),
('9', 'DuFC', 'DrM', 'First Division', '2019-06-01'),
('9', 'ShS', 'GuU', 'First Division', '2019-06-01'),
('9', 'FiH', 'TrU', 'First Division', '2019-06-01'),
('9', 'CoR', 'WaF', 'First Division', '2019-06-01'),
('9', 'CcC', 'SlR', 'First Division', '2019-06-01'),
('9', 'PeU', 'DlW', 'First Division', '2019-06-01'),
('9', 'TrU', 'ShR', 'First Division', '2019-06-01'),
('10', 'WaF', 'DuFC', 'First Division', '2019-06-08'),
('10', 'DlW', 'FiH', 'First Division', '2019-06-08'),
('10', 'ShR', 'CoR', 'First Division', '2019-06-08'),
('10', 'SlR', 'CcC', 'First Division', '2019-06-08'),
('10', 'BoB', 'StP', 'First Division', '2019-06-08'),
('10', 'DrU', 'DeC', 'First Division', '2019-06-08'),
('10', 'UCD', 'LoT', 'First Division', '2019-06-08'),
('10', 'LoT', 'ShS', 'First Division', '2019-06-08'),
('10', 'DrM', 'WeF', 'First Division', '2019-06-08'),
('10', 'GuU', 'PeU', 'First Division', '2019-06-08'),
('10', 'WeF', 'AtC', 'First Division', '2019-06-08');


  
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

DROP TABLE IF EXISTS new_players;

CREATE TABLE `irish_football_fantasy`.`new_players` (
`player_id` VARCHAR(10) NOT NULL ,
`player_name` VARCHAR(50) NOT NULL ,
`shirt_no` INT NOT NULL ,
`position` VARCHAR(20) NOT NULL ,
`image_url` VARCHAR(255) NOT NULL ,
`dob` DATE NOT NULL ,
PRIMARY KEY  (`player_id`));

INSERT INTO `new_players` (`player_id`, `player_name`, `shirt_no`, `position`, `image_url`, `dob`)
VALUES 
('DrM1', 'David De Gea', '1', 'Goalkeeper', 'https://e2.365dm.com/18/04/800x600/skysports-de-gea-david-de-gea_4277878.jpg?20180408202315', '1990-11-07'),
('DrM23', 'Unai Simón', '23', 'Goalkeeper', 'https://idsb.tmgrup.com.tr/ly/uploads/images/2022/12/05/244948.jpg', '1997-06-11'),
('DrM25', 'Robert Sánchez', '25', 'Goalkeeper', 'https://icdn.caughtoffside.com/wp-content/uploads/2021/01/New-Project-37-1.jpg', '1997-11-18'),
('DrM2', 'César Azpilicueta', '2', 'Defender', 'https://resources.premierleague.com/photos/2019/05/01/47ab7bb5-54e8-4085-bf11-21eca4a8b386/azpilicueta.jpg?width=930&height=620', '1989-08-28'),
('DrM4', 'Sergio Ramos', '4', 'Defender', 'https://assets.goal.com/v3/assets/bltcc7a7ffd2fbf71f5/blt4006aa4324d537f4/60da723d0401cb0ebfa64256/79f3ed1268bb523d98923c0fbb6f73ef46243bfe.jpg', '1986-03-30'),
('DrM3', 'Diego Llorente', '3', 'Defender', 'https://resources.premierleague.com/photos/2021/04/27/fb3a8e17-9ec1-4b87-86bb-15b2b3d846be/GettyImages-1313432192.jpg?width=929&height=620', '1993-08-16'),
('DrM14', 'José Gayà', '14', 'Defender', 'https://icdn.football-espana.net/wp-content/uploads/2021/12/Jose-Gaya.jpeg', '1995-05-25'),
('DrM18', 'Jordi Alba', '18', 'Defender', 'https://imageio.forbes.com/specials-images/imageserve/63e0b5e52de23b634319db8e/0x0.jpg?format=jpg&width=1200', '1989-03-21'),
('DrM12', 'Eric García', '12', 'Defender', 'https://phantom-marca.unidadeditorial.es/56604b8852c65b2bd7e01789f40e5af3/resize/1320/f/jpg/assets/multimedia/imagenes/2020/11/17/16056371625082.jpg', '2001-01-09'),
('DrM16', 'Marcos Llorente', '16', 'Midfielder', 'https://www.planetsport.com/image-library/og/1600/m/marcos-llorente-of-atletico-de-madrid-3-jan-2023.jpg', '1995-01-30'),
('DrM5', 'Sergio Busquets', '5', 'Midfielder', 'https://imageio.forbes.com/specials-images/imageserve/63dcccaf5d55ef2ed79afec2/Sergio-Busquets-could-leave-FC-Barcelona-for-Saudi-Arabia-/960x0.jpg?format=jpg&width=960', '1988-07-16'),
('DrM26', 'Pedri', '26', 'Midfielder', 'https://icdn.football-espana.net/wp-content/uploads/2023/02/Pedri-injury.jpeg', '2002-11-25'),
('DrM8', 'Koke', '8', 'Midfielder', 'https://a.espncdn.com/photo/2022/1001/r1069311_1296x729_16-9.jpg', '1992-01-08'),
('DrM6', 'Rodri', '6', 'Midfielder', 'https://e0.365dm.com/21/02/2048x1152/skysports-rodri-manchester-city_5276755.jpg', '1996-06-22'),
('DrM10', 'Thiago Alcântara', '10', 'Midfielder', 'https://sm.imgix.net/21/50/thiago-alcantara.jpg?w=640&h=480&auto=compress,format&fit=clip', '1991-04-11'),
('DrM11', 'Gerard Moreno', '11', 'Forward', 'https://i.dailymail.co.uk/1s/2022/04/17/16/56716543-10726501-image-a-10_1650210823981.jpg', '1992-04-07'),
('DrM7', 'Alvaro Morata', '7', 'Forward', 'https://imgresizer.eurosport.com/unsafe/1200x0/filters:format(jpeg):focal(1426x414:1428x412)/origin-imgresizer.eurosport.com/2022/10/01/3463223-70649628-2560-1440.jpg', '1992-10-23'),
('DrM21', 'Ferran Torres', '21', 'Forward', 'https://assets.goal.com/v3/assets/bltcc7a7ffd2fbf71f5/blt124e84ba9fab2d3b/61a6acf1fc16c6680394f752/Ferran_Torres_Manchester_City_2021-22.jpg?auto=webp&format=jpg&quality=100', '2001-09-20'),
('DrM22', 'Mikel Oyarzabal', '22', 'Forward', 'https://thetopflight.com/wp-content/uploads/getty-images/2017/07/1173193953.jpeg', '1997-01-13');


DROP TABLE IF EXISTS new_managers;

CREATE TABLE `irish_football_fantasy`.`new_managers` (
`manager_id` VARCHAR(10) NOT NULL ,
`manager_name` VARCHAR(50) NOT NULL ,
`manager_pic` VARCHAR(255) NOT NULL ,
`stadium_name` VARCHAR(50) NOT NULL ,
`capacity` INT NOT NULL ,
`city` VARCHAR(50) NOT NULL
);

INSERT INTO `new_managers` (`manager_id`, `manager_name`, `manager_pic`, `stadium_name`,`capacity`, `city`)
VALUES
(1,"José Mourinho", "https://assets.goal.com/v3/assets/bltcc7a7ffd2fbf71f5/blt3bc716953332d7f9/63a6e9e2435c2a54c7ee99b9/GettyImages-1239718904.jpg", "Tottenham Hotspur Stadium", 62000, "London"),
(2,"Pep Guardiola", "https://therealchamps.com/wp-content/uploads/getty-images/2017/07/1432660636.jpeg", "Etihad Stadium", 55097, "Manchester"),
(3,"Jurgen Klopp", "https://images.teamtalk.com/content/uploads/2023/02/25221428/jurgen-klopp-applauds-liverpool-fans-after-crystal-palace-draw.jpg", "Anfield", 54074, "Liverpool"),
(4,"Thomas Tuchel", "https://e0.365dm.com/21/05/2048x1152/skysports-thomas-tuchel-chelsea_5400225.jpg", "Stamford Bridge", 42055, "London"),
(5,"Mikel Arteta", "https://d2x51gyc4ptf2q.cloudfront.net/content/uploads/2023/01/10080840/Arsenal-boss-Mikel-Arteta-6.jpg", "Emirates Stadium", 60355, "London"),
(6,"Ralph Hasenhuttl", "https://e0.365dm.com/22/11/2048x1152/skysports-ralph-hasenhuttl_5951021.jpg", "St Mary's Stadium", 32689, "Southampton"),
(7,"Nuno Espirito Santo", "https://e0.365dm.com/20/03/2048x1152/skysports-nuno-espirito-santo_4950749.jpg", "Molineux Stadium", 31274, "Wolverhampton"),
(8,"Chris Wilder", "https://e0.365dm.com/19/10/2048x1152/skysports-graphic-chris-wilder_4808904.jpg", "Bramall Lane", 32778, "Sheffield"),
(9,"Graham Potter", "https://images.teamtalk.com/content/uploads/2023/02/18205806/chelsea-manager-graham-potter2.jpg", "American Express Community Stadium", 30750, "Brighton"),
(10,"David Moyes", "https://static.independent.co.uk/2023/02/20/20/115eddf8814ce065e99879d01320e3fcY29udGVudHNlYXJjaGFwaSwxNjc3MDEwMTgw-2.70948735.jpg", "London Stadium", 60000, "London"),
(11,"Slaven Bilic", "https://m.media-amazon.com/images/M/MV5BNzUzMmY2MDctYjY3Ni00ZmRmLTg0YWItNjg3NTJiYmY5NWMzXkEyXkFqcGdeQXVyMjUyNDk2ODc@._V1_.jpg", "Boleyn Ground", 60000, "London"),
(12,"Steve Bruce", "https://www.expressandstar.com/resizer/S2MJZagr__KwscqhRgEr-RwKndE=/1200x0/cloudfront-us-east-1.images.arcpublishing.com/mna/PQGB6GT3FBFW3KMFSX6PYDHTZM.jpg", "St James' Park", 52338, "Newcastle");