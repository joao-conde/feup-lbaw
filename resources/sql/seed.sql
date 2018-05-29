
DROP TRIGGER IF EXISTS insert_notification_trigger_user_follower ON user_follower;
DROP FUNCTION  IF EXISTS insert_notification_trigger_user_follower();

DROP TRIGGER IF EXISTS insert_notification_trigger_band_follower ON band_follower;
DROP FUNCTION  IF EXISTS insert_notification_trigger_band_follower();

DROP TRIGGER IF EXISTS insert_notification_trigger_message ON message;
DROP FUNCTION  IF EXISTS insert_notification_trigger_message();

DROP TRIGGER IF EXISTS insert_notification_trigger_comment ON comment;
DROP FUNCTION  IF EXISTS insert_notification_trigger_comment();

DROP TRIGGER IF EXISTS insert_notification_trigger_band_application ON band_application;
DROP FUNCTION  IF EXISTS insert_notification_trigger_band_application();

DROP TRIGGER IF EXISTS insert_notification_trigger_band_invitation ON band_invitation;
DROP FUNCTION  IF EXISTS insert_notification_trigger_band_invitation();

DROP TRIGGER IF EXISTS insert_notification_trigger_warning ON warning;
DROP FUNCTION  IF EXISTS insert_notification_trigger_warning();

DROP TRIGGER IF EXISTS insert_notification_trigger_band_invitation_updated ON band_invitation;
DROP FUNCTION  IF EXISTS insert_notification_trigger_band_invitation_updated();

DROP TRIGGER IF EXISTS insert_notification_trigger_band_application_updated ON band_application;
DROP FUNCTION  IF EXISTS insert_notification_trigger_band_application_updated();

DROP TRIGGER IF EXISTS update_last_satus_date_trigger_band_application ON band_application;
DROP TRIGGER IF EXISTS update_last_satus_date_trigger_band_invitation ON band_invitation;
DROP FUNCTION  IF EXISTS update_last_satus_date_trigger();






DROP TABLE IF EXISTS user_notification CASCADE;
DROP TRIGGER IF EXISTS check_xor_notification_origin ON notification_trigger;
DROP FUNCTION  IF EXISTS check_xor_notification_origin();
DROP TABLE IF EXISTS notification_trigger CASCADE;
DROP TYPE IF EXISTS NOTIFICATION_TYPE;

DROP TABLE IF EXISTS band_invitation CASCADE;
DROP TYPE IF EXISTS BAND_INVITATION_STATUS;
DROP TABLE IF EXISTS band_application CASCADE;
DROP TYPE IF EXISTS BAND_APPLICATION_STATUS;
--DROP TRIGGER IF EXISTS insert_notification_trigger_band_follower ON band_follower;
--DROP FUNCTION  IF EXISTS insert_notification_trigger_band_follower();
DROP TABLE IF EXISTS band_follower CASCADE;
DROP TABLE IF EXISTS band_rating CASCADE;
DROP TABLE IF EXISTS band_membership CASCADE;
DROP TABLE IF EXISTS band_genre CASCADE;

DROP TRIGGER IF EXISTS check_is_admin_warning ON warning;
DROP FUNCTION  IF EXISTS check_is_admin_warning();
DROP TABLE IF EXISTS warning CASCADE;
DROP TABLE IF EXISTS user_rating CASCADE;
-- DROP TRIGGER IF EXISTS insert_notification_trigger_user_follower ON user_follower;
-- DROP FUNCTION  IF EXISTS insert_notification_trigger_user_follower();
DROP TABLE IF EXISTS user_follower CASCADE;
DROP TABLE IF EXISTS user_skill CASCADE;
DROP TRIGGER IF EXISTS check_xor_user_band ON ban;
DROP FUNCTION  IF EXISTS check_xor_user_band();

DROP TRIGGER IF EXISTS check_is_admin_ban ON ban;
DROP FUNCTION  IF EXISTS check_is_admin_ban();
DROP TABLE IF EXISTS ban CASCADE;

DROP TRIGGER IF EXISTS check_xor_report_type ON report;
DROP FUNCTION  IF EXISTS check_xor_report_type();
DROP TABLE IF EXISTS report CASCADE;
DROP TYPE IF EXISTS REPORT_TYPE;

DROP TRIGGER IF EXISTS check_is_admin_skill ON skill;
DROP FUNCTION  IF EXISTS check_is_admin_skill();
DROP TABLE IF EXISTS skill CASCADE;

DROP TRIGGER IF EXISTS check_is_admin_genre ON genre;
DROP FUNCTION  IF EXISTS check_is_admin_genre();
DROP TABLE IF EXISTS genre CASCADE;

DROP TABLE IF EXISTS comment CASCADE;

DROP TRIGGER IF EXISTS check_xor_message_destination ON message;
DROP FUNCTION  IF EXISTS check_xor_message_destination();
DROP TRIGGER IF EXISTS check_band_message ON message;
DROP FUNCTION  IF EXISTS check_band_message();
DROP FUNCTION IF EXISTS check_user_belongs_to_band(userId Integer, bandId Integer);
DROP TABLE IF EXISTS message CASCADE;

DROP TRIGGER IF EXISTS check_band_post ON post;
DROP FUNCTION  IF EXISTS check_band_post();
DROP TABLE IF EXISTS post CASCADE;

DROP TABLE IF EXISTS content CASCADE;
DROP TABLE IF EXISTS band CASCADE;
DROP FUNCTION  IF EXISTS is_admin(userId INTEGER);
DROP TABLE IF EXISTS mb_user CASCADE;

DROP TABLE IF EXISTS city CASCADE;
DROP TABLE IF EXISTS country CASCADE;


/*****************************************************/
/****************** Country **************************/
/*****************************************************/

CREATE TABLE country (
    id SERIAL NOT NULL,
    name TEXT NOT NULL UNIQUE
);

ALTER TABLE ONLY country
    ADD CONSTRAINT country_pkey PRIMARY KEY (id);


/*****************************************************/
/****************** City *****************************/
/*****************************************************/



CREATE TABLE city (
    id SERIAL NOT NULL,
    name TEXT NOT NULL,
    countryId INTEGER NOT NULL
);

ALTER TABLE ONLY city
    ADD CONSTRAINT city_pkey PRIMARY KEY (id);

ALTER TABLE ONLY city
    ADD CONSTRAINT city_country_id_fkey FOREIGN KEY (countryId) REFERENCES country(id) ON UPDATE CASCADE;

/*****************************************************/
/***************** User ******************************/
/*****************************************************/



CREATE TABLE mb_user (

    id SERIAL NOT NULL,
    username TEXT NOT NULL,
    password TEXT NOT NULL,
    name TEXT NOT NULL,
    bio TEXT,
    dateOfBirth DATE,
    deactivationDate DATE,
    warns INTEGER DEFAULT 0,
    location INTEGER,
    rating REAL,
    admin BOOLEAN NOT NULL DEFAULT FALSE,
    remember_token TEXT
);

ALTER TABLE ONLY mb_user
    ADD CONSTRAINT mb_user_pkey PRIMARY KEY (id);

ALTER TABLE ONLY mb_user
    ADD CONSTRAINT mb_user_username_unique UNIQUE (username);

ALTER TABLE ONLY mb_user
    ADD CONSTRAINT mb_user_dateOfBirth_past CHECK (dateOfBirth < now());

ALTER TABLE ONLY mb_user
    ADD CONSTRAINT mb_user_location_fkey FOREIGN KEY (location) REFERENCES city(id) ON UPDATE CASCADE;

ALTER TABLE ONLY mb_user
    ADD CONSTRAINT mb_user_rating_domain CHECK ((rating <= 5.0) AND (rating >= 0.0));


CREATE OR REPLACE FUNCTION is_admin (userId INTEGER)
RETURNS BOOLEAN AS $$
DECLARE
    isAdmin BOOLEAN;
BEGIN
   SELECT mb_user.admin INTO isAdmin FROM mb_user WHERE mb_user.id = userId;

   RETURN isAdmin;
END;
$$ LANGUAGE plpgsql;

/*****************************************************/
/***************** Band ******************************/
/*****************************************************/



CREATE TABLE band (

    id SERIAL NOT NULL,
    name char(50) NOT NULL,
    creationDate DATE DEFAULT now(),
    ceaseDate DATE,
    location INTEGER,
    isActive BOOLEAN DEFAULT TRUE,
    bio TEXT

);

ALTER TABLE ONLY band
    ADD CONSTRAINT band_pkey PRIMARY KEY (id);

ALTER TABLE ONLY band
    ADD CONSTRAINT band_name_unique UNIQUE (name);

ALTER TABLE ONLY band
    ADD CONSTRAINT band_creation_past CHECK (creationDate < now());

ALTER TABLE ONLY band
    ADD CONSTRAINT band_location_fkey FOREIGN KEY (location) REFERENCES city(id) ON UPDATE CASCADE;

/*****************************************************/
/***************** Content ***************************/
/*****************************************************/


CREATE TABLE content (

    id SERIAL NOT NULL,
    text TEXT NOT NULL,
    date TIMESTAMP DEFAULT now(),
    creatorId INTEGER NOT NULL,
    isActive BOOLEAN DEFAULT TRUE

);

ALTER TABLE ONLY content
    ADD CONSTRAINT content_pkey PRIMARY KEY (id);

ALTER TABLE ONLY content
    ADD CONSTRAINT creator_id_fkey FOREIGN KEY (creatorId) REFERENCES mb_user(id) ON UPDATE CASCADE;


/*****************************************************/
/***************** Post ******************************/
/*****************************************************/


CREATE TABLE post (

    id SERIAL NOT NULL,
    private BOOLEAN NOT NULL DEFAULT FALSE,
    contentId INTEGER NOT NULL,
    bandId INTEGER,
    mediaURL TEXT
);

ALTER TABLE ONLY post
    ADD CONSTRAINT post_pkey PRIMARY KEY (id);

ALTER TABLE ONLY post
    ADD CONSTRAINT post_content_id_fkey FOREIGN KEY (contentId) REFERENCES content(id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE ONLY post
    ADD CONSTRAINT post_band_id_fkey FOREIGN KEY (bandId) REFERENCES band(id) ON UPDATE CASCADE;


CREATE OR REPLACE FUNCTION check_band_post() RETURNS trigger AS $check_band_post$

    DECLARE vPosterId INTEGER;

    BEGIN
       
        IF NEW.bandId IS NOT NULL THEN

            SELECT creatorId INTO vPosterId
            FROM content
            WHERE id = New.contentId;

            IF check_user_belongs_to_band(vPosterId, New.bandId) = FALSE THEN

                RAISE EXCEPTION 'this user does not belong to the band, post not inserted';

            END IF;

        END IF;

    
        RETURN NEW;

    END;
    
$check_band_post$ LANGUAGE plpgsql;

CREATE TRIGGER check_band_post BEFORE INSERT OR UPDATE ON post
    FOR EACH ROW EXECUTE PROCEDURE check_band_post();

/*****************************************************/
/***************** Message ***************************/
/*****************************************************/


CREATE TABLE message (

    id SERIAL NOT NULL,
    contentId INTEGER NOT NULL,
    receiverId INTEGER,
    bandId INTEGER
);

ALTER TABLE ONLY message
    ADD CONSTRAINT message_pkey PRIMARY KEY (id);

ALTER TABLE ONLY message
    ADD CONSTRAINT message_content_id_fkey FOREIGN KEY (contentId) REFERENCES content(id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE ONLY message
    ADD CONSTRAINT message_receiver_id_fkey FOREIGN KEY (receiverId) REFERENCES mb_user(id) ON UPDATE CASCADE;

ALTER TABLE ONLY message
    ADD CONSTRAINT message_band_id_fkey FOREIGN KEY (bandId) REFERENCES band(id) ON UPDATE CASCADE;


CREATE OR REPLACE FUNCTION check_user_belongs_to_band(userIdToCheck Integer, bandIdToCheck Integer) RETURNS BOOLEAN AS $$
    
    DECLARE result BOOLEAN;

    BEGIN
       
        SELECT EXISTS (
            SELECT band.id FROM band 
            JOIN band_membership ON band.id = band_membership.bandId 
            WHERE band.id = bandIdToCheck 
            AND band_membership.userId = userIdToCheck
            AND band_membership.ceaseDate IS NULL) INTO result;
        
        RETURN result;

    END;

$$ LANGUAGE plpgsql;


CREATE OR REPLACE FUNCTION check_band_message() RETURNS trigger AS $check_band_message$
    
    DECLARE vSenderId INTEGER;
    
    BEGIN
       
        IF NEW.bandId IS NOT NULL THEN

            SELECT creatorId INTO vSenderId
            FROM content
            WHERE id = New.contentId; 

            IF check_user_belongs_to_band(vSenderId, New.bandId) = FALSE THEN

                RAISE EXCEPTION 'this user does not belong to the band';

            END IF;

        END IF;

    
        RETURN NEW;

    END;

$check_band_message$ LANGUAGE plpgsql;

CREATE TRIGGER check_band_message BEFORE INSERT OR UPDATE ON message
    FOR EACH ROW EXECUTE PROCEDURE check_band_message();


CREATE OR REPLACE FUNCTION check_xor_message_destination() RETURNS trigger AS $check_xor_message_destination$
    BEGIN
        
        IF NEW.receiverId IS NULL AND NEW.bandId IS NULL THEN
            RAISE EXCEPTION 'receiverId and bandId cannot be both null';
        END IF;

        IF NEW.receiverId IS NOT NULL AND NEW.bandId IS NOT NULL THEN
            RAISE EXCEPTION 'receiverId and bandId cannot be both not null (%,%)', NEW.receiverId, New.bandId;
        END IF;

        RETURN NEW;

    END;
$check_xor_message_destination$ LANGUAGE plpgsql;

CREATE TRIGGER check_xor_message_destination BEFORE INSERT OR UPDATE ON message
    FOR EACH ROW EXECUTE PROCEDURE check_xor_message_destination();


CREATE OR REPLACE FUNCTION insert_notification_trigger_message() RETURNS trigger AS $$
    BEGIN
       
        INSERT INTO notification_trigger(type,originMessage) VALUES('message',New.id);
        RETURN NEW;

    END;
    
$$ LANGUAGE plpgsql;

CREATE TRIGGER insert_notification_trigger_message AFTER INSERT ON message
    FOR EACH ROW EXECUTE PROCEDURE insert_notification_trigger_message();



/*****************************************************/
/***************** Comment ***************************/
/*****************************************************/


CREATE TABLE comment (

    id SERIAL NOT NULL,
    contentId INTEGER NOT NULL,
    postId INTEGER NOT NULL
);

ALTER TABLE ONLY comment
    ADD CONSTRAINT comment_pkey PRIMARY KEY (id);

ALTER TABLE ONLY comment
    ADD CONSTRAINT comment_content_id_fkey FOREIGN KEY (contentId) REFERENCES content(id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE ONLY comment
    ADD CONSTRAINT post_id_fkey FOREIGN KEY (postId) REFERENCES post(id) ON UPDATE CASCADE ON DELETE CASCADE;


CREATE OR REPLACE FUNCTION insert_notification_trigger_comment() RETURNS trigger AS $$
    BEGIN
       
        INSERT INTO notification_trigger(type,originComment) VALUES('comment',New.id);
        RETURN NEW;

    END;
    
$$ LANGUAGE plpgsql;

CREATE TRIGGER insert_notification_trigger_comment AFTER INSERT ON comment
    FOR EACH ROW EXECUTE PROCEDURE insert_notification_trigger_comment();

/*****************************************************/
/***************** Genre *****************************/
/*****************************************************/



CREATE TABLE genre (

    id SERIAL NOT NULL,
    name TEXT NOT NULL,
    creatingAdminId INTEGER,
    isActive BOOLEAN DEFAULT TRUE

);

ALTER TABLE ONLY genre
    ADD CONSTRAINT genre_pkey PRIMARY KEY (id);

ALTER TABLE ONLY genre
    ADD CONSTRAINT genre_name_unique UNIQUE (name);

ALTER TABLE ONLY genre
    ADD CONSTRAINT genre_creatingAdmin_id_fkey FOREIGN KEY (creatingAdminId) REFERENCES mb_user(id) ON UPDATE CASCADE ON DELETE SET NULL;

CREATE OR REPLACE FUNCTION check_is_admin_genre() RETURNS trigger AS $check_is_admin_genre$
    BEGIN
        --Check if user is an admin--
        IF NOT is_admin(NEW.creatingAdminId) THEN
            RAISE EXCEPTION 'User is not an Admin';
        END IF;

        RETURN NEW;

    END;
$check_is_admin_genre$ LANGUAGE plpgsql;

CREATE TRIGGER check_is_admin_genre BEFORE INSERT OR UPDATE ON genre
    FOR EACH ROW EXECUTE PROCEDURE check_is_admin_genre();


/*****************************************************/
/***************** Skill *****************************/
/*****************************************************/

CREATE TABLE skill (

    id SERIAL NOT NULL,
    name TEXT NOT NULL,
    creatingAdminId INTEGER,
    isActive BOOLEAN DEFAULT TRUE
);

ALTER TABLE ONLY skill
    ADD CONSTRAINT skill_pkey PRIMARY KEY (id);

ALTER TABLE ONLY skill
    ADD CONSTRAINT skill_name_unique UNIQUE (name);

ALTER TABLE ONLY skill
    ADD CONSTRAINT skill_creatingAdmin_id_fkey FOREIGN KEY (creatingAdminId) REFERENCES mb_user(id) ON UPDATE CASCADE ON DELETE SET NULL;

CREATE OR REPLACE FUNCTION check_is_admin_skill() RETURNS trigger AS $check_is_admin_skill$
    BEGIN
        --Check if user is an admin--
        IF NOT is_admin(NEW.creatingAdminId) THEN
            RAISE EXCEPTION 'User is not an Admin';
        END IF;

        RETURN NEW;

    END;
$check_is_admin_skill$ LANGUAGE plpgsql;

CREATE TRIGGER check_is_admin_skill BEFORE INSERT OR UPDATE ON skill
    FOR EACH ROW EXECUTE PROCEDURE check_is_admin_skill();

/*****************************************************/
/***************** Report ****************************/
/*****************************************************/


CREATE TYPE REPORT_TYPE AS ENUM ('user_report', 'band_report', 'content_report');

CREATE TABLE report (

    id SERIAL NOT NULL,
    text TEXT NOT NULL,
    date TIMESTAMP DEFAULT now(),
    reportType REPORT_TYPE NOT NULL,
    reportedContentId INTEGER,
    reportedUserId INTEGER,
    reportedBandId INTEGER,
    reporterUserId INTEGER,
    seen BOOLEAN DEFAULT FALSE
);

ALTER TABLE ONLY report
    ADD CONSTRAINT report_pkey PRIMARY KEY (id);

ALTER TABLE ONLY report
    ADD CONSTRAINT reported_content_id_fkey FOREIGN KEY (reportedContentId) REFERENCES content(id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE ONLY report
    ADD CONSTRAINT reported_user_id_fkey FOREIGN KEY (reportedUserId) REFERENCES mb_user(id) ON UPDATE CASCADE;

ALTER TABLE ONLY report
    ADD CONSTRAINT reported_band_id_fkey FOREIGN KEY (reportedBandId) REFERENCES band(id) ON UPDATE CASCADE;

ALTER TABLE ONLY report
    ADD CONSTRAINT reporter_user_id_fkey FOREIGN KEY (reporterUserId) REFERENCES mb_user(id) ON UPDATE CASCADE;


CREATE OR REPLACE FUNCTION check_xor_report_type() RETURNS trigger AS $check_xor_report_type$
    BEGIN
        --Check for correct type
        IF NEW.reportType = 'user_report' AND NEW.reportedUserId IS NULL THEN
            RAISE EXCEPTION 'type user_report without reportedUserId';
        END IF;

        IF NEW.reportType = 'band_report' AND NEW.reportedBandId IS NULL THEN
            RAISE EXCEPTION 'type user_report without reportedBandId';
        END IF;

        IF NEW.reportType = 'content_report' AND NEW.reporterUserId IS NULL THEN
            RAISE EXCEPTION 'type user_report without reporterUserId';
        END IF;

        RETURN NEW;

    END;
$check_xor_report_type$ LANGUAGE plpgsql;

CREATE TRIGGER check_xor_report_type BEFORE INSERT OR UPDATE ON report
    FOR EACH ROW EXECUTE PROCEDURE check_xor_report_type();

    


/*****************************************************/
/******************* Ban *****************************/
/*****************************************************/



CREATE TABLE ban (

    id SERIAL NOT NULL,
    reason TEXT NOT NULL,
    banDate TIMESTAMP DEFAULT now(),
    ceaseDate TIMESTAMP,
    adminId INTEGER,
    userId INTEGER,
    bandId INTEGER,
    isActive boolean DEFAULT true
);

ALTER TABLE ONLY ban
    ADD CONSTRAINT ban_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ban
    ADD CONSTRAINT admin_id_fkey FOREIGN KEY (adminId) REFERENCES mb_user(id) ON UPDATE CASCADE;

ALTER TABLE ONLY ban
    ADD CONSTRAINT band_id_fkey FOREIGN KEY (bandId) REFERENCES band(id) ON UPDATE CASCADE;

ALTER TABLE ONLY ban
    ADD CONSTRAINT user_id_fkey FOREIGN KEY (userId) REFERENCES mb_user(id) ON UPDATE CASCADE;

CREATE OR REPLACE FUNCTION check_is_admin_ban() RETURNS trigger AS $check_is_admin_ban$
    BEGIN
        --Check if user is an admin--
        IF NOT is_admin(NEW.adminId) THEN
            RAISE EXCEPTION 'User is not an Admin';
        END IF;

        RETURN NEW;

    END;
$check_is_admin_ban$ LANGUAGE plpgsql;

CREATE TRIGGER check_is_admin_ban BEFORE INSERT OR UPDATE ON ban
    FOR EACH ROW EXECUTE PROCEDURE check_is_admin_ban();

CREATE OR REPLACE FUNCTION check_xor_user_band() RETURNS trigger AS $check_xor_user_band$
    BEGIN
        --Check if both user and ban are empty--
        IF NEW.userId IS NULL AND NEW.bandId IS NULL THEN
            RAISE EXCEPTION 'userId and bandId cannot be both null';
        END IF;

        --Check if both are not null
        IF NEW.userId IS NOT NULL AND NEW.bandId IS NOT NULL THEN
            RAISE EXCEPTION 'userId and bandId cannot be both not null (%,%)', NEW.userId, New.bandId;
        END IF;

        RETURN NEW;

    END;
$check_xor_user_band$ LANGUAGE plpgsql;

CREATE TRIGGER check_xor_user_band BEFORE INSERT OR UPDATE ON ban
    FOR EACH ROW EXECUTE PROCEDURE check_xor_user_band();



/*****************************************************/
/******************* User Skill **********************/
/*****************************************************/



CREATE TABLE user_skill (

    userId INTEGER NOT NULL,
    skillId INTEGER NOT NULL,
    level INTEGER NOT NULL CHECK (level >= 0 AND level <=5),
    isActive BOOLEAN DEFAULT TRUE

);

ALTER TABLE ONLY user_skill
    ADD CONSTRAINT user_skill_pkey PRIMARY KEY (userId,skillId);

ALTER TABLE ONLY user_skill
    ADD CONSTRAINT userId_fkey FOREIGN KEY (userId) REFERENCES mb_user(id) ON UPDATE CASCADE;

ALTER TABLE ONLY user_skill
    ADD CONSTRAINT skillId_fkey FOREIGN KEY (skillId) REFERENCES skill(id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE ONLY user_skill
    ADD CONSTRAINT user_skill_level_domain CHECK ((level <= 5) AND (level >= 1));


/*****************************************************/
/******************* User Follower *******************/
/*****************************************************/



CREATE TABLE user_follower (

    id SERIAL NOT NULL,
    followingUserId INTEGER NOT NULL,
    followedUserId INTEGER NOT NULL,
    isActive BOOLEAN DEFAULT TRUE

);

ALTER TABLE ONLY user_follower
    ADD CONSTRAINT user_follower_pkey PRIMARY KEY (id);

ALTER TABLE ONLY user_follower
    ADD CONSTRAINT user_follower_unique_pair UNIQUE (followingUserId,followedUserId);

ALTER TABLE ONLY user_follower
    ADD CONSTRAINT followingUserId_fkey FOREIGN KEY (followingUserId) REFERENCES mb_user(id) ON UPDATE CASCADE;

ALTER TABLE ONLY user_follower
    ADD CONSTRAINT followedUserId_fkey FOREIGN KEY (followedUserId) REFERENCES mb_user(id) ON UPDATE CASCADE;


CREATE OR REPLACE FUNCTION insert_notification_trigger_user_follower() RETURNS trigger AS $$
    BEGIN
       
        INSERT INTO notification_trigger(type,originUserFollower) VALUES('user_follower',New.id);
        RETURN NEW;

    END;
    
$$ LANGUAGE plpgsql;

CREATE TRIGGER insert_notification_trigger_user_follower AFTER INSERT ON user_follower
    FOR EACH ROW EXECUTE PROCEDURE insert_notification_trigger_user_follower();


/*****************************************************/
/******************* User Rating *********************/
/*****************************************************/



CREATE TABLE user_rating (

    ratingUserid INTEGER NOT NULL,
    ratedUserId INTEGER NOT NULL,
    rate INTEGER NOT NULL

);

ALTER TABLE ONLY user_rating
    ADD CONSTRAINT user_rating_pkey PRIMARY KEY (ratingUserid,ratedUserId);

ALTER TABLE ONLY user_rating
    ADD CONSTRAINT user_rating_rating_userId_fkey FOREIGN KEY (ratingUserid) REFERENCES mb_user(id) ON UPDATE CASCADE;

ALTER TABLE ONLY user_rating
    ADD CONSTRAINT user_rating_rated_userId_fkey FOREIGN KEY (ratedUserId) REFERENCES mb_user(id) ON UPDATE CASCADE;

ALTER TABLE ONLY user_rating
    ADD CONSTRAINT user_rating_rate_domain CHECK ((rate <= 5) AND (rate >= 1));


/*****************************************************/
/******************* Warning *************************/
/*****************************************************/


CREATE TABLE warning (

    id SERIAL NOT NULL,
    adminId INTEGER NOT NULL,
    userId INTEGER,
    bandId INTEGER,
    reason TEXT DEFAULT 'You have been reported. Please consider your behavior.',
    contentId INTEGER

);

ALTER TABLE ONLY warning
    ADD CONSTRAINT warning_pkey PRIMARY KEY (id);

ALTER TABLE ONLY warning
    ADD CONSTRAINT warning_adminId_fkey FOREIGN KEY (adminId) REFERENCES mb_user(id) ON UPDATE CASCADE;

ALTER TABLE ONLY warning
    ADD CONSTRAINT warning_userId_fkey FOREIGN KEY (userId) REFERENCES mb_user(id) ON UPDATE CASCADE;

ALTER TABLE ONLY warning
    ADD CONSTRAINT warning_bandId_fkey FOREIGN KEY (bandId) REFERENCES band(id) ON UPDATE CASCADE;

ALTER TABLE ONLY warning
    ADD CONSTRAINT warning_content_fkey FOREIGN KEY (contentId) REFERENCES content(id) ON UPDATE CASCADE ON DELETE CASCADE;

CREATE OR REPLACE FUNCTION check_is_admin_warning() RETURNS trigger AS $check_is_admin_warning$
    BEGIN
        --Check if user is an admin--
        IF NOT is_admin(NEW.adminId) THEN
            RAISE EXCEPTION 'User is not an Admin';
        END IF;

        RETURN NEW;

    END;
$check_is_admin_warning$ LANGUAGE plpgsql;

CREATE TRIGGER check_is_admin_warning BEFORE INSERT OR UPDATE ON warning
    FOR EACH ROW EXECUTE PROCEDURE check_is_admin_warning();


CREATE OR REPLACE FUNCTION insert_notification_trigger_warning() RETURNS trigger AS $$
    BEGIN
       
        INSERT INTO notification_trigger(type,originWarning) VALUES('warning',New.id);
        RETURN NEW;

    END;
    
$$ LANGUAGE plpgsql;

CREATE TRIGGER insert_notification_trigger_warning AFTER INSERT ON warning
    FOR EACH ROW EXECUTE PROCEDURE insert_notification_trigger_warning();

CREATE OR REPLACE FUNCTION check_xor_warning_destination() RETURNS trigger AS $check_xor_warning_destination$
    BEGIN
        --Check if both user and band are empty--
        IF NEW.userId IS NULL AND NEW.bandId IS NULL THEN
            RAISE EXCEPTION 'userId and bandId cannot be both null';
        END IF;

        --Check if both are not null
        IF NEW.userId IS NOT NULL AND NEW.bandId IS NOT NULL THEN
            RAISE EXCEPTION 'userId and bandId cannot be both not null (%,%)', NEW.userId, New.bandId;
        END IF;

        RETURN NEW;

    END;
$check_xor_warning_destination$ LANGUAGE plpgsql;

CREATE TRIGGER check_xor_warning_destination BEFORE INSERT OR UPDATE ON warning
    FOR EACH ROW EXECUTE PROCEDURE check_xor_warning_destination();

/*****************************************************/
/******************* Band Genre **********************/
/*****************************************************/



CREATE TABLE band_genre (

    bandId INTEGER NOT NULL,
    genreId INTEGER NOT NULL,
    isActive BOOLEAN DEFAULT TRUE
);

ALTER TABLE ONLY band_genre
    ADD CONSTRAINT band_genre_pkey PRIMARY KEY (bandId,genreId);

ALTER TABLE ONLY band_genre
    ADD CONSTRAINT band_genre_bandId_fkey FOREIGN KEY (bandId) REFERENCES band(id) ON UPDATE CASCADE;

ALTER TABLE ONLY band_genre
    ADD CONSTRAINT band_genre_genreId_fkey FOREIGN KEY (genreId) REFERENCES genre(id) ON UPDATE CASCADE ON DELETE CASCADE;

/*****************************************************/
/******************* Band Membership *****************/
/*****************************************************/


CREATE TABLE band_membership (

    id SERIAL NOT NULL,
    bandId INTEGER NOT NULL,
    userId INTEGER NOT NULL,
    isOwner BOOLEAN NOT NULL,
    initialDate DATE DEFAULT now(),
    ceaseDate DATE
);

ALTER TABLE ONLY band_membership
    ADD CONSTRAINT band_membership_pkey PRIMARY KEY (id);

ALTER TABLE ONLY band_membership
    ADD CONSTRAINT band_membership_bandId_fkey FOREIGN KEY (bandId) REFERENCES band(id) ON UPDATE CASCADE;

ALTER TABLE ONLY band_membership
    ADD CONSTRAINT band_membership_userId_fkey FOREIGN KEY (userId) REFERENCES mb_user(id) ON UPDATE CASCADE;


/*****************************************************/
/******************* Band Rating *********************/
/*****************************************************/


CREATE TABLE band_rating (

    ratingUserid INTEGER NOT NULL,
    ratedBandId INTEGER NOT NULL,
    rate INTEGER NOT NULL

);

ALTER TABLE ONLY band_rating
    ADD CONSTRAINT band_rating_pkey PRIMARY KEY (ratingUserid,ratedBandId);

ALTER TABLE ONLY band_rating
    ADD CONSTRAINT band_rating_rating_userId_fkey FOREIGN KEY (ratingUserid) REFERENCES mb_user(id) ON UPDATE CASCADE;

ALTER TABLE ONLY band_rating
    ADD CONSTRAINT band_rating_rated_bandId_fkey FOREIGN KEY (ratedBandId) REFERENCES band(id) ON UPDATE CASCADE;

ALTER TABLE ONLY band_rating
    ADD CONSTRAINT band_rating_rate_domain CHECK ((rate <= 5) AND (rate >= 1));




/*****************************************************/
/******************* Band Follower *******************/
/*****************************************************/



CREATE TABLE band_follower (

    id SERIAL NOT NULL,
    userId INTEGER NOT NULL,
    bandId INTEGER NOT NULL,
    isActive BOOLEAN DEFAULT TRUE

);

ALTER TABLE ONLY band_follower
    ADD CONSTRAINT band_follower_pkey PRIMARY KEY (id);

ALTER TABLE ONLY band_follower
    ADD CONSTRAINT band_follower_unique_pair UNIQUE (userId,bandId);

ALTER TABLE ONLY band_follower
    ADD CONSTRAINT followingUserId_fkey FOREIGN KEY (userId) REFERENCES mb_user(id) ON UPDATE CASCADE;

ALTER TABLE ONLY band_follower
    ADD CONSTRAINT followedBandId_fkey FOREIGN KEY (bandId) REFERENCES band(id) ON UPDATE CASCADE;


CREATE OR REPLACE FUNCTION insert_notification_trigger_band_follower() RETURNS trigger AS $$
    BEGIN
       
        INSERT INTO notification_trigger(type,originBandFollower) VALUES('band_follower',New.id);
        RETURN NEW;

    END;
    
$$ LANGUAGE plpgsql;

CREATE TRIGGER insert_notification_trigger_band_follower AFTER INSERT ON band_follower
    FOR EACH ROW EXECUTE PROCEDURE insert_notification_trigger_band_follower();


/*****************************************************/
/******************* Band Application ****************/
/*****************************************************/



CREATE TYPE BAND_APPLICATION_STATUS AS ENUM ('canceled', 'pending', 'accepted', 'rejected');

CREATE TABLE band_application (

    id SERIAL NOT NULL,
    userId INTEGER NOT NULL,
    bandId INTEGER NOT NULL,
    date TIMESTAMP DEFAULT now(),
    lastStatusDate TIMESTAMP DEFAULT now(),
    status BAND_APPLICATION_STATUS DEFAULT 'pending'

);

ALTER TABLE ONLY band_application
    ADD CONSTRAINT band_application_pkey PRIMARY KEY (id);

ALTER TABLE ONLY band_application
    ADD CONSTRAINT band_application_userId_fkey FOREIGN KEY (userId) REFERENCES mb_user(id) ON UPDATE CASCADE;

ALTER TABLE ONLY band_application
    ADD CONSTRAINT band_application_bandId_fkey FOREIGN KEY (bandId) REFERENCES band(id) ON UPDATE CASCADE;


CREATE OR REPLACE FUNCTION insert_notification_trigger_band_application() RETURNS trigger AS $$
    BEGIN
       
        INSERT INTO notification_trigger(type,originBandApplication) VALUES('band_application',New.id);
        RETURN NEW;

    END;
    
$$ LANGUAGE plpgsql;

CREATE TRIGGER insert_notification_trigger_band_application AFTER INSERT ON band_application
    FOR EACH ROW EXECUTE PROCEDURE insert_notification_trigger_band_application();

CREATE OR REPLACE FUNCTION insert_notification_trigger_band_application_updated() RETURNS trigger AS $$
    
    BEGIN
       
        IF NEW.status = 'accepted' OR NEW.status = 'rejected' THEN
            INSERT INTO notification_trigger(type,originBandApplication) VALUES('band_application_updated',New.id);
        END IF;

        IF NEW.status = 'accepted' THEN
            INSERT INTO band_membership(userId, bandId, isOwner) VALUES(New.userId, New.bandId, FALSE);
        END IF;

        NEW.lastStatusDate = now();

        RETURN NEW;

    END;
    
$$ LANGUAGE plpgsql;

CREATE TRIGGER insert_notification_trigger_band_application_updated AFTER UPDATE ON band_application
    FOR EACH ROW EXECUTE PROCEDURE insert_notification_trigger_band_application_updated();


CREATE OR REPLACE FUNCTION update_last_satus_date_trigger() RETURNS trigger AS $$
    
    BEGIN
       
        NEW.lastStatusDate = now();
        RETURN NEW;

    END;
    
$$ LANGUAGE plpgsql;

CREATE TRIGGER update_last_satus_date_trigger_band_application BEFORE UPDATE ON band_application
    FOR EACH ROW EXECUTE PROCEDURE update_last_satus_date_trigger();



/*****************************************************/
/******************* Band Invitation *****************/
/*****************************************************/



CREATE TYPE BAND_INVITATION_STATUS AS ENUM ('canceled', 'pending', 'accepted', 'rejected');

CREATE TABLE band_invitation(

    id SERIAL NOT NULL,
    userId INTEGER NOT NULL,
    bandId INTEGER NOT NULL,
    date TIMESTAMP DEFAULT now(),
    lastStatusDate TIMESTAMP DEFAULT now(),
    status BAND_INVITATION_STATUS DEFAULT 'pending'

);

ALTER TABLE ONLY band_invitation
    ADD CONSTRAINT band_invitation_pkey PRIMARY KEY (id);

ALTER TABLE ONLY band_invitation
    ADD CONSTRAINT band_invitation_userId_fkey FOREIGN KEY (userId) REFERENCES mb_user(id) ON UPDATE CASCADE;

ALTER TABLE ONLY band_invitation
    ADD CONSTRAINT band_invitation_bandId_fkey FOREIGN KEY (bandId) REFERENCES band(id) ON UPDATE CASCADE;

CREATE OR REPLACE FUNCTION insert_notification_trigger_band_invitation() RETURNS trigger AS $$
    BEGIN
       
        INSERT INTO notification_trigger(type,originBandInvitation) VALUES('band_invitation',New.id);
        RETURN NEW;

    END;
    
$$ LANGUAGE plpgsql;

CREATE TRIGGER insert_notification_trigger_band_invitation AFTER INSERT ON band_invitation
    FOR EACH ROW EXECUTE PROCEDURE insert_notification_trigger_band_invitation();

CREATE OR REPLACE FUNCTION insert_notification_trigger_band_invitation_updated() RETURNS trigger AS $$
    BEGIN
       
        IF NEW.status = 'accepted' OR NEW.status = 'rejected' THEN
            INSERT INTO notification_trigger(type,originBandInvitation) VALUES('band_invitation_updated',New.id);
        END IF;
        IF NEW.status = 'accepted' THEN
            INSERT INTO band_membership(userId, bandId, isOwner) VALUES(New.userId, New.bandId, FALSE);
        END IF;
            UPDATE band_invitation SET lastStatusDate = now();

        RETURN NEW;

    END;
    
$$ LANGUAGE plpgsql;


CREATE TRIGGER insert_notification_trigger_band_invitation_updated AFTER UPDATE ON band_invitation
    FOR EACH ROW EXECUTE PROCEDURE insert_notification_trigger_band_invitation_updated();

CREATE TRIGGER update_last_satus_date_trigger_band_invitation BEFORE UPDATE ON band_invitation
    FOR EACH ROW EXECUTE PROCEDURE update_last_satus_date_trigger();

/*****************************************************/
/************ Notification Trigger *******************/
/*****************************************************/



CREATE TYPE NOTIFICATION_TYPE AS ENUM (
    'user_follower', 'band_follower', 'message', 'comment', 'band_application',
    'band_invitation', 'warning', 'band_invitation_updated', 'band_application_updated');

CREATE TABLE notification_trigger (

    id SERIAL NOT NULL,
    date TIMESTAMP NOT NULL DEFAULT now(),
    type NOTIFICATION_TYPE NOT NULL,
    originUserFollower INTEGER,
    originBandFollower INTEGER,
    originMessage INTEGER,
    originComment INTEGER,
    originBandApplication INTEGER,
    originBandInvitation INTEGER,
    originWarning INTEGER
);

ALTER TABLE ONLY notification_trigger
    ADD CONSTRAINT notification_trigger_pkey PRIMARY KEY (id);

ALTER TABLE ONLY notification_trigger
    ADD CONSTRAINT notification_trigger_origin_user_follower_fkey FOREIGN KEY (originUserFollower) REFERENCES user_follower(id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE ONLY notification_trigger
    ADD CONSTRAINT notification_trigger_origin_band_follower_fkey FOREIGN KEY (originBandFollower) REFERENCES band_follower(id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE ONLY notification_trigger
    ADD CONSTRAINT notification_trigger_origin_message_fkey FOREIGN KEY (originMessage) REFERENCES message(id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE ONLY notification_trigger
    ADD CONSTRAINT notification_trigger_origin_comment_fkey FOREIGN KEY (originComment) REFERENCES comment(id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE ONLY notification_trigger
    ADD CONSTRAINT notification_trigger_origin_band_application_fkey FOREIGN KEY (originBandApplication) REFERENCES band_application(id) ON UPDATE CASCADE;

ALTER TABLE ONLY notification_trigger
    ADD CONSTRAINT notification_trigger_origin_band_invitation_fkey FOREIGN KEY (originBandInvitation) REFERENCES band_invitation(id) ON UPDATE CASCADE;

ALTER TABLE ONLY notification_trigger
    ADD CONSTRAINT notification_trigger_origin_warning_fkey FOREIGN KEY (originWarning) REFERENCES warning(id) ON UPDATE CASCADE ON DELETE CASCADE;


CREATE OR REPLACE FUNCTION check_xor_notification_origin() RETURNS trigger AS $check_xor_notification_origin$
    BEGIN

        --Check for correct type and origin
        IF NEW.type = 'user_follower' AND NEW.originUserFollower IS NULL THEN
            RAISE EXCEPTION 'type user follower without originUserFollowerId';
        END IF;

        IF NEW.type = 'band_follower' AND NEW.originBandFollower IS NULL THEN
            RAISE EXCEPTION 'type band follower without bandFollowerId';
        END IF;

        IF NEW.type = 'message' AND NEW.originMessage IS NULL THEN
            RAISE EXCEPTION 'type message without originMessageId';
        END IF;

        IF NEW.type = 'comment' AND NEW.originComment IS NULL THEN
            RAISE EXCEPTION 'type comment without originCommentId';
        END IF;

        IF NEW.type = 'band_application' AND NEW.originBandApplication IS NULL THEN
            RAISE EXCEPTION 'type band application without originBandApplicationId';
        END IF;

        IF NEW.TYPE = 'band_application_updated' AND NEW.originBandApplication IS NULL THEN
            RAISE EXCEPTION 'type band application updated without band application Id';
        END IF;

        IF NEW.type = 'band_invitation' AND NEW.originBandInvitation IS NULL THEN
            RAISE EXCEPTION 'type band invitation without band invitation Id';
        END IF;

        IF NEW.TYPE = 'band_invitation_updated' AND NEW.originBandInvitation IS NULL THEN
            RAISE EXCEPTION 'type band invitation updated without band inivitation Id';
        END IF;

        IF NEW.type = 'warning' AND NEW.originWarning IS NULL THEN
            RAISE EXCEPTION 'type warning without origin warning id';
        END IF;

        RETURN NEW;

    END;
$check_xor_notification_origin$ LANGUAGE plpgsql;

CREATE TRIGGER check_xor_notification_origin BEFORE INSERT OR UPDATE ON notification_trigger
    FOR EACH ROW EXECUTE PROCEDURE check_xor_notification_origin();


CREATE OR REPLACE FUNCTION send_notification_to_band(notifBandId INTEGER, notifTriggerId INTEGER, notifText TEXT)
RETURNS VOID AS $$
    DECLARE
        receiverId INTEGER;
    BEGIN
        FOR receiverId IN 
            SELECT band_membership.userId
            FROM band_membership 
            WHERE band_membership.bandId = notifBandId 
        LOOP
            INSERT INTO user_notification(notificationTriggerId, userId, text) VALUES(notifTriggerId, receiverId, notifText);
        END LOOP;
    END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION insert_user_notifications_user_follower(notifTriggerId INTEGER, userFollowerId INTEGER)
RETURNS VOID AS $$
    DECLARE
        vReceiverId INTEGER;
        vSenderName TEXT;
        vNotifText TEXT;
    BEGIN
        SELECT followedUserId, mb_user.name INTO vReceiverId, vSenderName
        FROM user_follower JOIN mb_user
        ON mb_user.id = user_follower.followingUserId
        WHERE user_follower.id = userFollowerId;

        vNotifText := vSenderName || ' started to follow you!';

        INSERT INTO user_notification(notificationTriggerId, userId, text) VALUES(notifTriggerId, vReceiverId, vNotifText);
    END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION insert_user_notifications_band_follower(notifTriggerId INTEGER, bandFollowerId INTEGER)
RETURNS VOID AS $$
    DECLARE
        vSenderName TEXT;
        vBandName TEXT;
        vNotifText TEXT;
        vBandId INTEGER;
    BEGIN

        SELECT mb_user.name, band.name, band_follower.bandId INTO vSenderName, vBandName, vBandId
        FROM band_follower 
        JOIN mb_user ON band_follower.userId = mb_user.id
        JOIN band ON band.id = band_follower.bandId
        WHERE band_follower.id = bandFollowerId;

        vNotifText := vSenderName || ' started to follow ' || vBandName || '!';

        PERFORM send_notification_to_band(vBandId, notifTriggerId, vNotifText);

    END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION insert_user_notifications_message(notifTriggerId INTEGER, messageId INTEGER)
RETURNS VOID AS $$
    DECLARE
        vReceiverId INTEGER;
        vBandId INTEGER;
        vSenderName TEXT;
        vNotifText TEXT;
        vMessageText TEXT;
    BEGIN
        SELECT message.receiverId, message.bandId, mb_user.name, content.text 
        INTO vReceiverId, vBandId, vSenderName, vMessageText 
        FROM message
        JOIN content ON content.id = message.contentId
        JOIN mb_user ON mb_user.id = content.creatorId
        WHERE message.id = messageId;

        vNotifText := vSenderName || ': "' || vMessageText || '"';

        CASE
            WHEN vReceiverId IS NOT NULL THEN
                INSERT INTO user_notification(notificationTriggerId, userId, text) VALUES(notifTriggerId, vReceiverId, vNotifText);
            WHEN vBandId IS NOT NULL THEN
                PERFORM send_notification_to_band(vBandId, notifTriggerId, vNotifText);
            ELSE
                RAISE EXCEPTION 'Receiver message invalid';
        END CASE;

    END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION insert_user_notifications_comment(notifTriggerId INTEGER, commentId INTEGER)
RETURNS VOID AS $$
    DECLARE
        vPosterId INTEGER;
        vBandId INTEGER;
        vCommenterName TEXT;
        vNotifText TEXT;
        vCommentText TEXT;
    BEGIN
        SELECT content.creatorId, post.bandId, mb_user.name, content.text 
        INTO vPosterId, vBandId, vCommenterName, vCommentText 
        FROM comment
        JOIN post ON post.id = comment.postId
        JOIN content ON content.id = comment.contentId
        JOIN mb_user ON mb_user.id = content.creatorId
        WHERE comment.id = commentId;

        vNotifText := vCommenterName || ' commented your post: ' || vCommentText;
        CASE
            WHEN vBandId IS NOT NULL THEN
                PERFORM send_notification_to_band(vBandId, notifTriggerId, vNotifText);
            ELSE
                INSERT INTO user_notification(notificationTriggerId, userId, text) VALUES(notifTriggerId, vPosterId, vNotifText);
        END CASE;

    END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION insert_user_notifications_band_application(notifTriggerId INTEGER, bandApplicationId INTEGER)
RETURNS VOID AS $$
    DECLARE
        vSenderName TEXT;
        vBandName TEXT;
        vNotifText TEXT;
        vBandId INTEGER;
    BEGIN

        SELECT band_application.bandId, mb_user.name, band.name INTO vBandId, vSenderName, vBandName
        FROM band_application 
        JOIN mb_user ON band_application.userId = mb_user.id
        JOIN band ON band.id = band_application.bandId
        WHERE band_application.id = bandApplicationId;

        vNotifText := vSenderName || ' applied to ' || vBandName || '!';
        
        PERFORM send_notification_to_band(vBandId, notifTriggerId, vNotifText);

    END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION insert_user_notifications_band_application_updated(notifTriggerId INTEGER, bandApplicationId INTEGER)
RETURNS VOID AS $$
    DECLARE
        vReceiverId INTEGER;
        vBandName TEXT;
        vNotifText TEXT;
        vBandId INTEGER;
        vStatus BAND_APPLICATION_STATUS;

    BEGIN

        SELECT band_application.status, band_application.bandId, band_application.userId, band.name
        INTO vStatus, vBandId, vReceiverId, vBandName
        FROM band_application
        JOIN band ON band.id = band_application.bandId
        WHERE band_application.id = bandApplicationId;

        vNotifText := vBandName || ' ' || vStatus || ' your apply to join the band!';
    
        INSERT INTO user_notification(notificationTriggerId, userId, text) VALUES(notifTriggerId, vReceiverId, vNotifText);

    END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION insert_user_notifications_band_invitation(notifTriggerId INTEGER, bandInvitationId INTEGER)
RETURNS VOID AS $$
    DECLARE
        vReceiverId INTEGER;
        vBandName TEXT;
        vNotifText TEXT;
    BEGIN
        SELECT userId, band.name INTO vReceiverId, vBandName
        FROM band_invitation JOIN band
        ON band.id = band_invitation.bandId
        WHERE band_invitation.id = bandInvitationId;

        vNotifText := vBandName || ' invited you to join the band!';

        INSERT INTO user_notification(notificationTriggerId, userId, text) VALUES(notifTriggerId, vReceiverId, vNotifText);
    END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION insert_user_notifications_band_invitation_updated(notifTriggerId INTEGER, bandInvitationId INTEGER)
RETURNS VOID AS $$
    DECLARE
        vSenderName TEXT;
        vBandName TEXT;
        vNotifText TEXT;
        vBandId INTEGER;
        vStatus BAND_INVITATION_STATUS;
    BEGIN

        SELECT band_invitation.status, band_invitation.bandId, mb_user.name, band.name INTO vStatus, vBandId, vSenderName, vBandName
        FROM band_invitation 
        JOIN mb_user ON band_invitation.userId = mb_user.id
        JOIN band ON band.id = band_invitation.bandId
        WHERE band_invitation.id = bandInvitationId;

        vNotifText := vSenderName || ' ' || vStatus || ' your invitation to join ' || vBandName || '!';
        
        PERFORM send_notification_to_band(vBandId, notifTriggerId, vNotifText);

    END;
$$ LANGUAGE plpgsql;


CREATE OR REPLACE FUNCTION insert_user_notifications_warning(notifTriggerId INTEGER, warningId INTEGER)
RETURNS VOID AS $$
    DECLARE
        vUserId INTEGER;
        vBandId INTEGER;
        vNotifText TEXT;
        vReasonText TEXT;
    BEGIN
        SELECT warning.userId, warning.bandId, warning.reason 
        INTO vUserId, vBandId, vReasonText 
        FROM warning
        WHERE warning.id = warningId;

        vNotifText := 'Warning: ' || vReasonText;
        CASE
            WHEN vBandId IS NOT NULL THEN
                PERFORM send_notification_to_band(vBandId, notifTriggerId, vNotifText);
            ELSE
                INSERT INTO user_notification(notificationTriggerId, userId, text) VALUES(notifTriggerId, vUserId, vNotifText);
        END CASE;

    END;
$$ LANGUAGE plpgsql;


CREATE OR REPLACE FUNCTION trigger_user_notifications() RETURNS TRIGGER AS $$
    BEGIN
        CASE New.type
            WHEN 'user_follower' THEN
                PERFORM insert_user_notifications_user_follower(New.id, New.originUserFollower);
            WHEN 'band_follower' THEN
                PERFORM insert_user_notifications_band_follower(New.id, New.originBandFollower);
            WHEN 'message' THEN
                PERFORM insert_user_notifications_message(New.id, New.originMessage);
            WHEN 'comment' THEN
                PERFORM insert_user_notifications_comment(New.id, New.originComment);
            WHEN 'band_application' THEN
                PERFORM insert_user_notifications_band_application(New.id, New.originBandApplication);
            WHEN 'band_application_updated' THEN
                PERFORM insert_user_notifications_band_application_updated(New.id, New.originBandApplication);
            WHEN 'band_invitation' THEN
                PERFORM insert_user_notifications_band_invitation(New.id, New.originBandInvitation);
            WHEN 'band_invitation_updated' THEN
                PERFORM insert_user_notifications_band_invitation_updated(New.id, New.originBandInvitation);
            WHEN 'warning' THEN
                PERFORM insert_user_notifications_warning(New.id, New.originWarning);
            ELSE
                RAISE EXCEPTION 'Notification type invalid';
        END CASE;

        RETURN NEW;
    END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER trigger_user_notifications AFTER INSERT ON notification_trigger
    FOR EACH ROW EXECUTE PROCEDURE trigger_user_notifications();

/*****************************************************/
/*************** User Notification *******************/
/*****************************************************/



CREATE TABLE user_notification (

    notificationTriggerId INTEGER NOT NULL,
    userId INTEGER NOT NULL,
    visualizedDate DATE,
    text TEXT
);

ALTER TABLE ONLY user_notification
    ADD CONSTRAINT user_notification_pkey PRIMARY KEY (notificationTriggerId, userId);

ALTER TABLE ONLY user_notification
    ADD CONSTRAINT user_notification_notification_trigger_fkey FOREIGN KEY (notificationTriggerId) REFERENCES notification_trigger(id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE ONLY user_notification
    ADD CONSTRAINT user_notification_userId_fkey FOREIGN KEY (userId) REFERENCES mb_user(id) ON UPDATE CASCADE;


create index content_creator on content using hash(creatorId);

create index post_content on post using hash(contentId);
create index message_content on message using hash(contentId);
create index comment_content on comment using hash(contentId);

create index user_username on mb_user using hash(username);

--create index band_name on band using hash(name);

create index message_receiver on message using hash(receiverId);

create index report_content on report using hash(reportedContentId);

create index report_date on report using hash(date);

create index search_band on band using gist((
	setweight(to_tsvector('english', name), 'A') ||
	setweight(to_tsvector('english', bio), 'B')
));

CREATE INDEX search_user ON mb_user USING GIST ((
	setweight(to_tsvector('english', name), 'A') ||
	setweight(to_tsvector('english', bio), 'B')
));
