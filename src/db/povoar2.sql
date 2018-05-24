SET datestyle = dmy;

--Create some admin users directly in the site

DELETE FROM user_notification;
DELETE FROM notification_trigger;
DELETE FROM band_invitation;
DELETE FROM band_application;
DELETE FROM band_follower;
DELETE FROM band_rating;
DELETE FROM band_genre;
DELETE FROM warning;
DELETE FROM user_rating;
DELETE FROM user_skill;
DELETE FROM user_follower;
DELETE FROM ban;
DELETE FROM report;
DELETE FROM comment;
DELETE FROM post;
DELETE FROM message;
DELETE FROM content;
DELETE FROM band_membership;
DELETE FROM mb_user WHERE id > 4;
DELETE FROM band;
DELETE FROM genre;
DELETE FROM skill;
DELETE FROM city;
DELETE FROM country;

\i src/db/insertLocations.sql;

--Users

--Normal Users
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (5,'jpidgley4', 'Nkj7SeVu', 'Jaime Pidgley', 'Devolved optimal methodology', '12-11-1963', '31-10-2006', 1, 2, 5.0, false);
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (6,'tlawes5', 'HEwa4uN3FKsJ', 'Trent Lawes', 'Sharable executive initiative', '01-03-2001', null, 3, 1, 2.8, false);
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (7,'rcords6', '1l5eELOM', 'Remington Cords', 'Front-line bifurcated hierarchy', '07-09-1959', '04-11-2011', 5, 1, 4.7, false);
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (8,'mgarry7', 'ePtsr8qx', 'Mady Garry', 'Team-oriented eco-centric project', '14-09-1998', '26-03-1976', 3, 1, 4.6, false);
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (9,'rjunkison8', 'tReH9LAl', 'Roger Junkison', 'Extended well-modulated flexibility', '19-02-1968', null, 7, 2, 4.0, false);
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (10,'shanney9', 'XkO3LV', 'Shannah Hanney', 'Fully-configurable didactic interface', '23-12-1979', '31-07-1987', 5, 1, 2.7, false);
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (11,'jsirea', 'fOdaec', 'Jamie Sire', 'Triple-buffered non-volatile open architecture', '19-02-1955', null, 4, 1, 3.3, false);
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (12,'cretallackb', '1bprSGcXini', 'Colan Retallack', 'Fully-configurable incremental ability', '05-08-1951', null, 6, 2, 0.6, false);
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (13,'ebettridgec', 'tSnLdH', 'Edna Bettridge', 'Advanced reciprocal flexibility', '22-08-1985', null, 1, 2, 1.1, false);
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (14,'gvillad', 'nvQT5Y6', 'Gerald Villa', 'Distributed eco-centric success', '16-08-2011', null, 10, 1, 0.8, false);
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (15,'cmothersolee', 'SN1MCtM4Y', 'Cozmo Mothersole', 'Balanced didactic focus group', '29-06-1959', null, 10, 1, 2.0, false);
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (16,'adimondf', 'NXiZRp4Nynb', 'Ardelia Dimond', 'Switchable exuding conglomeration', '07-08-1989', null, 10, 2, 2.7, false);
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (17,'mgenge2d', 'TyzNFinkbmHT', 'Martelle Genge', 'Extended exuding paradigm', '12-07-1963', null, 3, 2, 0.4, false);
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (18,'ltaks2e', 'svWjUtwGWE', 'Lauraine Taks', 'Re-contextualized systemic success', '07-03-1971', null, 10, 1, 0.6, false);
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (19,'dmacanulty2f', 'kIVZ2RK7ZQn', 'Dode MacAnulty', 'User-centric uniform success', '25-02-1967', null, 10, 1, 1.9, false);
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (20,'wmayhow2g', 'yD8YE66pE', 'Wendall Mayhow', 'Reduced national artificial intelligence', '10-06-2004', null, 7, 2, 2.5, true);
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (21,'lhuggill2h', 'WimsKZk', 'Lancelot Huggill', 'Cross-platform object-oriented definition', '22-04-2001', null, 6, 2, 1.1, false);
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (22,'mchristin2i', 'mN2FdS', 'Montgomery Christin', 'Focused value-added support', '31-03-1977', null, 9, 2, 1.6, false);
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (23,'hjobin2j', 'He7tZsaoM3C', 'Horatius Jobin', 'Distributed explicit time-frame', '23-06-1985', null, 7, 2, 0.7, false);
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (24,'dgarretts2k', '7x0IyVbKP', 'Delora Garretts', 'Enterprise-wide coherent core', '20-08-2005', null, 4, 2, 3.3, true);
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (25,'jdurman2l', 'wThaOGyLf', 'Jo-ann Durman', 'Adaptive demand-driven budgetary management', '29-10-1987', null, 8, 1, 4.8, false);
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (26,'jgunthorp2m', 'd1xK5XcnvH', 'Johann Gunthorp', 'Exclusive optimizing attitude', '29-04-1979', null, 10, 1, 4.8, false);
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (27,'tbierman2n', 'iyoShURqa', 'Tiler Bierman', 'Visionary analyzing architecture', '11-04-2013', null, 1, 2, 4.7, true);
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (28,'mfilipychev2o', 'oy97lVacb88', 'Moise Filipychev', 'Reverse-engineered contextually-based pricing structure', '01-03-1982', null, 1, 2, 0.7, true);
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (29,'omenat2p', 'vLAM3NViG', 'Obed Menat', 'Grass-roots cohesive leverage', '05-09-1986', null, 6, 2, 4.9, false);
insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (30,'ckubicka2q', 'zXizewgg', 'Caryl Kubicka', 'Assimilated didactic alliance', '21-09-1992', null, 2, 2, 1.4, false);

ALTER SEQUENCE mb_user_id_seq RESTART WITH 31;

insert into mb_user (username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values ('trintaeum', 'zXizewgg', 'José Figueiras', 'Assimilated didactic alliance', '21-09-1992', null, 2, 2, 1.4, false);


--Bands


insert into band (id,name, creationDate, ceaseDate, location, isActive,bio) values (1,'B. Riley Financial, Inc.', '09-04-1960', null, 1, true,'Streamlined incremental band');
insert into band (id,name, creationDate, ceaseDate, location, isActive,bio) values (2,'Selecta Biosciences, Inc.', '06-08-1962', '29-03-2006', 2, true,'Profound needs-based rock solutions');
insert into band (id,name, creationDate, ceaseDate, location, isActive,bio) values (3,'iShares MSCI All Country Asia ex Japan Index Fund', '01-11-1997', null, 2, true,'Organic indie open band');
insert into band (id,name, creationDate, ceaseDate, location, isActive,bio) values (4,'MRC Global Inc.', '20-12-1973', null, 2, true,'Reactive transitional secured band');
insert into band (id,name, creationDate, ceaseDate, location, isActive,bio) values (5,'Thermon Group Holdings, Inc.', '16-08-1983', '16-11-1987', 1, true,'Re-contextualized synth pop synergy');
insert into band (id,name, creationDate, ceaseDate, location, isActive,bio) values (6,'Blackrock Corporate High Yield Fund, Inc.', '02-10-1976', null, 1, true,'Polarised stable band');

ALTER SEQUENCE band_id_seq RESTART WITH 7;

--Bands membership

insert into band_membership (bandId, userId, isOwner, initialDate, ceaseDate) values (1, 5, true, '25/12/2017', null);
insert into band_membership (bandId, userId, isOwner, initialDate, ceaseDate) values (1, 6, false, '25/12/2017', null);
insert into band_membership (bandId, userId, isOwner, initialDate, ceaseDate) values (1, 7, false, '25/12/2017', null);

insert into band_membership (bandId, userId, isOwner, initialDate, ceaseDate) values (2, 5, false, '25/12/2017', null);
insert into band_membership (bandId, userId, isOwner, initialDate, ceaseDate) values (2, 9, false, '21/2/2017', null);
insert into band_membership (bandId, userId, isOwner, initialDate, ceaseDate) values (2, 10, true, '28/12/2017', null);

insert into band_membership (bandId, userId, isOwner, initialDate, ceaseDate) values (3, 10, false, '25/12/2017', null);
insert into band_membership (bandId, userId, isOwner, initialDate, ceaseDate) values (3, 11, false, '25/12/2017', '01/01/2018');
insert into band_membership (bandId, userId, isOwner, initialDate, ceaseDate) values (3, 12, true, '25/12/2017', null);

insert into band_membership (bandId, userId, isOwner, initialDate, ceaseDate) values (4, 14, false, '1/12/2001', null);
insert into band_membership (bandId, userId, isOwner, initialDate, ceaseDate) values (4, 15, false, '25/12/2017', null);
insert into band_membership (bandId, userId, isOwner, initialDate, ceaseDate) values (4, 10, true, '25/12/2017', null);
insert into band_membership (bandId, userId, isOwner, initialDate, ceaseDate) values (4, 9, false, '25/12/2017', null);
insert into band_membership (bandId, userId, isOwner, initialDate, ceaseDate) values (4, 12, false, '25/12/2017', '01/01/2018');
insert into band_membership (bandId, userId, isOwner, initialDate, ceaseDate) values (4, 11, true, '25/12/2017', null);

insert into band_membership (bandId, userId, isOwner, initialDate, ceaseDate) values (5, 9, true, '1/12/2001', null);
insert into band_membership (bandId, userId, isOwner, initialDate, ceaseDate) values (5, 15, false, '25/12/2017', null);

insert into band_membership (bandId, userId, isOwner, initialDate, ceaseDate) values (6, 10, true, '1/12/2009', null);


--Posts

insert into content(id,creatorId,text) values(1,5,'Lay her down as priest does, should the Lord be accountin. Every boat is leaking in this town. Holy rollers sitting with their backs to the middle. Born on third, thinks he got a triple. Its all right. Get this off my plate. Where they have more. And I listen for the voice inside my head. But I found my place. We all could use a sedative right now. Stealing light from whats beneath. Still they take more. Find a lighthouse in the dark stormy weather.');
insert into content(id,creatorId,text) values(2,6,'Ive been tripping off constellations and stars.. Im feeling burnt clean, under your eyes, putting me out. A little candle like you. Facing forward. With another man, oh man.. You said youd always be mine. Ooh ooh, baby dont hurt no more. Where does it go?. Been keeping you in my heart.. You just looked up at the stars. Youre not mine to save. Ooh ooh, ooh baby dont hurt no more. But if you let me be there, again.');
insert into content(id,creatorId,text) values(3,5,'And so I whispered into your ear,. Where does it go?. Or the love of the chase?. Of watching them fade. Goes so quickly.');
insert into content(id,creatorId,text) values(4,7,'But deciding your innocence. Dont deserve the hurt youre going through. I take my licks -- like a man.');
insert into content(id,creatorId,text) values(5,8,'and Im watching from the door.');
insert into content(id,creatorId,text) values(6,10,'How many secrets can you keep?. Whyd you only call me when youre high?. (Do I wanna know?).');
insert into content(id,creatorId,text) values(7,11,'Was sorta hoping that youd stay. For saying things that you cant say tomorrow day. (Baby, we both know).');
insert into content(id,creatorId,text) values(8,12,'That sticks around like summat in your teeth?. (Sad to see you go). it took you a lifetime to destroy. And I play it on repeat. Cause theres this tune I found.');
insert into content(id,creatorId,text) values(9,11,'Do you ever get the fear that you cant shift the type. The mirrors image, it tells me its home time.');
insert into content(id,creatorId,text) values(10,16,'Hell rekindle all of those dreams. If this feeling flows both ways?');
insert into content(id,creatorId,text) values(11,12,'Ever thought of calling when youve had a few?. Left you multiple missed calls and to my message, you reply.');
insert into content(id,creatorId,text) values(12,7,'Barnett broke through back in 2015 with the critically-acclaimed LP ’Sometimes I Sit And Think And Sometimes I Just Sit’.');
insert into content(id,creatorId,text) values(13,9,'A host of independent music festivals have committed to cutting down on plastic waste.The Association of Independent Festivals (AIF) have teamed up with over 60 festivals for its new ‘Drastic On Plastic’ campaign.');
insert into content(id,creatorId,text) values(14,10,'Last month, the French star announced that she’ll make her live return in the US this October – with shows scheduled for Los Angeles and New York. In November, two gigs will take place at London’s Eventim Apollo.');
insert into content(id,creatorId,text) values(15,11,'Check them out below Green Day frontman Billie Joe Armstrong’s new band The Longshot have surprise released their debut album along with a music video for the title track, ‘Love Is For Losers’. Check them out below. While Green Day are currently taking some down time off the back of 2016’s acclaimed ‘Revolution Radio‘ and last year’s greatest hits compilation ‘God’s Favourite Band‘, Armstrong has gone back to his DIY punk roots for his new band. After teasing fans before dropping the first three tracks from the band before performing their first ever live show together at the weekend,  now The Longshot’s full length LP is here. Read more at http://www.nme.com/news/music/billie-joe-armstrongs-new-band-longshot-release-video-full-album-love-losers-2298033#SdTfcoBtb1ppcj4d.99');
insert into content(id,creatorId,text) values(16,6,'But if you let me be there, again.');



insert into post(id,private,contentId,bandId) values(1,false,1,NULL);
insert into post(id,private,contentId,bandId) values(2,true,2,1);
insert into post(id,private,contentId,bandId) values(3,false,3,1);
insert into post(id,private,contentId,bandId) values(4,false,4,NULL);
insert into post(id,private,contentId,bandId) values(5,false,5,NULL);
insert into post(id,private,contentId,bandId) values(6,false,6,NULL);
insert into post(id,private,contentId,bandId) values(7,false,7,NULL);
insert into post(id,private,contentId,bandId) values(8,false,8,NULL);
insert into post(id,private,contentId,bandId) values(9,false,9,4);
insert into post(id,private,contentId,bandId) values(10,false,10,NULL);
insert into post(id,private,contentId,bandId) values(11,false,11,NULL);
insert into post(id,private,contentId,bandId) values(12,false,12,NULL);
insert into post(id,private,contentId,bandId) values(13,false,13,NULL);
insert into post(id,private,contentId,bandId) values(14,false,14,NULL);
insert into post(id,private,contentId,bandId) values(15,false,15,NULL);
insert into post(id,private,contentId,bandId) values(16,false,16,NULL);



ALTER SEQUENCE post_id_seq RESTART WITH 17;

--Comments


insert into content(id, creatorId,text) values(17,8,'Nice Post');
insert into content(id, creatorId,text) values(18,10,'Indeed');
insert into content(id, creatorId,text) values(19,16,'Where is this band from?');
insert into content(id, creatorId,text) values(20,12,'They are from Portugal!');
insert into content(id, creatorId,text) values(21,7,'I like!');
insert into content(id, creatorId,text) values(22,10,'Me too');
insert into content(id, creatorId,text) values(23,7,'Well done!');
insert into content(id, creatorId,text) values(24,11,'Very nice post!');
insert into content(id, creatorId,text) values(25,8,'Don´t like this!');
insert into content(id, creatorId,text) values(26,10,'I like it');
insert into content(id, creatorId,text) values(27,9,'What is this?');
insert into content(id, creatorId,text) values(28,14,'What a nice surprise!');

insert into comment(id,contentId,postId) values(1,17,1);
insert into comment(id,contentId,postId) values(2,18,1);
insert into comment(id,contentId,postId) values(3,19,2);
insert into comment(id,contentId,postId) values(4,20,2);
insert into comment(id,contentId,postId) values(5,21,3);
insert into comment(id,contentId,postId) values(6,22,3);
insert into comment(id,contentId,postId) values(7,23,4);
insert into comment(id,contentId,postId) values(8,24,4);
insert into comment(id,contentId,postId) values(9,25,4);
insert into comment(id,contentId,postId) values(10,26,5);
insert into comment(id,contentId,postId) values(11,27,13);
insert into comment(id,contentId,postId) values(12,28,13);

ALTER SEQUENCE comment_id_seq RESTART WITH 13;


--Messages


insert into content(id,creatorId,text) values(29,6,'Hello');
insert into content(id,creatorId,text) values(30,7,'Hello');
insert into content(id,creatorId,text) values(31,5,'I need you to play tonight!');
insert into content(id,creatorId,text) values(32,9,'Yes');
insert into content(id,creatorId,text) values(33,10,'Tonight I can´t');
insert into content(id,creatorId,text) values(34,10,'Hello!');
insert into content(id,creatorId,text) values(35,12,'Let´s meet on Wednesday');
insert into content(id,creatorId,text) values(36,13,'Ok!');
insert into content(id,creatorId,text) values(37,11,'Not me!');
insert into content(id,creatorId,text) values(38,7,'Ok my friend');
insert into content(id,creatorId,text) values(39,10,'This site is awesome');
insert into content(id,creatorId,text) values(40,12,'Can you share the song?');

insert into message(id,contentId,receiverId,bandId) values(1,29,7,NULL);
insert into message(id,contentId,receiverId,bandId) values(2,30,10,NULL);
insert into message(id,contentId,receiverId,bandId) values(3,31,NULL,2);
insert into message(id,contentId,receiverId,bandId) values(4,32,NULL,2);
insert into message(id,contentId,receiverId,bandId) values(5,33,NULL,2);
insert into message(id,contentId,receiverId,bandId) values(6,34,12,NULL);
insert into message(id,contentId,receiverId,bandId) values(7,35,10,NULL);
insert into message(id,contentId,receiverId,bandId) values(8,36,11,NULL);
insert into message(id,contentId,receiverId,bandId) values(9,37,13,NULL);
insert into message(id,contentId,receiverId,bandId) values(10,38,10,NULL);
insert into message(id,contentId,receiverId,bandId) values(11,39,7,NULL);
insert into message(id,contentId,receiverId,bandId) values(12,40,14,NULL);

ALTER SEQUENCE message_id_seq RESTART WITH 13;
ALTER SEQUENCE content_id_seq RESTART WITH 41;

--DO NOT FORGET TO CREATE AT LEAST ONE ADMIN USER WITH ID 1

--Reports

insert into report(id,text,reportType, reportedContentId, reportedUserId, reportedBandId, reporterUserId)
            values(1,'Explicit content','content_report',4,NULL,NULL,16);
insert into report(id,text,reportType, reportedContentId, reportedUserId, reportedBandId, reporterUserId)
            values(2,'This user insulted me','user_report',NULL,7,NULL,13);
insert into report(id,text,reportType, reportedContentId, reportedUserId, reportedBandId, reporterUserId)
            values(3,'This user insulted me','user_report',NULL,7,NULL,10);
insert into report(id,text,reportType, reportedContentId, reportedUserId, reportedBandId, reporterUserId)
            values(4,'This user insulted me','user_report',NULL,7,NULL,6);
insert into report(id,text,reportType, reportedContentId, reportedUserId, reportedBandId, reporterUserId)
            values(5,'This user insulted me','user_report',NULL,7,NULL,11);
insert into report(id,text,reportType, reportedContentId, reportedUserId, reportedBandId, reporterUserId)
            values(6,'This content is abusive','content_report',21,NULL,NULL,9);
insert into report(id,text,reportType, reportedContentId, reportedUserId, reportedBandId, reporterUserId)
            values(7,'This message is very bad','content_report',33,NULL,NULL,12);
insert into report(id,text,reportType, reportedContentId, reportedUserId, reportedBandId, reporterUserId)
            values(8,'This band is posting about yoga','band_report',NULL,NULL,2,16);
insert into report(id,text,reportType, reportedContentId, reportedUserId, reportedBandId, reporterUserId)
            values(9,'This band is posting about cars','band_report',NULL,NULL,2,13);
insert into report(id,text,reportType, reportedContentId, reportedUserId, reportedBandId, reporterUserId)
            values(10,'This band is posting about IT','band_report',NULL,NULL,6,13);
insert into report(id,text,reportType, reportedContentId, reportedUserId, reportedBandId, reporterUserId)
            values(11,'This user insulted me','user_report',NULL,6,NULL,11);
insert into report(id,text,reportType, reportedContentId, reportedUserId, reportedBandId, reporterUserId)
            values(12,'This post has explicit content','content_report',9,NULL,NULL,12);
insert into report(id,text,reportType, reportedContentId, reportedUserId, reportedBandId, reporterUserId)
            values(13,'This message is very bad','content_report',32,NULL,NULL,12);
insert into report(id,text,reportType, reportedContentId, reportedUserId, reportedBandId, reporterUserId)
            values(14,'This post is very bad','content_report',3,NULL,NULL,26);
insert into report(id,text,reportType, reportedContentId, reportedUserId, reportedBandId, reporterUserId)
            values(15,'This post is very bad','content_report',3,NULL,NULL,22);
insert into report(id,text,reportType, reportedContentId, reportedUserId, reportedBandId, reporterUserId)
            values(16,'This post is very bad','content_report',1,NULL,NULL,23);
insert into report(id,text,reportType, reportedContentId, reportedUserId, reportedBandId, reporterUserId)
            values(17,'This band is very bad','band_report',NULL,NULL,4,23);

ALTER SEQUENCE report_id_seq RESTART WITH 14;


--Warnings

insert into warning(id,adminId,userId,bandId,contentId) values(1,28,7,NULL,NULL);
insert into warning(id,adminId,userId,bandId,contentId) values(2,28,NULL,2,NULL);
insert into warning(id,adminId,userId,bandId,contentId) values(3,28,7,NULL,4);
insert into warning(id,adminId,userId,bandId,contentId) values(4,28,10,NULL,33);
insert into warning(id,adminId,userId,bandId,contentId) values(5,28,NULL,4,9);
insert into warning(id,adminId,userId,bandId,contentId) values(6,28,NULL,2,32);

ALTER SEQUENCE warning_id_seq RESTART WITH 7;


--Bans

insert into ban(id,reason,ceaseDate,adminId,userId,bandId,banDate) values(1,'Bad behaviour',NULL,28,7,NULL,'17/01/2018');
insert into ban(id,reason,ceaseDate,adminId,userId,bandId,banDate) values(2,'Bad behaviour',NULL,28,NULL,5,'21/03/2018');
insert into ban(id,reason,ceaseDate,adminId,userId,bandId,banDate) values(3,'Bad behaviour','21/4/2018',28,NULL,4,'01/01/2018');

ALTER SEQUENCE ban_id_seq RESTART WITH 4;

--Genres

insert into genre (id,name, creatingAdminId, isActive) values (1,'Alternative',28,true);
insert into genre (id,name, creatingAdminId, isActive) values (2,'Big Band',28,true);
insert into genre (id,name, creatingAdminId, isActive) values (3,'Country',28,true);
insert into genre (id,name, creatingAdminId, isActive) values (4,'Electronic',28,true);
insert into genre (id,name, creatingAdminId, isActive) values (5,'Jazz',28,true);
insert into genre (id,name, creatingAdminId, isActive) values (6,'Opera',28,true);
insert into genre (id,name, creatingAdminId, isActive) values (7,'Classical',28,true);
insert into genre (id,name, creatingAdminId, isActive) values (8,'Hip hop',28,true);
insert into genre (id,name, creatingAdminId, isActive) values (9,'Rock',28,true);
insert into genre (id,name, creatingAdminId, isActive) values (10,'Blues',28,true);
insert into genre (id,name, creatingAdminId, isActive) values (11,'Folk',28,true);
insert into genre (id,name, creatingAdminId, isActive) values (12,'Pop',28,true);

ALTER SEQUENCE genre_id_seq RESTART WITH 13;

--Skills

insert into skill (id,name, creatingAdminId, isActive) values (1,'Cajon',28,true);
insert into skill (id,name, creatingAdminId, isActive) values (2,'Handpan',28,true);
insert into skill (id,name, creatingAdminId, isActive) values (3,'Triangle',28,true);
insert into skill (id,name, creatingAdminId, isActive) values (4,'Xylophone',28,true);
insert into skill (id,name, creatingAdminId, isActive) values (5,'Drums',28,true);
insert into skill (id,name, creatingAdminId, isActive) values (6,'Accordion',28,true);
insert into skill (id,name, creatingAdminId, isActive) values (7,'Bagpipe',28,true);
insert into skill (id,name, creatingAdminId, isActive) values (8,'Clarinet',28,true);
insert into skill (id,name, creatingAdminId, isActive) values (9,'Flute',28,true);
insert into skill (id,name, creatingAdminId, isActive) values (10,'Trumpet',28,true);
insert into skill (id,name, creatingAdminId, isActive) values (11,'Organ',28,true);
insert into skill (id,name, creatingAdminId, isActive) values (12,'Piano',28,true);
insert into skill (id,name, creatingAdminId, isActive) values (13,'Keyboard',28,true);
insert into skill (id,name, creatingAdminId, isActive) values (14,'Saxophone',28,true);
insert into skill (id,name, creatingAdminId, isActive) values (15,'Trombone',28,true);
insert into skill (id,name, creatingAdminId, isActive) values (16,'Tuba',28,true);
insert into skill (id,name, creatingAdminId, isActive) values (17,'Harp',28,true);
insert into skill (id,name, creatingAdminId, isActive) values (18,'Banjo',28,true);
insert into skill (id,name, creatingAdminId, isActive) values (19,'Bass Guitar',28,true);
insert into skill (id,name, creatingAdminId, isActive) values (20,'Electric Guitar',28,true);
insert into skill (id,name, creatingAdminId, isActive) values (21,'Acoustic Guitar',28,true);
insert into skill (id,name, creatingAdminId, isActive) values (22,'Violin',28,true);
insert into skill (id,name, creatingAdminId, isActive) values (23,'Ukulele',28,true);
insert into skill (id,name, creatingAdminId, isActive) values (24,'Cello',28,true);
insert into skill (id,name, creatingAdminId, isActive) values (25,'Synthesizer',28,true);
insert into skill (id,name, creatingAdminId, isActive) values (26,'Keytar',28,true);

ALTER SEQUENCE skill_id_seq RESTART WITH 27;

--User skills

insert into user_skill(userId,skillId,level,isActive) values(5,1,3,true);
insert into user_skill(userId,skillId,level,isActive) values(5,2,5,true);
insert into user_skill(userId,skillId,level,isActive) values(6,20,5,true);
insert into user_skill(userId,skillId,level,isActive) values(6,21,5,true);
insert into user_skill(userId,skillId,level,isActive) values(7,24,3,true);
insert into user_skill(userId,skillId,level,isActive) values(8,12,4,true);
insert into user_skill(userId,skillId,level,isActive) values(9,22,2,true);
insert into user_skill(userId,skillId,level,isActive) values(10,5,5,true);
insert into user_skill(userId,skillId,level,isActive) values(10,4,4,true);
insert into user_skill(userId,skillId,level,isActive) values(11,1,2,true);
insert into user_skill(userId,skillId,level,isActive) values(12,10,2,true);
insert into user_skill(userId,skillId,level,isActive) values(13,26,4,true);
insert into user_skill(userId,skillId,level,isActive) values(13,21,2,false);
insert into user_skill(userId,skillId,level,isActive) values(13,20,1,true);
insert into user_skill(userId,skillId,level,isActive) values(13,24,4,true);
insert into user_skill(userId,skillId,level,isActive) values(14,14,4,true);
insert into user_skill(userId,skillId,level,isActive) values(14,12,4,true);
insert into user_skill(userId,skillId,level,isActive) values(14,1,5,true);
insert into user_skill(userId,skillId,level,isActive) values(14,2,5,true);
insert into user_skill(userId,skillId,level,isActive) values(14,6,2,false);
insert into user_skill(userId,skillId,level,isActive) values(15,5,5,true);
insert into user_skill(userId,skillId,level,isActive) values(15,2,3,true);
insert into user_skill(userId,skillId,level,isActive) values(16,21,2,true);
insert into user_skill(userId,skillId,level,isActive) values(17,22,4,true);
insert into user_skill(userId,skillId,level,isActive) values(18,3,4,true);
insert into user_skill(userId,skillId,level,isActive) values(19,13,5,true);
insert into user_skill(userId,skillId,level,isActive) values(20,12,5,true);
insert into user_skill(userId,skillId,level,isActive) values(21,5,5,true);
insert into user_skill(userId,skillId,level,isActive) values(22,5,4,true);
insert into user_skill(userId,skillId,level,isActive) values(23,12,4,true);
insert into user_skill(userId,skillId,level,isActive) values(24,21,4,true);
insert into user_skill(userId,skillId,level,isActive) values(25,21,2,true);
insert into user_skill(userId,skillId,level,isActive) values(26,12,3,true);
insert into user_skill(userId,skillId,level,isActive) values(27,5,3,true);
insert into user_skill(userId,skillId,level,isActive) values(28,12,4,true);
insert into user_skill(userId,skillId,level,isActive) values(29,5,3,true);
insert into user_skill(userId,skillId,level,isActive) values(30,21,2,true);

--User followers

insert into user_follower(id,followingUserId,followedUserId,isActive) values(1,5,6,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(2,6,5,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(3,7,8,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(4,8,7,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(5,8,6,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(6,10,15,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(7,12,11,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(8,16,12,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(9,14,11,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(10,9,5,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(11,10,16,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(12,16,5,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(13,16,6,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(14,15,9,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(15,15,8,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(16,12,15,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(17,12,13,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(18,14,7,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(19,7,9,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(20,5,12,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(21,16,11,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(22,12,16,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(23,14,13,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(24,12,7,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(25,7,10,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(26,10,8,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(27,8,16,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(28,9,6,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(29,7,16,true);
insert into user_follower(id,followingUserId,followedUserId,isActive) values(30,5,16,true);

ALTER SEQUENCE user_follower_id_seq RESTART WITH 31;


--User ratings

insert into user_rating(ratingUserid,ratedUserId,rate) values(5,6,5);
insert into user_rating(ratingUserid,ratedUserId,rate) values(6,5,5);
insert into user_rating(ratingUserid,ratedUserId,rate) values(10,12,4);
insert into user_rating(ratingUserid,ratedUserId,rate) values(16,11,5);
insert into user_rating(ratingUserid,ratedUserId,rate) values(16,12,4);
insert into user_rating(ratingUserid,ratedUserId,rate) values(11,6,3);
insert into user_rating(ratingUserid,ratedUserId,rate) values(12,8,4);
insert into user_rating(ratingUserid,ratedUserId,rate) values(7,6,5);
insert into user_rating(ratingUserid,ratedUserId,rate) values(7,10,5);
insert into user_rating(ratingUserid,ratedUserId,rate) values(8,11,3);
insert into user_rating(ratingUserid,ratedUserId,rate) values(12,15,5);
insert into user_rating(ratingUserid,ratedUserId,rate) values(12,13,5);
insert into user_rating(ratingUserid,ratedUserId,rate) values(14,12,4);
insert into user_rating(ratingUserid,ratedUserId,rate) values(15,11,2);
insert into user_rating(ratingUserid,ratedUserId,rate) values(16,9,1);
insert into user_rating(ratingUserid,ratedUserId,rate) values(14,8,3);
insert into user_rating(ratingUserid,ratedUserId,rate) values(15,12,1);
insert into user_rating(ratingUserid,ratedUserId,rate) values(16,7,3);
insert into user_rating(ratingUserid,ratedUserId,rate) values(12,9,4);
insert into user_rating(ratingUserid,ratedUserId,rate) values(9,8,3);
insert into user_rating(ratingUserid,ratedUserId,rate) values(10,9,4);
insert into user_rating(ratingUserid,ratedUserId,rate) values(9,11,4);
insert into user_rating(ratingUserid,ratedUserId,rate) values(10,16,4);
insert into user_rating(ratingUserid,ratedUserId,rate) values(6,11,5);
insert into user_rating(ratingUserid,ratedUserId,rate) values(5,16,2);
insert into user_rating(ratingUserid,ratedUserId,rate) values(15,7,3);


--Band genres

insert into band_genre(bandId,genreId,isActive) values(1,1,true); 
insert into band_genre(bandId,genreId,isActive) values(1,2,true); 
insert into band_genre(bandId,genreId,isActive) values(2,1,true); 
insert into band_genre(bandId,genreId,isActive) values(2,7,true); 
insert into band_genre(bandId,genreId,isActive) values(3,10,true); 
insert into band_genre(bandId,genreId,isActive) values(4,10,false); 
insert into band_genre(bandId,genreId,isActive) values(4,11,true); 
insert into band_genre(bandId,genreId,isActive) values(5,2,true); 
insert into band_genre(bandId,genreId,isActive) values(5,9,true); 
insert into band_genre(bandId,genreId,isActive) values(6,7,true); 
insert into band_genre(bandId,genreId,isActive) values(6,8,true); 
insert into band_genre(bandId,genreId,isActive) values(6,9,true); 

--Band ratings

insert into band_rating(ratingUserId,ratedBandId,rate) values(6,2,4);
insert into band_rating(ratingUserId,ratedBandId,rate) values(6,3,4);
insert into band_rating(ratingUserId,ratedBandId,rate) values(12,1,5);
insert into band_rating(ratingUserId,ratedBandId,rate) values(12,2,4);
insert into band_rating(ratingUserId,ratedBandId,rate) values(16,1,5);
insert into band_rating(ratingUserId,ratedBandId,rate) values(10,3,4);
insert into band_rating(ratingUserId,ratedBandId,rate) values(9,4,3);
insert into band_rating(ratingUserId,ratedBandId,rate) values(15,1,5);
insert into band_rating(ratingUserId,ratedBandId,rate) values(6,6,3);
insert into band_rating(ratingUserId,ratedBandId,rate) values(7,6,5);
insert into band_rating(ratingUserId,ratedBandId,rate) values(8,1,2);
insert into band_rating(ratingUserId,ratedBandId,rate) values(14,2,5);
insert into band_rating(ratingUserId,ratedBandId,rate) values(13,1,4);
insert into band_rating(ratingUserId,ratedBandId,rate) values(11,1,5);

--Band followers

insert into band_follower(id,userId,bandId,isActive) values(1,6,6,true);
insert into band_follower(id,userId,bandId,isActive) values(2,6,4,true);
insert into band_follower(id,userId,bandId,isActive) values(3,7,6,true);
insert into band_follower(id,userId,bandId,isActive) values(4,14,1,true);
insert into band_follower(id,userId,bandId,isActive) values(5,12,6,true);
insert into band_follower(id,userId,bandId,isActive) values(6,11,1,true);
insert into band_follower(id,userId,bandId,isActive) values(7,7,5,true);
insert into band_follower(id,userId,bandId,isActive) values(8,9,3,true);
insert into band_follower(id,userId,bandId,isActive) values(9,15,1,true);
insert into band_follower(id,userId,bandId,isActive) values(10,16,1,true);
insert into band_follower(id,userId,bandId,isActive) values(11,16,2,true);
insert into band_follower(id,userId,bandId,isActive) values(12,16,3,true);
insert into band_follower(id,userId,bandId,isActive) values(13,16,6,true);
insert into band_follower(id,userId,bandId,isActive) values(14,12,1,true);

ALTER SEQUENCE band_follower_id_seq RESTART WITH 14;


--Band applications

insert into band_application(id,userId,bandId,date,lastStatusDate,status) values(1,16,1,now(),now(),'pending');
insert into band_application(id,userId,bandId,date,lastStatusDate,status) values(2,16,2,'12/1/2018',now(),'rejected');
insert into band_application(id,userId,bandId,date,lastStatusDate,status) values(3,16,3,'12/2/2018',now(),'accepted');
insert into band_application(id,userId,bandId,date,lastStatusDate,status) values(4,17,1,'13/12/2017',now(),'rejected');
insert into band_application(id,userId,bandId,date,lastStatusDate,status) values(5,17,3,'13/12/2017',now(),'accepted');
insert into band_application(id,userId,bandId,date,lastStatusDate,status) values(6,18,2,'13/12/2017',now(),'rejected');
insert into band_application(id,userId,bandId,date,lastStatusDate,status) values(7,18,5,'13/12/2017',now(),'accepted');
insert into band_application(id,userId,bandId,date,lastStatusDate,status) values(8,19,6,'13/12/2017',now(),'rejected');
insert into band_application(id,userId,bandId,date,lastStatusDate,status) values(9,20,4,'13/12/2017',now(),'accepted');
insert into band_application(id,userId,bandId,date,lastStatusDate,status) values(10,20,3,now(),now(),'pending');

ALTER SEQUENCE band_application_id_seq RESTART WITH 11;

--Band invitations

insert into band_invitation(id,userId,bandId,date,lastStatusDate,status) values(1,22,1,now(),now(),'pending');
insert into band_invitation(id,userId,bandId,date,lastStatusDate,status) values(2,23,2,'12/1/2018',now(),'rejected');
insert into band_invitation(id,userId,bandId,date,lastStatusDate,status) values(3,24,3,'12/2/2018',now(),'accepted');
insert into band_invitation(id,userId,bandId,date,lastStatusDate,status) values(4,24,1,'13/12/2017',now(),'rejected');
insert into band_invitation(id,userId,bandId,date,lastStatusDate,status) values(5,25,3,'13/12/2017',now(),'accepted');
insert into band_invitation(id,userId,bandId,date,lastStatusDate,status) values(6,25,2,'13/12/2017',now(),'rejected');
insert into band_invitation(id,userId,bandId,date,lastStatusDate,status) values(7,26,5,'13/12/2017',now(),'accepted');
insert into band_invitation(id,userId,bandId,date,lastStatusDate,status) values(8,27,6,'13/12/2017',now(),'rejected');
insert into band_invitation(id,userId,bandId,date,lastStatusDate,status) values(9,29,4,'13/12/2017',now(),'accepted');
insert into band_invitation(id,userId,bandId,date,lastStatusDate,status) values(10,30,3,now(),now(),'pending');

ALTER SEQUENCE band_invitation_id_seq RESTART WITH 11;




-- --Testes do Conde

-- insert into mb_user (id, username, password, name, bio, dateOfBirth, deactivationDate, warns, location, rating, admin) values (32,'jotaque', '123456', 'Random name', 'Devolved optimal methodology', '12-11-1963', '31-10-2006', 1, 2, 5.0, false);

-- insert into content(id,creatorId,text) values(100,32,'Test post1');
-- insert into content(id,creatorId,text) values(101,32,'Test post2');
-- insert into content(id,creatorId,text) values(102,32,'Test post3');

-- insert into post(id,private,contentId,bandId) values(500,false,100,NULL);
-- insert into post(id,private,contentId,bandId) values(501,false,101,NULL);
-- insert into post(id,private,contentId,bandId) values(502,false,102,NULL);



-- more posts


insert into content(id,creatorId,text) values(41,6,'Shadows jumpin all over the walls. They wont follow me. If the neon Bible is right. Poured them out on into the world. All the birds in the boat were singing, "Man this is it". Dont have any dreams dont have any plans. Nothing lasts forever. Hypocrite reader, my double, my brother. When Lenin was little. All the sailors in heaven are singing up and shit.');
insert into post(id,private,contentId,bandId) values(17,true,41,1);

insert into content(id,creatorId,text) values(42,6,'The suburban kids are for real. Now you got to help me find. I know Ill burn. So the story of my life is a lie and my fortune will never turn. Candles burning in the night. Fast rolls on the wheels to the future so bright. I stand on the edge of the stair. The raiders of the ark. Its time to save them, to heal them. So why cant you hear me?. Passion is useless and Im not ready to play ball. The gospels in the air. Since the dawn of the days. Came along on a rainy day. Strangers in our eyes');
insert into post(id,private,contentId,bandId) values(18,true,42,1);

insert into content(id,creatorId,text) values(43,6,'Theres much we can do. The world is waiting for something. So I sing this suburban song. Who can tell bout the afterlife?. And the kids on the block never gonna be the same, enemies but friends. I know its a pity; the lack of desire now. Its not a penny from the blood red sky. (1409607566242). The wolves there at Wall Street are in for the kill. We look upon the man of twilight. They walk in shaped of God. Stay out; I will beware. Now and forever. Forever damned to holy ground. Behind the walls its black, but evil shines');
insert into post(id,private,contentId,bandId) values(19,true,43,1);

insert into content(id,creatorId,text) values(44,6,'Ooh, babe. Pass the tequila, Manuel. Dont leave me now. Gitta have a real need. And when youre on the street. (1409607566242). Dont say its the end of the road. Ooh, babe. Youve got to be crazy. (1409607566242). "Young Lust". I need you, babe. (1409607566242). Youve got to be able. Gotta sleep on your toes');
insert into post(id,private,contentId,bandId) values(20,true,44,1);

insert into content(id,creatorId,text) values(45,6,'Nowhere to run, your mind is reeling.. THE BEAST ARISES. to paint the pictures you desire.. Kickin your can all over the place. It seems a place in which to hide, to plan his wicked scene,. We will we will rock you. There you lie so still and wait, tonight she may return.. as you fade into the black, her face appears.. So safe inside your darkened room, you count the minutes.. Out from a blood red sky, m searching out the scene. to paint the pictures you desire.. ');
insert into post(id,private,contentId,bandId) values(21,true,45,1);

insert into content(id,creatorId,text) values(46,6,'and dream of all the things you did today.. You got mud on yo face. et fasse qu en un moment tu te consumes!". Im one bad dude, lockjaw my name, ill blow you away, i dont play games.. Locked in ill take you down, before you begin to run.. Fightin in the street gonna be a big man some day. You find your mind begin to boil, then blown to smithereens,. jusquà ce que tu viennes à moi. Your senses numb, losing all your feeling.. Chorus. A bounty hunter from a distant galaxy,. Are you saving up the hours, for when she comes to you,. Turn out the lights and go to sleep,. but still youre trapped inside this dream.. She is the keeper of your dreams, she watches over you');
insert into post(id,private,contentId,bandId) values(22,true,46,1);

insert into content(id,creatorId,text) values(47,6,'Morbi vulputate sit amet mauris et ultricies. Morbi cursus, tortor eu convallis porta, felis elit posuere nunc, eget convallis leo justo vel enim. Nam aliquam nunc vitae lobortis lobortis. Mauris venenatis auctor odio, a elementum dolor malesuada rutrum. Sed vitae nisl luctus, finibus quam eget, egestas ante. Fusce egestas ultricies blandit. Vivamus egestas scelerisque tortor in semper. Aliquam erat volutpat. Etiam et convallis felis. Nullam ullamcorper venenatis scelerisque. Pellentesque fringilla ipsum a consequat fermentum. Curabitur luctus luctus euismod. Aenean posuere urna nec sem vestibulum, ut tempus purus rutrum. Suspendisse lobortis rutrum magna posuere luctus.');
insert into post(id,private,contentId,bandId) values(23,true,47,1);

insert into content(id,creatorId,text) values(48,6,'Suspendisse mattis augue ac ex ultricies egestas. Phasellus non ipsum at sem bibendum congue. Integer a tempor libero. Mauris laoreet venenatis elit at suscipit. Nulla at venenatis mi, ut mollis sem. Maecenas id molestie dolor, consectetur vulputate libero. Sed commodo nunc in erat imperdiet tristique. Donec pretium nisi et.');
insert into post(id,private,contentId,bandId) values(24,true,48,1);

insert into content(id,creatorId,text) values(49,6,'Quisque id diam non ex finibus gravida. Donec efficitur, enim et convallis luctus, metus est ultrices neque, ac eleifend turpis mauris vitae est. Donec tincidunt lacinia risus et convallis. Ut elementum quam id convallis interdum. Phasellus efficitur sed ligula eget vestibulum. Sed consectetur, velit in scelerisque suscipit, diam massa sagittis nunc, et facilisis ligula diam et justo. Fusce elementum ultricies dolor, in ullamcorper ipsum vestibulum ac. Maecenas quis ullamcorper leo. Duis malesuada felis quis fringilla facilisis. Sed sed egestas sapien. Vivamus ullamcorper viverra auctor. Sed a elit blandit lectus pharetra accumsan vel quis neque. In pulvinar magna eget nisi porttitor, at accumsan leo venenatis.');
insert into post(id,private,contentId,bandId) values(25,true,49,1);

insert into content(id,creatorId,text) values(50,6,'Curabitur mauris neque, gravida a lobortis ut, laoreet vitae libero. Praesent ut felis cursus, condimentum sapien id, congue quam. Fusce quis diam sit amet mi elementum tempus quis consequat turpis. Quisque maximus ornare dui non iaculis. Suspendisse dictum placerat lorem at euismod. Duis sit amet faucibus enim. Pellentesque interdum dolor sed varius porttitor. Aliquam sed orci egestas leo dignissim lacinia. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque neque ex, imperdiet vel risus ut, tincidunt pretium est. Vestibulum fermentum lacus ipsum, at maximus erat fermentum efficitur. Morbi finibus euismod risus.');
insert into post(id,private,contentId,bandId) values(26,true,50,1);

insert into content(id,creatorId,text) values(51,6,'Aliquam orci ex, vulputate ac lobortis ac, pharetra et ex. Donec interdum mattis ex dapibus posuere. Suspendisse libero ligula, tincidunt eu orci quis, posuere efficitur urna. Praesent interdum, risus nec pretium porttitor, lectus felis eleifend ipsum, in aliquet diam arcu eu nunc. Sed nec fermentum felis. Nam vel elementum ex, in mollis nibh. Maecenas et nulla fringilla, ultricies dui vitae, efficitur leo. Phasellus nec vehicula ipsum. Aliquam sit amet lorem tellus. Vivamus at justo vel magna aliquet convallis et interdum dui. Donec vestibulum pulvinar augue sit amet pulvinar.');
insert into post(id,private,contentId,bandId) values(27,true,51,1);

insert into content(id,creatorId,text) values(52,6,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus venenatis neque nunc, at facilisis orci facilisis a. Nam eget suscipit est, quis placerat diam. Ut pharetra aliquam diam. Phasellus fringilla metus quis dolor congue, vitae scelerisque tortor lacinia. Integer tempus enim id pretium lobortis. Duis.');
insert into post(id,private,contentId,bandId) values(28,true,52,1);

insert into content(id, creatorId,text) values(53,16,'Nice Post');
insert into comment(id,contentId,postId) values(13,53,28);

insert into content(id, creatorId,text) values(54,16,'Nice Post Man');
insert into comment(id,contentId,postId) values(14,54,23);

ALTER SEQUENCE post_id_seq RESTART WITH 29;
ALTER SEQUENCE comment_id_seq RESTART WITH 15;
ALTER SEQUENCE content_id_seq RESTART WITH 55;