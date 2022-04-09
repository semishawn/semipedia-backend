-- Radio/Checkbox/Likert:
-- Create table
CREATE TABLE pack_radio (
  option1 int NOT NULL DEFAULT 0,
  option2 int NOT NULL DEFAULT 0,
  option3 int NOT NULL DEFAULT 0,
  option4 int NOT NULL DEFAULT 0,
  option5 int NOT NULL DEFAULT 0
);
-- Set initial values
INSERT INTO pack_radio (option1, option2, option3, option4, option5) VALUES (0, 0, 0, 0, 0);
-- Make title primary
ALTER TABLE pack_radio ADD PRIMARY KEY (option1);
-- Reset/alter values
UPDATE pack_radio SET option1 = 0, option2 = 0 WHERE title = 'my poll';



-- Short/Answer Answer:
-- Create table
CREATE TABLE pack_short_answer (
  date text NOT NULL,
  answer text NOT NULL
);
-- Set initial values
INSERT INTO pack_short_answer (date, answer) VALUES ('Aug 28, 2020 6:42am', 'Test answer ;)');
-- Make title primary
ALTER TABLE pack_short_answer ADD PRIMARY KEY (date);