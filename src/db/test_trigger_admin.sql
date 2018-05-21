-- INSERT INTO genre(name,creatingAdminId) VALUES('fado', 1);
-- INSERT INTO genre(name,creatingAdminId) VALUES('funk', 2);

-- INSERT INTO skill(name,creatingAdminId) VALUES('piano', 1);
-- INSERT INTO skill(name,creatingAdminId) VALUES('drums', 2);

-- INSERT INTO ban(reason,adminId,userId) VALUES('spam', 1, 2);
-- INSERT INTO ban(reason,adminId,bandId) VALUES('spam', 2, 1);

INSERT INTO mb_user(username,password,name,bio,dateOfBirth,location,admin) 
    VALUES('user_leo','pwd','Leo', 'bio_test','01/01/1980',1,TRUE);
INSERT INTO mb_user(username,password,name,bio,dateOfBirth,location,admin) 
    VALUES('user_pedro','pwd','Pedro', 'bio_test2','02/01/1980',2,FALSE);
INSERT INTO mb_user(username,password,name,bio,dateOfBirth,location,admin) 
    VALUES('user_danny','pwd','Danny', 'bio_test3','03/01/1980',3,FALSE);
INSERT INTO mb_user(username,password,name,bio,dateOfBirth,location,admin) 
    VALUES('user_conde','pwd','Conde', 'bio_test4','04/01/1980',4,FALSE);

INSERT INTO band(name) VALUES('100AuRa');
INSERT INTO band(name) VALUES('OffTime');

INSERT INTO band_membership(userId, bandId, isOwner)
    VALUES (1,1,TRUE);

INSERT INTO band_membership(userId, bandId, isOwner)
    VALUES (2,1,FALSE);

INSERT INTO band_membership(userId, bandId, isOwner)
    VALUES (2,2,TRUE);

INSERT INTO band_membership(userId, bandId, isOwner)
    VALUES (3,2,FALSE);
    

INSERT INTO user_follower(followingUserId, followedUserId)
    VALUES (1,2);

INSERT INTO band_follower(userId, bandId)
    VALUES (2,1);

INSERT INTO band_follower(userId, bandId)
    VALUES (1,2);

INSERT INTO content(text) VALUES ('Hello Leo');
INSERT INTO content(text) VALUES ('Bye 100AuRa');
INSERT INTO content(text) VALUES ('Concerto dia 3');
INSERT INTO content(text) VALUES ('Gosto de Pearl Jam');
INSERT INTO content(text) VALUES ('Nice Post Offtime');
INSERT INTO content(text) VALUES ('Belo post Leo');

INSERT INTO message(contentId,senderId,receiverId) VALUES(1,2,1);
INSERT INTO message(contentId,senderId,bandId) VALUES(2,1,1);

INSERT INTO post(contentId,posterId,bandId) VALUES(3,3,2);
INSERT INTO post(contentId,posterId) VALUES(4,1);

INSERT INTO comment(contentId,commenterId,postId) VALUES(5,1,1);
INSERT INTO comment(contentId,commenterId,postId) VALUES(6,1,2);

INSERT INTO band_application(userId, bandId) VALUES(1,2);
INSERT INTO band_application(userId, bandId) VALUES(4,2);
UPDATE band_application SET status='accepted' WHERE userId = 1 AND bandId = 2;
UPDATE band_application SET status='rejected' WHERE userId = 4 AND bandId = 2;


INSERT INTO band_invitation(bandId, userId) VALUES(1,3);
INSERT INTO band_invitation(bandId, userId) VALUES(1,4);
UPDATE band_invitation SET status='rejected' WHERE bandId = 1 AND userId = 3;
UPDATE band_invitation SET status='accepted' WHERE bandId = 1 AND userId = 4;


INSERT INTO warning(adminId,userId) VALUES(1, 3);
INSERT INTO warning(adminId,bandId) VALUES(1, 2);

SELECT notificationtriggerid, userid, text FROM user_notification;
SELECT * FROM band_membership;
