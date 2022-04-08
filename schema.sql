-- Radio/Checkbox:
-- Create table
CREATE TABLE pack_radio (
  title text NOT NULL,
  option1 int NOT NULL DEFAULT 0,
  option2 int NOT NULL DEFAULT 0,
  option3 int NOT NULL DEFAULT 0,
  option4 int NOT NULL DEFAULT 0,
  option5 int NOT NULL DEFAULT 0
);
-- Set initial values
INSERT INTO pack_radio (title, option1, option2, option3, option4, option5) VALUES ('my poll', 0, 0, 0, 0, 0);
-- Make title primary
ALTER TABLE pack_radio ADD PRIMARY KEY (title);
-- Reset/alter values
UPDATE pack_radio SET option1 = 0, option2 = 0 WHERE title = 'my poll';



-- Short/Answer Answer:
-- Create table
CREATE TABLE pack_short_answer (
  date text NOT NULL,
  response text NOT NULL
);
-- Set initial values
INSERT INTO pack_short_answer (date, response) VALUES ('Aug 28, 2020 6:42am', 'Test response ;)');
-- Make title primary
ALTER TABLE pack_short_answer ADD PRIMARY KEY (date);



-- Likert Scale:
-- Create table
CREATE TABLE pack_likert (
  title text NOT NULL,
  point1 int NOT NULL DEFAULT 0,
  point2 int NOT NULL DEFAULT 0,
  point3 int NOT NULL DEFAULT 0,
  point4 int NOT NULL DEFAULT 0,
  point5 int NOT NULL DEFAULT 0
);
-- Set initial values
INSERT INTO likert (title, point1, point2, point3, point4, point5) VALUES ('my poll', 0, 0, 0, 0, 0);
-- Make title primary
ALTER TABLE likert ADD PRIMARY KEY (title);
-- Reset/alter values
UPDATE likert SET point1 = 0, point2 = 0, point3 = 0, point4 = 0, point5 = 0 WHERE title = 'my poll';