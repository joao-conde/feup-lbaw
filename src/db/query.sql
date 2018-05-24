select * 
from user_follower 
where followinguserid = 32
AND followeduserid
IN (
    SELECT followinguserid
    FROM user_follower
    where followeduserid = 32
);