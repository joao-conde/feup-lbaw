\c lbaw1712;

DELETE FROM mb_user WHERE username = 'user_test_1';
DELETE FROM band WHERE name = 'Pearl Jam';

INSERT INTO mb_user(username,password,name,bio,dateOfBirth,location,admin) 
    VALUES('user_test_1','pwd','user_test_1', 'bio_test','01/01/1980',1,TRUE);

INSERT INTO band (name, location) VALUES('Pearl Jam',1);

INSERT INTO ban(reason, adminId, userId, bandId) VALUES('reason X', 1, 1, 1);
INSERT INTO ban(reason, adminId) VALUES('reason X', 1);
INSERT INTO ban(reason, adminId, userId) VALUES('reason X', 1,1);
INSERT INTO ban(reason, adminId, bandId) VALUES('reason X', 1,1);

INSERT INTO content(text) VALUES('Hello');
INSERT INTO message(contentId,senderId,receiverId) VALUES(1,1,1);
INSERT INTO notification_trigger(type,originUserFollower) VALUES('message',1);
INSERT INTO notification_trigger(type,originMessage) VALUES('message',1);