CREATE TABLE IF NOT EXISTS users (
username VARCHAR PRIMARY KEY,
password VARCHAR
);

CREATE TABLE IF NOT EXISTS events (
id INTEGER PRIMARY KEY AUTOINCREMENT,
date DATETIME,
description VARCHAR,
type VARCHAR,
creator VARCHAR REFERENCES users(username),
path TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS event_comments (
id INTEGER PRIMARY KEY AUTOINCREMENT,
event_id INTEGER,
author VARCHAR,
text VARCAHR
);

CREATE TABLE IF NOT EXISTS event_registrations (
user VARCHAR,
event_id INTEGER,
PRIMARY KEY (user, event_id)
);

INSERT into users(username, password) VALUES("admin", "d033e22ae348aeb5660fc2140aec35850c4da997");
