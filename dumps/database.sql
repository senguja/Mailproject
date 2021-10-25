create table customer
(
    id          int auto_increment
        primary key,
    vorname     varchar(50) charset utf8  null,
    nachname    varchar(50) charset utf8  null,
    description varchar(255) charset utf8 null,
    email       varchar(100) charset utf8 null
);

create table survey
(
    id   int unsigned auto_increment
        primary key,
    name varchar(127) not null
);

create table question
(
    id        int unsigned auto_increment
        primary key,
    question  varchar(127) not null,
    survey_id int unsigned not null,
    constraint question_survey_id_fk
        foreign key (survey_id) references survey (id)
);

create table answers
(
    id          int unsigned auto_increment
        primary key,
    answer      varchar(127) not null,
    question_id int unsigned not null,
    constraint answers_question_id_fk
        foreign key (question_id) references question (id)
);

create table user_answer
(
    id          int unsigned auto_increment
        primary key,
    answer      varchar(127) not null,
    user_id     int          not null,
    question_id int unsigned not null,
    constraint user_answer_customer_id_fk
        foreign key (user_id) references customer (id),
    constraint user_answer_question_id_fk
        foreign key (question_id) references question (id)
);

