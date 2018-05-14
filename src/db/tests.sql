EXPLAIN ANALYZE select report.text, report.reportType, 
    content.text as contentReportd, post.posterId, message.senderId, comment.commenterId,
    report.reportedUserId, report.reportedBandId
from report
left join content on content.id = report.reportedContentId
left join post on content.id = post.contentId
left join message on content.id = message.contentId
left join comment on content.id = comment.contentId;


select mb_user.id, content.text
from user_notification
join notification_trigger on notification_trigger.id = user_notification.notificationtriggerid
join warning on notification_trigger.originwarning = warning.id
join content on content.id = warning.contentid
join mb_user on user_notification.userid = mb_user.id
where content.id = 4;