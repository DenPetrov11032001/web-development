CREATE TABLE student
(
    id           INT AUTO_INCREMENT NOT NULL,
    name         VARCHAR(255)       NOT NULL,
    last_name    VARCHAR(255)       NOT NULL,
    age          INT                NOT NULL,
    group_id     INT                NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (group_id) REFERENCES group_students (id)
) DEFAULT CHARACTER SET utf8mb4
  COLLATE 'utf8mb4_unicode_ci'
  ENGINE = InnoDB
;

CREATE TABLE group_students
(
    id            INT AUTO_INCREMENT NOT NULL,
    faculty_id    INT                NOT NULL,
    major         VARCHAR(255)       NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (faculty_id) REFERENCES faculty (id)
) DEFAULT CHARACTER SET utf8mb4
  COLLATE 'utf8mb4_unicode_ci'
  ENGINE = InnoDB
;

CREATE TABLE faculty
(
    id              INT AUTO_INCREMENT NOT NULL,
    faculty_topic   VARCHAR(255)       NOT NULL,
    PRIMARY KEY (id)
) DEFAULT CHARACTER SET utf8mb4
  COLLATE 'utf8mb4_unicode_ci'
  ENGINE = InnoDB
;