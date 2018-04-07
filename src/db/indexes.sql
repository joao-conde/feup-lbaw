create index user_post on post using hash(posterId);

create index user_username on user using hash(username);

create index band_name on band using hash(name);

create index message_sender on message using hash(senderId);

create index message_receiver on message using hash(receiverId);

create index report_content on report using hash(reportedContentId);

create index report_date on report using hash(date);

/* IDX02 para query select06 */
create index search_band on band using gist((
	setweight(to_tsvector('english', name), 'A') ||
	setweight(to_tsvector('english', description), 'B')
));

/* IDX03 para query select06 */
CREATE INDEX search_user ON mb_user USING GIST ((
	setweight(to_tsvector('english', username), 'A') ||
	setweight(to_tsvector('english', name), 'A') ||
	setweight(to_tsvector('english', bio), 'B')
));
