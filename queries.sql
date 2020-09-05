--- Multiple Choice 2:
--- Create table
CREATE TABLE multi_choice2 (
  title text NOT NULL,
  option1 int NOT NULL DEFAULT 0,
  option2 int NOT NULL DEFAULT 0,
  option3 int NOT NULL DEFAULT 0
);
--- Set initial values
INSERT INTO multi_choice2 (title, option1, option2) VALUES ('my poll', 0, 0);
--- Make title primary
ALTER TABLE multi_choice2 ADD PRIMARY KEY (title);
--- Reset values
UPDATE multi_choice2 SET option1 = 0, option2 = 0 WHERE title = 'my poll';



--- Multiple Choice 3:
--- Create table
CREATE TABLE multi_choice3 (
  title text NOT NULL,
  option1 int NOT NULL DEFAULT 0,
  option2 int NOT NULL DEFAULT 0,
  option3 int NOT NULL DEFAULT 0
);
--- Set initial values
INSERT INTO multi_choice3 (title, option1, option2, option3) VALUES ('my poll', 0, 0, 0);
--- Make title primary
ALTER TABLE multi_choice3 ADD PRIMARY KEY (title);
--- Reset values
UPDATE multi_choice3 SET option1 = 0, option2 = 0, option3 = 0 WHERE title = 'my poll';



--- Open Ended
--- Create table
CREATE TABLE open_ended (
  date text NOT NULL,
  answer text NOT NULL
);
--- Set initial values
INSERT INTO open_ended (date, answer) VALUES ('Aug 28, 2020 6:42am', 'My ass is so god damn huge');
--- Make title primary
ALTER TABLE open_ended ADD PRIMARY KEY (date);