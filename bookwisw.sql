CREATE TABLE livros (
  id integer PRIMARY KEY AUTO_INCREMENT ,
  titulo varchar(255),
  author varchar(255),
  descricao text,
  ano_de_lancamento integer,
  usuario_id integer
);

CREATE TABLE usuarios (
  id integer PRIMARY KEY AUTO_INCREMENT,
  nome varchar(255),
  email varchar(255)
);

ALTER TABLE livros
ADD UNIQUE INDEX (usuario_id);

ALTER TABLE livros
ADD PRIMARY KEY (usuario_id);

ALTER TABLE usuarios
ADD FOREIGN KEY (id) REFERENCES livros (usuario_id);

commit;


INSERT INTO livros (titulo, author, descricao, ano_de_lancamento, usuario_id)
VALUES ('El Nombre del Viento', 'Patrick Rothfuss', 'Un joven mago emprende un viaje épico', 2007, 1);
 
INSERT INTO livros (titulo, author, descricao, ano_de_lancamento, usuario_id)
VALUES ('El Temor de un Hombre Sabio', 'Patrick Rothfuss', 'La continuación de una historia legendaria', 2011, 2);
 
INSERT INTO livros (titulo, author, descricao, ano_de_lancamento, usuario_id)
VALUES ('La República', 'Platón', 'Un diálogo filosófico sobre la justicia y la ciudad ideal', 380, 3);
  