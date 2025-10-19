CREATE DATABASE Prueba1;
USE Prueba1;
CREATE TABLE Paises (
    id char(5) PRIMARY KEY,
    nombre char(50) NOT NULL
);

INSERT INTO Paises
VALUES ('PE','Peru'),('CO','Colombia'),('MX','Mexico'),('AR','Argentina'),('ES','España'),('CL','Chile');
