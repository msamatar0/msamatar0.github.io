drop table if exists bbusers;
create table bbusers(
  email varchar(50),
  name varchar(30),
  password varchar(30),
  nickname varchar(30),
  primary key (email)
);

drop table if exists postings;
create table postings(
  postId integer(5),
  postDate datetime,
  postedBy varchar(50),
  postSubject varchar(100),
  content varchar(512),
  ancestorPath varchar(100),
  primary key (postId),
  foreign key (postedBy) references bbusers
);

insert into bbusers values(
  "root@something.io",
  "root",
  "root",
  "me"
);

insert into bbusers values(
  "mohamedsamatar100@gmail.com",
  "msamatar0",
  "Mohamed1995",
  "Mo"
);

insert into postings values(
  1,
  now(),
  "root",
  "The First Post ever Made, Ever",
  "hi",
  1
);
