CREATE TABLE note_user (
    user_id SERIAL PRIMARY KEY,
    user_name varchar(255) NOT NULL UNIQUE
);

CREATE TABLE speaker (
    speaker_id SERIAL PRIMARY KEY,
    speaker_name varchar(255) NOT NULL UNIQUE
);

CREATE TABLE conference_session (
    conference_session_id SERIAL PRIMARY KEY,
    conference_session_date DATE NOT NULL DEFAULT CURRENT_DATE,
    conference_session_name varchar(255) NOT NULL UNIQUE
    
);

CREATE TABLE talk (
    talk_id SERIAL PRIMARY KEY,
    talk_title varchar(255) NOT NULL UNIQUE,
    session_id integer NOT NULL REFERENCES conference_session (conference_session_id),
    speaker_id integer NOT NULL REFERENCES speaker (speaker_id)
);



CREATE TABLE note (
    note_id SERIAL PRIMARY KEY,
    note_text varchar(255) NOT NULL UNIQUE,
    user_id integer NOT NULL  REFERENCES note_user(user_id),
    talk_id INTEGER NOT NULL REFERENCES talk (talk_id)
);


INSERT INTO conference_session (conference_session_date, conference_session_name) VALUES ('2019-10-05', 'Saturday Morning'); --id 1
INSERT INTO conference_session (conference_session_date, conference_session_name) VALUES ('2019-10-06', 'Sunday Afternoon'); --id 2

INSERT INTO note_user (user_name) VALUES ('Mark');
INSERT INTO note_user (user_name) VALUES ('Cameron');

INSERT INTO speaker (speaker_name) VALUES ('Dallin H Oaks');
INSERT INTO speaker (speaker_name) VALUES ('Henry B Eyring');

INSERT INTO talk (talk_title, session_id, speaker_id) VALUES
(
    'The Message, the Meaning, and the Multitude',
    (SELECT conference_session_id FROM conference_session 
        WHERE conference_session_date = '2019-10-05' AND conference_session_name = 'Saturday Morning'),
    (SELECT speaker_id FROM speaker 
        WHERE speaker_name = 'Dallin H Oaks')
);

INSERT INTO talk (talk_title, session_id, speaker_id) VALUES
(
    'Holiness and the Plan of Happiness',
    (SELECT conference_session_id FROM conference_session WHERE conference_session_date = '2019-10-06' AND conference_session_name = 'Sunday Afternoon'),
    (SELECT speaker_id FROM speaker WHERE speaker_name = 'Henry B Eyring')
);

INSERT INTO note (note_text, user_id, talk_id) VALUES ('The Atonement of Christ is essential in our day.', 
    (SELECT user_id FROM note_user WHERE user_name = 'Mark'),
    (SELECT talk_id FROM talk WHERE talk_title = 'The Message, the Meaning, and the Multitude')
);

INSERT INTO note (note_text, user_id, talk_id) VALUES ('The Holy Ghost will comfort us when we are in need.', 
(Select user_id from note_user where user_name = 'Cameron'), 
(Select talk_id from talk join speaker on speaker_name = 'Henry B Eyring' where talk_title = 'Holiness and the Plan of Happiness'));

Select note_text from note n
    Left Join talk t on t.talk_id = n.talk_id
Where talk = 'Holiness and the Plan of Happiness'
;
