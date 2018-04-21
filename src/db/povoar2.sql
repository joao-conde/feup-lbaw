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

\i insertLocations.sql;

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

--Bands


insert into band (id,name, creationDate, ceaseDate, location, isActive) values (1,'B. Riley Financial, Inc.', '09-04-1960', null, 1, true);
insert into band (id,name, creationDate, ceaseDate, location, isActive) values (2,'Selecta Biosciences, Inc.', '29-03-2006', '06-08-1962', 2, true);
insert into band (id,name, creationDate, ceaseDate, location, isActive) values (3,'iShares MSCI All Country Asia ex Japan Index Fund', '01-11-1997', null, 2, true);
insert into band (id,name, creationDate, ceaseDate, location, isActive) values (4,'MRC Global Inc.', '20-12-1973', null, 2, true);
insert into band (id,name, creationDate, ceaseDate, location, isActive) values (5,'Thermon Group Holdings, Inc.', '16-08-1983', '16-11-1987', 1, true);
insert into band (id,name, creationDate, ceaseDate, location, isActive) values (6,'Blackrock Corporate High Yield Fund, Inc.', '02-10-1976', null, 1, true);

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

insert into content(id,contentCreatorId,text) values(1,5,'Lay her down as priest does, should the Lord be accountin. Every boat is leaking in this town. Holy rollers sitting with their backs to the middle. Born on third, thinks he got a triple. Its all right. Get this off my plate. Where they have more. And I listen for the voice inside my head. But I found my place. We all could use a sedative right now. Stealing light from whats beneath. Still they take more. Find a lighthouse in the dark stormy weather.');
insert into content(id,contentCreatorId,text) values(2,6,'Ive been tripping off constellations and stars.. Im feeling burnt clean, under your eyes, putting me out. A little candle like you. Facing forward. With another man, oh man.. You said youd always be mine. Ooh ooh, baby dont hurt no more. Where does it go?. Been keeping you in my heart.. You just looked up at the stars. Youre not mine to save. Ooh ooh, ooh baby dont hurt no more. But if you let me be there, again.');
insert into content(id,contentCreatorId,text) values(3,5,'And so I whispered into your ear,. Where does it go?. Or the love of the chase?. Of watching them fade. Goes so quickly.');
insert into content(id,contentCreatorId,text) values(4,7,'But deciding your innocence. Dont deserve the hurt youre going through. I take my licks -- like a man.');
insert into content(id,contentCreatorId,text) values(5,8,'and Im watching from the door.');
insert into content(id,contentCreatorId,text) values(6,10,'How many secrets can you keep?. Whyd you only call me when youre high?. (Do I wanna know?).');
insert into content(id,contentCreatorId,text) values(7,11,'Was sorta hoping that youd stay. For saying things that you cant say tomorrow day. (Baby, we both know).');
insert into content(id,contentCreatorId,text) values(8,12,'That sticks around like summat in your teeth?. (Sad to see you go). it took you a lifetime to destroy. And I play it on repeat. Cause theres this tune I found.');
insert into content(id,contentCreatorId,text) values(9,11,'Do you ever get the fear that you cant shift the type. The mirrors image, it tells me its home time.');
insert into content(id,contentCreatorId,text) values(10,16,'Hell rekindle all of those dreams. If this feeling flows both ways?');
insert into content(id,contentCreatorId,text) values(11,12,'Ever thought of calling when youve had a few?. Left you multiple missed calls and to my message, you reply.');
insert into content(id,contentCreatorId,text) values(12,7,'Barnett broke through back in 2015 with the critically-acclaimed LP ’Sometimes I Sit And Think And Sometimes I Just Sit’.');
insert into content(id,contentCreatorId,text) values(13,9,'A host of independent music festivals have committed to cutting down on plastic waste.The Association of Independent Festivals (AIF) have teamed up with over 60 festivals for its new ‘Drastic On Plastic’ campaign.');
insert into content(id,contentCreatorId,text) values(14,10,'Last month, the French star announced that she’ll make her live return in the US this October – with shows scheduled for Los Angeles and New York. In November, two gigs will take place at London’s Eventim Apollo.');
insert into content(id,contentCreatorId,text) values(15,11,'Check them out below Green Day frontman Billie Joe Armstrong’s new band The Longshot have surprise released their debut album along with a music video for the title track, ‘Love Is For Losers’. Check them out below. While Green Day are currently taking some down time off the back of 2016’s acclaimed ‘Revolution Radio‘ and last year’s greatest hits compilation ‘God’s Favourite Band‘, Armstrong has gone back to his DIY punk roots for his new band. After teasing fans before dropping the first three tracks from the band before performing their first ever live show together at the weekend,  now The Longshot’s full length LP is here. Read more at http://www.nme.com/news/music/billie-joe-armstrongs-new-band-longshot-release-video-full-album-love-losers-2298033#SdTfcoBtb1ppcj4d.99');


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

--Comments


insert into content(id, contentCreatorId,text) values(16,8,'Nice Post');
insert into content(id, contentCreatorId,text) values(17,10,'Indeed');
insert into content(id, contentCreatorId,text) values(18,16,'Where is this band from?');
insert into content(id, contentCreatorId,text) values(19,12,'They are from Portugal!');
insert into content(id, contentCreatorId,text) values(20,7,'I like!');
insert into content(id, contentCreatorId,text) values(21,10,'Me too');
insert into content(id, contentCreatorId,text) values(22,7,'Well done!');
insert into content(id, contentCreatorId,text) values(23,11,'Very nice post!');
insert into content(id, contentCreatorId,text) values(24,8,'Don´t like this!');
insert into content(id, contentCreatorId,text) values(25,10,'I like it');
insert into content(id, contentCreatorId,text) values(26,9,'What is this?');
insert into content(id, contentCreatorId,text) values(27,14,'What a nice surprise!');

insert into comment(id,contentId,postId) values(1,16,1);
insert into comment(id,contentId,postId) values(2,17,1);
insert into comment(id,contentId,postId) values(3,18,2);
insert into comment(id,contentId,postId) values(4,19,2);
insert into comment(id,contentId,postId) values(5,20,3);
insert into comment(id,contentId,postId) values(6,21,3);
insert into comment(id,contentId,postId) values(7,22,4);
insert into comment(id,contentId,postId) values(8,23,4);
insert into comment(id,contentId,postId) values(9,24,4);
insert into comment(id,contentId,postId) values(10,25,5);
insert into comment(id,contentId,postId) values(11,26,13);
insert into comment(id,contentId,postId) values(12,27,13);


--Messages


insert into content(id,contentCreatorId,text) values(28,6,'Hello');
insert into content(id,contentCreatorId,text) values(29,7,'Hello');
insert into content(id,contentCreatorId,text) values(30,5,'I need you to play tonight!');
insert into content(id,contentCreatorId,text) values(31,9,'Yes');
insert into content(id,contentCreatorId,text) values(32,10,'Tonight I can´t');
insert into content(id,contentCreatorId,text) values(33,10,'Hello!');
insert into content(id,contentCreatorId,text) values(34,12,'Let´s meet on Wednesday');
insert into content(id,contentCreatorId,text) values(35,13,'Ok!');
insert into content(id,contentCreatorId,text) values(36,11,'Not me!');
insert into content(id,contentCreatorId,text) values(37,7,'Ok my friend');
insert into content(id,contentCreatorId,text) values(38,10,'This site is awesome');
insert into content(id,contentCreatorId,text) values(39,12,'Can you share the song?');

insert into message(id,contentId,receiverId,bandId) values(1,28,7,NULL);
insert into message(id,contentId,receiverId,bandId) values(2,29,10,NULL);
insert into message(id,contentId,receiverId,bandId) values(3,30,NULL,2);
insert into message(id,contentId,receiverId,bandId) values(4,31,NULL,2);
insert into message(id,contentId,receiverId,bandId) values(5,32,NULL,2);
insert into message(id,contentId,receiverId,bandId) values(6,33,12,NULL);
insert into message(id,contentId,receiverId,bandId) values(7,34,10,NULL);
insert into message(id,contentId,receiverId,bandId) values(8,35,11,NULL);
insert into message(id,contentId,receiverId,bandId) values(9,36,13,NULL);
insert into message(id,contentId,receiverId,bandId) values(10,37,10,NULL);
insert into message(id,contentId,receiverId,bandId) values(11,38,7,NULL);
insert into message(id,contentId,receiverId,bandId) values(12,39,14,NULL);

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


--Warnings

insert into warning(id,adminId,userId,bandId,contentId) values(1,1,7,NULL,NULL);
insert into warning(id,adminId,userId,bandId,contentId) values(2,1,NULL,2,NULL);
insert into warning(id,adminId,userId,bandId,contentId) values(3,1,7,NULL,4);
insert into warning(id,adminId,userId,bandId,contentId) values(4,1,10,NULL,33);
insert into warning(id,adminId,userId,bandId,contentId) values(5,1,NULL,4,9);
insert into warning(id,adminId,userId,bandId,contentId) values(6,1,NULL,2,32);



--Bans

insert into ban(id,reason,ceaseDate,adminId,userId,bandId,banDate) values(1,'Bad behaviour',NULL,1,7,NULL,'17/01/2018');
insert into ban(id,reason,ceaseDate,adminId,userId,bandId,banDate) values(2,'Bad behaviour',NULL,1,NULL,1,'21/03/2018');
insert into ban(id,reason,ceaseDate,adminId,userId,bandId,banDate) values(3,'Bad behaviour','21/4/2018',1,NULL,4,'01/01/2018');

--Genres

insert into genre (id,name, creatingAdminId, isActive) values (1,'Alternative',1,true);
insert into genre (id,name, creatingAdminId, isActive) values (2,'Big Band',1,true);
insert into genre (id,name, creatingAdminId, isActive) values (3,'Country',1,true);
insert into genre (id,name, creatingAdminId, isActive) values (4,'Electronic',1,true);
insert into genre (id,name, creatingAdminId, isActive) values (5,'Jazz',1,true);
insert into genre (id,name, creatingAdminId, isActive) values (6,'Opera',1,true);
insert into genre (id,name, creatingAdminId, isActive) values (7,'Classical',1,true);
insert into genre (id,name, creatingAdminId, isActive) values (8,'Hip hop',1,true);
insert into genre (id,name, creatingAdminId, isActive) values (9,'Rock',1,true);
insert into genre (id,name, creatingAdminId, isActive) values (10,'Blues',1,true);
insert into genre (id,name, creatingAdminId, isActive) values (11,'Folk',1,true);
insert into genre (id,name, creatingAdminId, isActive) values (12,'Pop',1,true);

--Skills

insert into skill (id,name, creatingAdminId, isActive) values (1,'Cajon',1,true);
insert into skill (id,name, creatingAdminId, isActive) values (2,'Handpan',1,true);
insert into skill (id,name, creatingAdminId, isActive) values (3,'Triangle',1,true);
insert into skill (id,name, creatingAdminId, isActive) values (4,'Xylophone',1,true);
insert into skill (id,name, creatingAdminId, isActive) values (5,'Drums',1,true);
insert into skill (id,name, creatingAdminId, isActive) values (6,'Accordion',1,true);
insert into skill (id,name, creatingAdminId, isActive) values (7,'Bagpipe',1,true);
insert into skill (id,name, creatingAdminId, isActive) values (8,'Clarinet',1,true);
insert into skill (id,name, creatingAdminId, isActive) values (9,'Flute',1,true);
insert into skill (id,name, creatingAdminId, isActive) values (10,'Trumpet',1,true);
insert into skill (id,name, creatingAdminId, isActive) values (11,'Organ',1,true);
insert into skill (id,name, creatingAdminId, isActive) values (12,'Piano',1,true);
insert into skill (id,name, creatingAdminId, isActive) values (13,'Keyboard',1,true);
insert into skill (id,name, creatingAdminId, isActive) values (14,'Saxophone',1,true);
insert into skill (id,name, creatingAdminId, isActive) values (15,'Trombone',1,true);
insert into skill (id,name, creatingAdminId, isActive) values (16,'Tuba',1,true);
insert into skill (id,name, creatingAdminId, isActive) values (17,'Harp',1,true);
insert into skill (id,name, creatingAdminId, isActive) values (18,'Banjo',1,true);
insert into skill (id,name, creatingAdminId, isActive) values (19,'Bass Guitar',1,true);
insert into skill (id,name, creatingAdminId, isActive) values (20,'Electric Guitar',1,true);
insert into skill (id,name, creatingAdminId, isActive) values (21,'Acoustic Guitar',1,true);
insert into skill (id,name, creatingAdminId, isActive) values (22,'Violin',1,true);
insert into skill (id,name, creatingAdminId, isActive) values (23,'Ukulele',1,true);
insert into skill (id,name, creatingAdminId, isActive) values (24,'Cello',1,true);
insert into skill (id,name, creatingAdminId, isActive) values (25,'Synthesizer',1,true);
insert into skill (id,name, creatingAdminId, isActive) values (26,'Keytar',1,true);




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
