\c lbaw1712;

DELETE FROM mb_user WHERE username = 'user_test_1';
DELETE FROM band WHERE name = 'Pearl Jam';
DELETE FROM ban;
DELETE FROM message;
DELETE FROM content;
DELETE FROM notification_trigger;
DELETE FROM band_membership;

INSERT INTO mb_user(username,password,name,bio,dateOfBirth,location,admin) 
    VALUES('user_test_1','pwd','user_test_1', 'bio_test','01/01/1980',1,TRUE);

INSERT INTO mb_user(username,password,name,bio,dateOfBirth,location,admin) 
    VALUES('user_test_2','pwd','user_test_2', 'bio_test','01/01/1980',1,TRUE);

INSERT INTO band (name, location) VALUES('Pearl Jam',1);

INSERT INTO content(text) VALUES('Hello');


INSERT INTO ban(reason, adminId, userId, bandId) VALUES('reason X', 1, 1, 1);
INSERT INTO ban(reason, adminId) VALUES('reason X', 1);
INSERT INTO ban(reason, adminId, userId) VALUES('reason X', 1,1);
INSERT INTO ban(reason, adminId, bandId) VALUES('reason X', 1,1);

INSERT INTO message(contentId,senderId,receiverId) VALUES(1,1,2);
INSERT INTO notification_trigger(type,originUserFollower) VALUES('message',1);
INSERT INTO notification_trigger(type,originMessage) VALUES('message',1);

INSERT INTO content(text) VALUES('Hello2'); --mensagem 2

INSERT INTO message(contentId,senderId,bandId) VALUES(2,2,1); --tenta meter mensagem 2 mas sender id nao pertence a banda

INSERT INTO band_membership(bandId,userId,isOwner) VALUES(1,2,FALSE); --introdiz user 2 na banda

INSERT INTO message(contentId,senderId,bandId) VALUES(2,2,1); -- tenta meter mensagem 2 para banda e ja consegue

INSERT INTO message(contentId,senderId) VALUES(2,2); -- Tenta introduzir mesnagem sem destinatario

INSERT INTO message(contentId,senderId,receiverId, bandId) VALUES(2,2,1,1); -- Tenta introduzir mesnagem com destinatario banda e user

INSERT INTO message(contentId,senderId,receiverId) VALUES(2,2,1); -- introduz mensagem com destinatario user

--TESTE BAND POST --

INSERT INTO mb_user(username,password,name,bio,dateOfBirth,location,admin) 
    VALUES('user_test_3','pwd','user_test_3', 'bio_test','01/01/1980',1,TRUE);


INSERT INTO content(text) VALUES('Post1');
INSERT INTO post(contentId,posterId,bandId) VALUES(3,3,1); -- TENTA ADICIONAR MAS NAO DEIXA PORQUE NAO É MEMBRO DA BANDA
INSERT INTO post(contentId,posterId,bandId) VALUES(3,2,1); -- TENTA ADICIONAR E JA DEIXA PORQUE É MEMBRO DA BANDA

--TEST INSERT USER_FOLLOWER_NOTIFICATION_TRIGGER

INSERT INTO user_follower(followingUserId, followedUserId) VALUES(1,2);
SELECT type FROM notification_trigger;