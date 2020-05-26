CREATE TEMPORARY TABLE tmp SELECT * FROM `stores`;

SELECT * FROM tmp;
`users`
UPDATE tmp SET id='';

INSERT INTO `stores` SELECT * FROM tmp;

DROP TABLE tmp ;