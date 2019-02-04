CREATE DATABASE dbPruebaPHP;

USE dbPruebaPHP;

DROP TABLE Departamento;

SELECT * FROM Departamento;

CREATE TABLE Departamento(
	codDepto INT NOT NULL PRIMARY KEY,
	nombreDpto VARCHAR(50) NOT NULL,
	ciudad VARCHAR(50) NOT NULL,
	director VARCHAR(12)
);

DROP TABLE Empleado;

CREATE TABLE Empleado(
	NDIEmp VARCHAR(12) NOT NULL PRIMARY KEY,
	nomEmp VARCHAR(100) NOT NULL,
	fecEmp DATE NOT NULL,
	salEmp FLOAT NOT NULL,
	comis FLOAT NOT NULL,
	cargo VARCHAR(50),
	nroDepto INT,
	CONSTRAINT FK_Dep FOREIGN KEY (nroDepto) REFERENCES Departamento
);

INSERT INTO Departamento (codDepto,nombreDpto,ciudad,director) VALUES
(1,'GERENCIA','Madrid','82.198.552'),
(2,'VENTAS','Madrid','17.203.034'),
(3,'VENTAS','BARCELONA','17.203.034'),
(4,'ADMINISTRACION','Madrid','14.692.266'),
(5,'ADMINISTRACION','BARCELONA','14.696.266'),
(6,'rrhh','Madrid',NULL),
(7,'rrhh','BARCELONA',NULL);

SELECT * FROM Departamento;
