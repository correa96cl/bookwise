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
  email varchar(255),
  senha varchar(255)
);

CREATE TABLE avaliacoes (
  id integer primary key,
  usuario_id integer,
  livro_id integer,
  avaliacao text,
  nota integer,
  FOREIGN KEY (usuario_id) REFERENCES usuarios (id) on delete cascade,
  FOREIGN KEY (livro_id) REFERENCES livros (id) on delete cascade
)

ALTER TABLE livros
ADD UNIQUE INDEX (usuario_id);

ALTER TABLE livros
ADD PRIMARY KEY (usuario_id);

ALTER TABLE usuarios
ADD FOREIGN KEY (id) REFERENCES livros (usuario_id);

commit;


INSERT INTO livros (titulo, author, descricao, ano_de_lancamento, usuario_id)
VALUES ('Dune', 'Frank Herbert', 'Una épica historia de política y ecología en un planeta desértico', 1965, 19);

-- Un libro de no ficción sobre historia
INSERT INTO livros
    (titulo, author, descricao, ano_de_lancamento, usuario_id)
VALUES
    ('Sapiens: De animales a dioses', 'Yuval Noah Harari', 'Una exploración de la historia de la humanidad', 2011, 19);

-- Un libro infantil
INSERT INTO livros
    (titulo, author, descricao, ano_de_lancamento, usuario_id)
VALUES
    ('El Principito', 'Antoine de Saint-Exupéry', 'Una fábula sobre la amistad y la vida', 1943, 21);
    
   INSERT INTO livros (titulo, author, descricao, ano_de_lancamento, usuario_id)
VALUES ('El Nombre del Viento', 'Patrick Rothfuss', 'Un joven mago emprende un viaje épico', 2007, 19);
 
INSERT INTO livros (titulo, author, descricao, ano_de_lancamento, usuario_id)
VALUES ('El Temor de un Hombre Sabio', 'Patrick Rothfuss', 'La continuación de una historia legendaria', 2011, 19);
 
INSERT INTO livros (titulo, author, descricao, ano_de_lancamento, usuario_id)
VALUES ('La República', 'Platón', 'Un diálogo filosófico sobre la justicia y la ciudad ideal', 380, 19);
  