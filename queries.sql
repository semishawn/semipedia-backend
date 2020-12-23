--- Multiple Choice:
--- Create table
CREATE TABLE multi_choice2 (
  title text NOT NULL,
  option1 int NOT NULL DEFAULT 0,
  option2 int NOT NULL DEFAULT 0
);
--- Set initial values
INSERT INTO multi_choice2 (title, option1, option2) VALUES ('my poll', 0, 0);
--- Make title primary
ALTER TABLE multi_choice2 ADD PRIMARY KEY (title);
--- Reset/alter values
UPDATE multi_choice2 SET option1 = 0, option2 = 0 WHERE title = 'my poll';



--- Open Ended:
--- Create table
CREATE TABLE open_ended (
  date text NOT NULL,
  answer text NOT NULL
);
--- Set initial values
INSERT INTO open_ended (date, answer) VALUES ('Aug 28, 2020 6:42am', 'My ass is so god damn huge');
--- Make title primary
ALTER TABLE open_ended ADD PRIMARY KEY (date);



--- Likert Scale:
--- Create table
CREATE TABLE likert (
  title text NOT NULL,
  point1 int NOT NULL DEFAULT 0,
  point2 int NOT NULL DEFAULT 0,
  point3 int NOT NULL DEFAULT 0,
  point4 int NOT NULL DEFAULT 0,
  point5 int NOT NULL DEFAULT 0
);
--- Set initial values
INSERT INTO likert (title, point1, point2, point3, point4, point5) VALUES ('my poll', 0, 0, 0, 0, 0);
--- Make title primary
ALTER TABLE likert ADD PRIMARY KEY (title);
--- Reset/alter values
UPDATE likert SET point1 = 0, point2 = 0, point3 = 0, point4 = 0, point5 = 0 WHERE title = 'my poll';