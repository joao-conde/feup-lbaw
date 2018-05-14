/* select01 */
select *
from mb_user
where mb_user.username = $username;

/* select02 */
select *
from mb_user
join user_skill
on mb_user.id = user_skill.userId
join skill
on skill.id = user_skill.skillId;

/* select03 */
select * from user_follower
join mb_user as users1
on users1.id = user_follower.followingUserId
join mb_user as users2
on user_follower.followedUserId = users2.id
and users2.username = $username;

/* select04 */
select * from user_follower
join mb_user as users1
on users1.id = user_follower.followedUserId
join mb_user as users2
on user_follower.followingUserId = users2.id
and users2.username = $username;

/* select05 */
select * from band_follower
join band
on band_follower.bandId = band.id
and band.name = $bandname
join mb_user
on band_follower.userId = mb_user.id;

/* select06 */
select * from band
join band_membership
on band.id = band_membership.bandId
join mb_user
on mb_user.username = $username and mb_user.id = band_membership.userId;

/* select07 */
select *
from band
join band_membership
on band.name = $bandname and band.id = band_membership.bandId
join mb_user
on mb_user.id = band_membership.userId;


/* select08 */
select *
from user_notification
where user_notification.userId = $userId;

/* select09 */
select *
from post
where post.posterId = $userId;

/* select10 */
select a.username
from mb_user a
where exists
(select b.username from mb_user b where a.username = b.username and a<b);

/* select11 */
select * from band 
join band_membership 
on band.id = band_membership.bandId and band.id like %$search_text%
join mb_user
on mb_user.id = band_membership.userId and band.id like %$search_text% or mb_user.id like %$search_text%;

/* select12 */
select * from post
join user_follower
on (post.posterId = user_follower.followedUserId join mb_user on user_follower.followingUserId = mb_user.id and mb_user.username = $username)
join band_follower
on (post.bandId = band_follower.bandId join mb_user on band_follower.userId = mb_user.id and mb_user.username = $username);

/* select13 */
select * from message
join mb_user a
on message.senderId = a.id and a.username = $username1
join mb_user b
on message.receiverId = b.id and b.username = $username2
join content
on message.contentId = content.id
order by content.date asc;

/* select14 */
select * from message
join mb_user
on message.senderId = mb_user.id and mb_user.username = $username
order by message.receiverId asc
join content
on message.contentId = content.id
order by content.date asc;

/*********************************
 ******* Queries de admin ********
 *********************************/

/* select15 */
select *
from content
join report
on report.reportedContentId = content.id
order by report.date;

/* select16 */
select *
from mb_user;

/* select17 */
select *
from band;

/*****************************
 *** Queries de band admin ***
 *****************************/

/* select18 */
select *
from post
join band
on post.bandId = band.id and band.name = $bandname;