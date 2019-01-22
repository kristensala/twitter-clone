--poolik
create table t142359_image
(
id      INT       NOT NULL AUTO_INCREMENT,
user_id INT       NOT NULL,
image   BLOB      NOT NULL,
name    VARCHAR(250) NOT NULL,
PRIMARY KEY (id)
);

--poolik
create table t142359v1_tweet
(
id      INT           NOT NULL AUTO_INCREMENT,
user_id INT           NOT NULL,
tweet   VARCHAR(500)  NOT NULL,
insert_date DATE      NOT NULL,
PRIMARY KEY (id)
);

--uus versioon pean uuesti labi laksma
create table t142359v3_users
(
id          INT           NOT NULL AUTO_INCREMENT,
username    VARCHAR(25)   NOT NULL UNIQUE,
password    VARCHAR(25)   NOT NULL,
email       VARCHAR(255)  NOT NULL UNIQUE,
about       VARCHAR(500)  NOT NULL,
PRIMARY KEY (id)
);

select tweet from t142359_user_tweet as user_tweet inner join t142359_users as users on user_tweet.user_id=users.id
