\c lbaw1712;


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

DROP TRIGGER IF EXISTS insert_notification_trigger_user_warning ON user_warning;
DROP FUNCTION  IF EXISTS insert_notification_trigger_user_warning();

DROP TRIGGER IF EXISTS insert_notification_trigger_band_warning ON band_warning;
DROP FUNCTION  IF EXISTS insert_notification_trigger_band_warning();

DROP TRIGGER IF EXISTS insert_notification_trigger_band_invitation_rejected ON band_invitation;
DROP FUNCTION  IF EXISTS insert_notification_trigger_band_invitation_rejected();

DROP TRIGGER IF EXISTS insert_notification_trigger_band_invitation_accepted ON band_invitation;
DROP FUNCTION  IF EXISTS insert_notification_trigger_band_invitation_accepted();

DROP TRIGGER IF EXISTS insert_notification_trigger_band_application_rejected ON band_application;
DROP FUNCTION  IF EXISTS insert_notification_trigger_band_application_rejected();

DROP TRIGGER IF EXISTS insert_notification_trigger_band_application_accepted ON band_application;
DROP FUNCTION  IF EXISTS insert_notification_trigger_band_application_accepted();



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
DROP TRIGGER IF EXISTS check_is_admin_band_warning ON band_warning;
DROP FUNCTION  IF EXISTS check_is_admin_band_warning();
DROP TABLE IF EXISTS band_warning CASCADE;
DROP TABLE IF EXISTS band_rating CASCADE;
DROP TABLE IF EXISTS band_membership CASCADE;
DROP TABLE IF EXISTS band_genre CASCADE;

DROP TRIGGER IF EXISTS check_is_admin_user_warning ON user_warning;
DROP FUNCTION  IF EXISTS check_is_admin_user_warning();
DROP TABLE IF EXISTS user_warning CASCADE;
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
    name TEXT NOT NULL
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

\i db/insertLocations.sql;

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
    admin BOOLEAN NOT NULL DEFAULT FALSE
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


CREATE FUNCTION is_admin (userId INTEGER)
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
    isActive BOOLEAN DEFAULT TRUE
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
    isActive BOOLEAN DEFAULT TRUE

);

ALTER TABLE ONLY content
    ADD CONSTRAINT content_pkey PRIMARY KEY (id);


/*****************************************************/
/***************** Post ******************************/
/*****************************************************/


CREATE TABLE post (

    id SERIAL NOT NULL,
    private BOOLEAN NOT NULL DEFAULT FALSE,
    contentId INTEGER NOT NULL,
    posterId INTEGER,
    bandId INTEGER
);

ALTER TABLE ONLY post
    ADD CONSTRAINT post_pkey PRIMARY KEY (id);

ALTER TABLE ONLY post
    ADD CONSTRAINT post_content_id_fkey FOREIGN KEY (contentId) REFERENCES content(id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE ONLY post
    ADD CONSTRAINT poster_id_fkey FOREIGN KEY (posterId) REFERENCES mb_user(id) ON UPDATE CASCADE;

ALTER TABLE ONLY post
    ADD CONSTRAINT post_band_id_fkey FOREIGN KEY (bandId) REFERENCES band(id) ON UPDATE CASCADE;


CREATE FUNCTION check_band_post() RETURNS trigger AS $check_band_post$
    BEGIN
       
        IF NEW.bandId IS NOT NULL THEN

            IF check_user_belongs_to_band(New.posterId, New.bandId) = FALSE THEN

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
    senderId INTEGER,
    receiverId INTEGER,
    bandId INTEGER
);

ALTER TABLE ONLY message
    ADD CONSTRAINT message_pkey PRIMARY KEY (id);

ALTER TABLE ONLY message
    ADD CONSTRAINT message_content_id_fkey FOREIGN KEY (contentId) REFERENCES content(id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE ONLY message
    ADD CONSTRAINT message_sender_id_fkey FOREIGN KEY (senderId) REFERENCES mb_user(id) ON UPDATE CASCADE;

ALTER TABLE ONLY message
    ADD CONSTRAINT message_receiver_id_fkey FOREIGN KEY (receiverId) REFERENCES mb_user(id) ON UPDATE CASCADE;

ALTER TABLE ONLY message
    ADD CONSTRAINT message_band_id_fkey FOREIGN KEY (bandId) REFERENCES band(id) ON UPDATE CASCADE;


CREATE FUNCTION check_user_belongs_to_band(userIdToCheck Integer, bandIdToCheck Integer) RETURNS BOOLEAN AS $$
    
    DECLARE result BOOLEAN;

    BEGIN
       
        SELECT EXISTS (SELECT band.id FROM band JOIN band_membership ON band.id = band_membership.bandId WHERE band.id = bandIdToCheck AND band_membership.userId = userIdToCheck) INTO result;
        
        RETURN result;

    END;

$$ LANGUAGE plpgsql;


CREATE FUNCTION check_band_message() RETURNS trigger AS $check_band_message$
    BEGIN
       
        IF NEW.bandId IS NOT NULL THEN

            IF check_user_belongs_to_band(New.senderId, New.bandId) = FALSE THEN

                RAISE EXCEPTION 'this user does not belong to the band';

            END IF;

        END IF;

    
        RETURN NEW;

    END;

$check_band_message$ LANGUAGE plpgsql;

CREATE TRIGGER check_band_message BEFORE INSERT OR UPDATE ON message
    FOR EACH ROW EXECUTE PROCEDURE check_band_message();


CREATE FUNCTION check_xor_message_destination() RETURNS trigger AS $check_xor_message_destination$
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


CREATE FUNCTION insert_notification_trigger_message() RETURNS trigger AS $$
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
    commenterId INTEGER,
    postId INTEGER
);

ALTER TABLE ONLY comment
    ADD CONSTRAINT comment_pkey PRIMARY KEY (id);

ALTER TABLE ONLY comment
    ADD CONSTRAINT comment_content_id_fkey FOREIGN KEY (contentId) REFERENCES content(id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE ONLY comment
    ADD CONSTRAINT commenter_id_fkey FOREIGN KEY (commenterId) REFERENCES mb_user(id) ON UPDATE CASCADE;

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

CREATE FUNCTION check_is_admin_genre() RETURNS trigger AS $check_is_admin_genre$
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

CREATE FUNCTION check_is_admin_skill() RETURNS trigger AS $check_is_admin_skill$
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
    reporterUserId INTEGER
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


CREATE FUNCTION check_xor_report_type() RETURNS trigger AS $check_xor_report_type$
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
    bandId INTEGER
);

ALTER TABLE ONLY ban
    ADD CONSTRAINT ban_pkey PRIMARY KEY (id);

ALTER TABLE ONLY ban
    ADD CONSTRAINT admin_id_fkey FOREIGN KEY (adminId) REFERENCES mb_user(id) ON UPDATE CASCADE;

ALTER TABLE ONLY ban
    ADD CONSTRAINT band_id_fkey FOREIGN KEY (bandId) REFERENCES band(id) ON UPDATE CASCADE;

ALTER TABLE ONLY ban
    ADD CONSTRAINT user_id_fkey FOREIGN KEY (userId) REFERENCES mb_user(id) ON UPDATE CASCADE;

CREATE FUNCTION check_is_admin_ban() RETURNS trigger AS $check_is_admin_ban$
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

CREATE FUNCTION check_xor_user_band() RETURNS trigger AS $check_xor_user_band$
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
    level INTEGER NOT NULL,
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


CREATE FUNCTION insert_notification_trigger_user_follower() RETURNS trigger AS $$
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
/******************* User Warning ********************/
/*****************************************************/



CREATE TABLE user_warning (

    id SERIAL NOT NULL,
    adminId INTEGER NOT NULL,
    userId INTEGER NOT NULL

);

ALTER TABLE ONLY user_warning
    ADD CONSTRAINT user_warning_pkey PRIMARY KEY (id);

ALTER TABLE ONLY user_warning
    ADD CONSTRAINT user_warning_adminId_fkey FOREIGN KEY (adminId) REFERENCES mb_user(id) ON UPDATE CASCADE;

ALTER TABLE ONLY user_warning
    ADD CONSTRAINT user_warning_userId_fkey FOREIGN KEY (userId) REFERENCES mb_user(id) ON UPDATE CASCADE;

CREATE FUNCTION check_is_admin_user_warning() RETURNS trigger AS $check_is_admin_user_warning$
    BEGIN
        --Check if user is an admin--
        IF NOT is_admin(NEW.adminId) THEN
            RAISE EXCEPTION 'User is not an Admin';
        END IF;

        RETURN NEW;

    END;
$check_is_admin_user_warning$ LANGUAGE plpgsql;

CREATE TRIGGER check_is_admin_user_warning BEFORE INSERT OR UPDATE ON user_warning
    FOR EACH ROW EXECUTE PROCEDURE check_is_admin_user_warning();


CREATE OR REPLACE FUNCTION insert_notification_trigger_user_warning() RETURNS trigger AS $$
    BEGIN
       
        INSERT INTO notification_trigger(type,originUserWarning) VALUES('user_warning',New.id);
        RETURN NEW;

    END;
    
$$ LANGUAGE plpgsql;

CREATE TRIGGER insert_notification_trigger_user_warning AFTER INSERT ON user_warning
    FOR EACH ROW EXECUTE PROCEDURE insert_notification_trigger_user_warning();

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
/******************* Band Warning ********************/
/*****************************************************/


CREATE TABLE band_warning (

    id SERIAL NOT NULL,
    adminId INTEGER NOT NULL,
    bandId INTEGER NOT NULL

);

ALTER TABLE ONLY band_warning
    ADD CONSTRAINT band_warning_pkey PRIMARY KEY (id);

ALTER TABLE ONLY band_warning
    ADD CONSTRAINT band_warning_adminId_fkey FOREIGN KEY (adminId) REFERENCES mb_user(id) ON UPDATE CASCADE;

ALTER TABLE ONLY band_warning
    ADD CONSTRAINT band_warning_userId_fkey FOREIGN KEY (bandId) REFERENCES band(id) ON UPDATE CASCADE;

CREATE FUNCTION check_is_admin_band_warning() RETURNS trigger AS $check_is_admin_band_warning$
    BEGIN
        --Check if user is an admin--
        IF NOT is_admin(NEW.adminId) THEN
            RAISE EXCEPTION 'User is not an Admin';
        END IF;

        RETURN NEW;

    END;
$check_is_admin_band_warning$ LANGUAGE plpgsql;

CREATE TRIGGER check_is_admin_band_warning BEFORE INSERT OR UPDATE ON band_warning
    FOR EACH ROW EXECUTE PROCEDURE check_is_admin_band_warning();


CREATE OR REPLACE FUNCTION insert_notification_trigger_band_warning() RETURNS trigger AS $$
    BEGIN
       
        INSERT INTO notification_trigger(type,originBandWarning) VALUES('band_warning',New.id);
        RETURN NEW;

    END;
    
$$ LANGUAGE plpgsql;

CREATE TRIGGER insert_notification_trigger_band_warning AFTER INSERT ON band_warning
    FOR EACH ROW EXECUTE PROCEDURE insert_notification_trigger_band_warning();


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


CREATE FUNCTION insert_notification_trigger_band_follower() RETURNS trigger AS $$
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
    lastStatusDate DATE,
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

CREATE OR REPLACE FUNCTION insert_notification_trigger_band_application_accepted() RETURNS trigger AS $$
    BEGIN
       
        IF NEW.status = 'accepted' THEN
            INSERT INTO notification_trigger(type,originBandApplication) VALUES('band_application_accepted',New.id);
        END IF;

        RETURN NEW;

    END;
    
$$ LANGUAGE plpgsql;

CREATE TRIGGER insert_notification_trigger_band_application_accepted AFTER UPDATE ON band_application
    FOR EACH ROW EXECUTE PROCEDURE insert_notification_trigger_band_application_accepted();

CREATE OR REPLACE FUNCTION insert_notification_trigger_band_application_rejected() RETURNS trigger AS $$
    BEGIN
       
        IF NEW.status = 'rejected' THEN
            INSERT INTO notification_trigger(type,originBandApplication) VALUES('band_application_rejected',New.id);
        END IF;

        RETURN NEW;

    END;
    
$$ LANGUAGE plpgsql;

CREATE TRIGGER insert_notification_trigger_band_application_rejected AFTER UPDATE ON band_application
    FOR EACH ROW EXECUTE PROCEDURE insert_notification_trigger_band_application_rejected();

/*****************************************************/
/******************* Band Invitation *****************/
/*****************************************************/



CREATE TYPE BAND_INVITATION_STATUS AS ENUM ('canceled', 'pending', 'accepted', 'rejected');

CREATE TABLE band_invitation(

    id SERIAL NOT NULL,
    userId INTEGER NOT NULL,
    bandId INTEGER NOT NULL,
    date TIMESTAMP DEFAULT now(),
    lastStatusDate DATE,
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

CREATE OR REPLACE FUNCTION insert_notification_trigger_band_invitation_accepted() RETURNS trigger AS $$
    BEGIN
       
        IF NEW.status = 'accepted' THEN
            INSERT INTO notification_trigger(type,originBandInvitation) VALUES('band_invitation_accepted',New.id);
        END IF;

        RETURN NEW;

    END;
    
$$ LANGUAGE plpgsql;

CREATE TRIGGER insert_notification_trigger_band_invitation_accepted AFTER UPDATE ON band_invitation
    FOR EACH ROW EXECUTE PROCEDURE insert_notification_trigger_band_invitation_accepted();

CREATE OR REPLACE FUNCTION insert_notification_trigger_band_invitation_rejected() RETURNS trigger AS $$
    BEGIN
       
        IF NEW.status = 'rejected' THEN
            INSERT INTO notification_trigger(type,originBandInvitation) VALUES('band_invitation_rejected',New.id);
        END IF;

        RETURN NEW;

    END;
    
$$ LANGUAGE plpgsql;

CREATE TRIGGER insert_notification_trigger_band_invitation_rejected AFTER UPDATE ON band_invitation
    FOR EACH ROW EXECUTE PROCEDURE insert_notification_trigger_band_invitation_rejected();

/*****************************************************/
/************ Notification Trigger *******************/
/*****************************************************/



CREATE TYPE NOTIFICATION_TYPE AS ENUM (
    'user_follower', 'band_follower', 'message', 'comment', 'band_application',
    'band_invitation', 'user_warning', 'band_warning', 'band_invitation_accepted',
    'band_invitation_rejected', 'band_application_accepted', 'band_application_rejected');

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
    originUserWarning INTEGER,
    originBandWarning INTEGER
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
    ADD CONSTRAINT notification_trigger_origin_user_warning_fkey FOREIGN KEY (originUserWarning) REFERENCES user_warning(id) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE ONLY notification_trigger
    ADD CONSTRAINT notification_trigger_origin_band_warning_fkey FOREIGN KEY (originBandWarning) REFERENCES band_warning(id) ON UPDATE CASCADE ON DELETE CASCADE;


CREATE FUNCTION check_xor_notification_origin() RETURNS trigger AS $check_xor_notification_origin$
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

        IF NEW.type = 'band_invitation' AND NEW.originBandInvitation IS NULL THEN
            RAISE EXCEPTION 'type band invitation without band invitation Id';
        END IF;

        IF NEW.type = 'user_warning' AND NEW.originUserWarning IS NULL THEN
            RAISE EXCEPTION 'type user warning without origin user warning id';
        END IF;

        IF NEW.TYPE = 'band_warning' AND NEW.originBandWarning IS NULL THEN
            RAISE EXCEPTION 'type band warning without band warning Id';
        END IF;

        IF NEW.TYPE = 'band_invitation_accepted' AND NEW.originBandInvitation IS NULL THEN
            RAISE EXCEPTION 'type band invitation accepted without band inivitation Id';
        END IF;

         IF NEW.TYPE = 'band_invitation_rejected' AND NEW.originBandInvitation IS NULL THEN
            RAISE EXCEPTION 'type band invitation rejected without band inivitation Id';
        END IF;

        IF NEW.TYPE = 'band_application_accepted' AND NEW.originBandApplication IS NULL THEN
            RAISE EXCEPTION 'type band application accepted without band application Id';
        END IF;

        IF NEW.TYPE = 'band_application_rejected' AND NEW.originBandApplication IS NULL THEN
            RAISE EXCEPTION 'type band application accepted without band application Id';
        END IF;

        RETURN NEW;

    END;
$check_xor_notification_origin$ LANGUAGE plpgsql;

CREATE TRIGGER check_xor_notification_origin BEFORE INSERT OR UPDATE ON notification_trigger
    FOR EACH ROW EXECUTE PROCEDURE check_xor_notification_origin();

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
