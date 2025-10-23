CREATE TABLE Usuarios(
    id tinyint AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(50) NOT NULL,
    password varchar(50) NOT NULL,
    pais char(3) NOT NULL
)

CREATE TABLE Usuarios_Intereses(
    idUsuario TINYINT,
    idInteres CHAR(3) NOT NULL,
    PRIMARY KEY (idUsuario, idInteres)
);

DROP TABLE Usuarios_Intereses;
