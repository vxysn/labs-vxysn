CREATE SCHEMA `lw4`;

CREATE TABLE `lw4`.`users` (
  `id` INT NOT NULL,
  `login` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));

INSERT INTO `lw4`.`users` (`id`, `login`, `password`, `name`) VALUES ('1', 'admin', 'admin', 'Curly');
INSERT INTO `lw4`.`users` (`id`, `login`, `password`, `name`) VALUES ('2', 'solo', 'bob', 'Bob');
INSERT INTO `lw4`.`users` (`id`, `login`, `password`, `name`) VALUES ('3', '5656', '5656', 'Danny');
