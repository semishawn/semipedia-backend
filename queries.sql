--- Multiple Choice:
--- Create table
CREATE TABLE multi_choice (
  title text NOT NULL,
  option1 int NOT NULL DEFAULT 0,
  option2 int NOT NULL DEFAULT 0,
  option3 int NOT NULL DEFAULT 0
);
--- Set initial values
INSERT INTO multi_choice (title, option1, option2, option3) VALUES ('my poll', 0, 0, 0);
--- Make title primary
ALTER TABLE multi_choice ADD PRIMARY KEY (title);
--- Reset values
UPDATE multi_choice SET option1 = 0, option2 = 0, option3 = 0 WHERE title = 'my poll';



--- Yes or No:
--- Create table
CREATE TABLE yes_no (
  title text NOT NULL,
  yes int NOT NULL DEFAULT 0,
  no int NOT NULL DEFAULT 0
);
--- Set initial values
INSERT INTO yes_no (title, yes, no) VALUES ('my poll', 0, 0);
--- Make title primary
ALTER TABLE yes_no ADD PRIMARY KEY (title);
--- Reset values
UPDATE yes_no SET yes = 0, no = 0 WHERE title = 'my poll';



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