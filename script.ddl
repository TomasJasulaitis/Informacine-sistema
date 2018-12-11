--@(#) script.ddl

CREATE TABLE 2 Esybiu_rysiai.Employee
(
	email varchar,
	firstName varchar,
	lastName varchar,
	workingSince date,
	id_Employee integer,
	PRIMARY KEY(id_Employee)
);

CREATE TABLE 2 Esybiu_rysiai.Item
(
	name varchar,
	count int,
	unit_price double precision,
	short_description varchar,
	category char (12),
	id_Item integer,
	CHECK(category in ('mobile_phone', 'part', 'accessory')),
	PRIMARY KEY(id_Item)
);



CREATE TABLE 2 Esybiu_rysiai.User
(
	email varchar,
	password varchar,
	emailVerified varchar,
	emailVerificationToken varchar,
	passwordRecoveryToken varchar,
	firstName varchar,
	lastName varchar,
	phoneNumber varchar,
	id_User integer,
	PRIMARY KEY(id_User)
);


CREATE TABLE 2 Esybiu_rysiai.Vartotoju_duomenys
(
	vardas,
	pavarde,
	telefono_nr,
	id_Vartotoj?_duomenys integer,
	PRIMARY KEY(id_Vartotoj?_duomenys)
);

CREATE TABLE 2 Esybiu_rysiai.Contacts
(
	first_name,
	last_name,
	phone_number,
	location,
	work_hours_start,
	work_hours_finish,
	id_Contacts integer,
	fk_Userid_User integer NOT NULL,
	PRIMARY KEY(id_Contacts),
	UNIQUE(fk_Userid_User),
	CONSTRAINT Creates FOREIGN KEY(fk_Userid_User) REFERENCES 2 Esybiu_rysiai.User (id_User)
);

CREATE TABLE 2 Esybiu_rysiai.employee_evaluation
(
	stars int,
	comment varchar,
	id_employee_evaluation integer,
	fk_Userid_User integer NOT NULL,
	fk_Employeeid_Employee integer NOT NULL,
	PRIMARY KEY(id_employee_evaluation),
	CONSTRAINT Creates FOREIGN KEY(fk_Userid_User) REFERENCES 2 Esybiu_rysiai.User (id_User),
	CONSTRAINT Evaluates FOREIGN KEY(fk_Employeeid_Employee) REFERENCES 2 Esybiu_rysiai.Employee (id_Employee)
);

CREATE TABLE 2 Esybiu_rysiai.Item_replenishment
(
	item_replenishment_number int,
	date timestamp,
	quantity int,
	id_Item_replenishment integer,
	fk_Itemid_Item integer NOT NULL,
	fk_Employeeid_Employee integer NOT NULL,
	PRIMARY KEY(id_Item_replenishment),
	CONSTRAINT Registers FOREIGN KEY(fk_Itemid_Item) REFERENCES 2 Esybiu_rysiai.Item (id_Item),
	CONSTRAINT Creates FOREIGN KEY(fk_Employeeid_Employee) REFERENCES 2 Esybiu_rysiai.Employee (id_Employee)
);

CREATE TABLE 2 Esybiu_rysiai.repair_document
(
	repair_description varchar,
	item_status char (20),
	id_repair_document integer,
	fk_Itemid_Item integer NOT NULL,
	fk_Employeeid_Employee integer NOT NULL,
	fk_Userid_User integer NOT NULL,
	CHECK(item_status in ('waiting_for_approval', 'rejected', ' in_progress', 'completed')),
	PRIMARY KEY(id_repair_document),
	UNIQUE(fk_Itemid_Item),
	CONSTRAINT Registers FOREIGN KEY(fk_Itemid_Item) REFERENCES 2 Esybiu_rysiai.Item (id_Item),
	CONSTRAINT Approves FOREIGN KEY(fk_Employeeid_Employee) REFERENCES 2 Esybiu_rysiai.Employee (id_Employee),
	CONSTRAINT Creates FOREIGN KEY(fk_Userid_User) REFERENCES 2 Esybiu_rysiai.User (id_User)
);

CREATE TABLE 2 Esybiu_rysiai.Support
(
	question varchar,
	id_Support integer,
	fk_Userid_User integer NOT NULL,
	PRIMARY KEY(id_Support),
	CONSTRAINT Gets FOREIGN KEY(fk_Userid_User) REFERENCES 2 Esybiu_rysiai.User (id_User)
);

CREATE TABLE 2 Esybiu_rysiai.Order
(
	document_date timestamp,
	order_additional_information varchar,
	VAT_customer_code int,
	delivery_country varchar,
	delivery_city varchar,
	delivery_street varchar,
	delivery_number varchar,
	delivery_zip_code int,
	price double precision,
	status char (19),
	id_Order integer,
	fk_Userid_User integer NOT NULL,
	fk_repair_documentid_repair_document integer NOT NULL,
	CHECK(status in ('waiting_for_payment', 'rejected', 'completed')),
	PRIMARY KEY(id_Order),
	CONSTRAINT Creates FOREIGN KEY(fk_Userid_User) REFERENCES 2 Esybiu_rysiai.User (id_User),
	CONSTRAINT Includes FOREIGN KEY(fk_repair_documentid_repair_document) REFERENCES 2 Esybiu_rysiai.repair_document (id_repair_document)
);

CREATE TABLE 2 Esybiu_rysiai.delivery
(
	company_name varchar,
	courier_name varchar,
	courier_surname varchar,
	company_code int,
	additional_information varchar,
	price double precision,
	id_delivery integer,
	fk_Orderid_Order integer NOT NULL,
	PRIMARY KEY(id_delivery),
	UNIQUE(fk_Orderid_Order),
	CONSTRAINT Includes FOREIGN KEY(fk_Orderid_Order) REFERENCES 2 Esybiu_rysiai.Order (id_Order)
);

CREATE TABLE 2 Esybiu_rysiai.item_evaluation
(
	stars int,
	comment varchar,
	id_item_evaluation integer,
	fk_Orderid_Order integer NOT NULL,
	fk_Itemid_Item integer NOT NULL,
	PRIMARY KEY(id_item_evaluation),
	CONSTRAINT Creates FOREIGN KEY(fk_Orderid_Order) REFERENCES 2 Esybiu_rysiai.Order (id_Order),
	CONSTRAINT Evaluates FOREIGN KEY(fk_Itemid_Item) REFERENCES 2 Esybiu_rysiai.Item (id_Item)
);

CREATE TABLE 2 Esybiu_rysiai.payment
(
	payment_number int,
	amount double precision,
	payment_date timestamp,
	id_payment integer,
	fk_Orderid_Order integer NOT NULL,
	PRIMARY KEY(id_payment),
	CONSTRAINT Receives FOREIGN KEY(fk_Orderid_Order) REFERENCES 2 Esybiu_rysiai.Order (id_Order)
);
