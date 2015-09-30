use dedecms;
create table if not exists tbl_types(
	id smallint unsigned auto_increment not null primary key,
	name varchar(300) not null default '' comment '类型名称',
	content varchar(1000) not null default '' comment '备注'
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

create table if not exists tbl_options(
	id mediumint unsigned not null auto_increment primary key,
	`type` smallint unsigned not null default 0 comment '类型',
	name varchar(300) not null default '' comment '选项名称',
	status tinyint unsigned not null default 1 comment '是否可用 0-不可用 1-可用',
	index(`type`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

create table if not exists tbl_table(
	id smallint unsigned auto_increment not null primary key,
	tablename varchar(20) not null default '' comment '表格英文名，用于创建表格用，只能用大小写字母',
	`type` tinyint unsigned not null default 0 comment '表格类型 0-A类表 1-B类表',
	`name` varchar(300) not null default '' comment '表格名称'
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

create table if not exists tbl_field(
	id mediumint unsigned auto_increment not null primary key,
	`table` smallint unsigned not null default 0 comment '所属表',
	`name` varchar(300) not null default '' comment '字段名称',
	`type` tinyint unsigned not null default 0 comment '字段类型 0-非字段 1-文本 2-数值 3-选择 4-文件 5-外键',
	`display` tinyint unsigned not null default 0 comment '外观	0-非字段 1-不显示 2-半行 3-整行',
	`value` varchar(300) not null default '' comment '如果是选择型，对应类型的名字; 如果是外键，对应查询语句',
	`search` tinyint unsigned not null default 0 comment '是否是查询字段 0-不是查询 非零-查询，且按照数字顺序升序排列',
	`inlist` tinyint unsigned not null default 0 comment '是否出现在列表中 0-不出现 非零-出现，且按照数字顺序升序排列',
	index(`table`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

create table if not exists tbl_audit(
	id mediumint unsigned auto_increment not null primary key,
	`type` tinyint unsigned not null default 0 comment '所属类别 0-手续办理 1-团组出行 2-总结成果',
	`name` varchar(300) not null default '' comment '审核内容',
	index(`type`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

create table if not exists tbl_auditoption(
	id int unsigned auto_increment not null primary key,
	audit mediumint unsigned not null default 0 comment '所对应的审核',
	`name` varchar(300) not null default '' comment '审核条目',
	`type` tinyint unsigned not null default 0 comment '是否分人 0-不分  1-分',
	index(audit)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

create table if not exists tbl_project_auditoption(
	id int unsigned auto_increment not null primary key,
	`project` int unsigned not null default 0 comment '对应的项目',
	auditoption int unsigned not null default 0 comment '审核条目',
	`value` varchar(4000) not null default '' comment '内容',
	isAudit	tinyint unsigned not null default 0 comment '是否已审核',
	isConfirm	tinyint unsigned not null default 0 comment '是否已复核',
	index(`project`),
	index(auditoption)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

create table if not exists tbl_project(
	id int unsigned auto_increment not null primary key,
	`name` varchar(300) not null default '' comment '项目名称',
	adder int unsigned not null default 0 comment '主办人',
	auditer int unsigned not null default 0 comment '审核人',
	confirmer int unsigned not null default 0 comment '复核人'
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

create table if not exists tbl_student(
	id int unsigned auto_increment not null primary key,
	`name` varchar(300) not null default '' comment '姓名'
)ENGINE=MyISAM DEFAULT CHARSET=utf8;


create table if not exists tbl_project_student(
	id int unsigned auto_increment not null primary key,
	project int unsigned not null default 0 comment '项目',
	student int unsigned not null default 0 comment '学员',
	index(project),
	index(student)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

create table if not exists tbl_userright(
	id int unsigned auto_increment not null primary key,
	mid int unsigned not null default 0 comment '会员',
	`type` tinyint unsigned not null default 0 comment '类型 0-主办人 1-审核人 2-复核人',
	index(mid)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;
