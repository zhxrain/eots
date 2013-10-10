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

INSERT INTO tbl_user (username, password, email) VALUES ('admin', 'admin', 'admin@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('demo', 'demo', 'demo@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test1', 'test1', 'test1@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test2', 'test2', 'test2@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test3', 'test3', 'test3@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test4', 'test4', 'test4@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test5', 'test5', 'test5@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test6', 'test6', 'test6@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test7', 'test7', 'test7@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test8', 'test8', 'test8@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test9', 'test9', 'test9@example.com');
