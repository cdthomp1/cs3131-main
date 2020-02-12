
CREATE TABLE topic (
  id serial PRIMARY KEY,
  name varchar(255) NOT NULL
);

INSERT INTO topic (name) VALUES ('Faith');

INSERT INTO topic (name) VALUES ('Sacrifice');

INSERT INTO topic (name) VALUES ('Charity');

CREATE TABLE scripture_links (
scriptureId int NOT NULL REFERENCES scriptures(id),
topicId int NOT NULL REFERENCES topic(id)
)

INSERT INTO scripture (book, chapter, verse, content) VALUES ($book)

INSERT INTO scripture_links (scriptureId, topicID) VALUES (
    ()
)

SELECT scriptureId,topicId,name INNER JOIN ON topic WHERE id = scriptureId