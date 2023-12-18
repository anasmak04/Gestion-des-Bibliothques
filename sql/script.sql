drop table user

create table user (
                      id int primary key auto_increment,
                      name VARCHAR(50),
                      lastname VARCHAR(50),
                      email VARCHAR(50),
                      password VARCHAR(250),
                      phone VARCHAR(50),
                      budget double
);


create table role (
    id int primary key auto_increment,
    name VARCHAR(50)
);


create table userole (
    id_user int,
    id_role int ,
    primary key (id_user,id_role),
    foreign key (id_user) references user(id) on delete cascade,
    foreign key (id_role) references role(id) on delete cascade
)

