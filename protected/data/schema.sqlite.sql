CREATE TABLE tbl_user (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL,
    email VARCHAR(128) NOT NULL
);

CREATE TABLE tbl_role (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    rolename VARCHAR(128) NOT NULL
);

INSERT INTO tbl_user (username, password, email) VALUES ('admin', 'admin', 'test1@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('demo', 'demo', 'test1@example.com');
