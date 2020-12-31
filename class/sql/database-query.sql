CREATE TABLE `wordpress`.`table_exemple` ( 
    `ID` INT AUTO_INCREMENT PRIMARY KEY, 
    `column_name` VARCHAR(255) NOT NULL , 
    `column_age` INT(3) NOT NULL , 
    `column_town` VARCHAR(2) NOT NULL , 
    `column_sex` VARCHAR(1) NOT NULL 
) ENGINE = InnoDB COMMENT = 'Tabela exemplo para plugin'; 

/* Mock */
INSERT INTO `table_exemple`(`column_name`, `column_age`, `column_town`, `column_sex`) 
VALUES 
    ("Bruno",24,"RJ","M"),
    ("Gabriel",19,"SP","M"),
    ("Laura",30,"SE","F"),
    ("Brenda",21,"SP","F");