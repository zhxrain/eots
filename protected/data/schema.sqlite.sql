--项目表，Yii默认表名：AuthItem
--    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
CREATE TABLE IF NOT EXISTS auth_item(
    name VARCHAR(20) NOT NULL PRIMARY KEY,  --COMMENT "项目名" 
    type INTEGER NOT NULL, --COMMENT "0:操作（operation），1：任务（task），2：角色（role）"
    description VARCHAR(30) DEFAULT "",
    bizrule VARCHAR(100) DEFAULT NULL, --COMMENT "业务规则，一段php代码"
    data VARCHAR(100) DEFAULT NULL --COMMENT "额外的数据"
);

--项目层次表，存储操作、任务、角色之间的层次关系，Yii默认表名：AuthItemChild
CREATE TABLE IF NOT EXISTS auth_item_child(
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    itemname VARCHAR(20) NOT NULL, --COMMENT "项目名"
    childname VARCHAR(20) NOT NULL --COMMENT "项目名"
);
--存储角色与用户之间的关系，Yii默认表名：AuthAssignment
CREATE TABLE IF NOT EXISTS auth_assignment(
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    userid INTEGER NOT NULL,
    itemname VARCHAR(20) NOT NULL, --COMMENT "项目名"
    bizrule VARCHAR(100) DEFAULT NULL, --COMMENT "业务规则，一段php代码"
    data VARCHAR(100) DEFAULT NULL --COMMENT "额外的数据"
);

--用户表
CREATE TABLE IF NOT EXISTS users(
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    username VARCHAR(15) NOT NULL,
    password VARCHAR(25) NOT NULL,
    email VARCHAR(128) NOT NULL
);

INSERT INTO users (username, password, email) VALUES ('admin', 'admin', 'admin@example.com');
INSERT INTO users (username, password, email) VALUES ('demo', 'demo', 'demo@example.com');
INSERT INTO users (username, password, email) VALUES ('test1', 'test1', 'test1@example.com');
INSERT INTO users (username, password, email) VALUES ('test2', 'test2', 'test2@example.com');
INSERT INTO users (username, password, email) VALUES ('test3', 'test3', 'test3@example.com');
INSERT INTO users (username, password, email) VALUES ('test4', 'test4', 'test4@example.com');
INSERT INTO users (username, password, email) VALUES ('test5', 'test5', 'test5@example.com');
INSERT INTO users (username, password, email) VALUES ('test6', 'test6', 'test6@example.com');
INSERT INTO users (username, password, email) VALUES ('test7', 'test7', 'test7@example.com');
INSERT INTO users (username, password, email) VALUES ('test8', 'test8', 'test8@example.com');
INSERT INTO users (username, password, email) VALUES ('test9', 'test9', 'test9@example.com');
