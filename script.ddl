--@(#) script.ddl

CREATE TABLE informacines_sistema.Employee
(
	email varchar,
	firstName varchar,
	lastName varchar,
	workingSince date,
	id_Employee integer,
	PRIMARY KEY(id_Employee)
);

CREATE TABLE informacines_sistema.Item
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

CREATE TABLE informacines_sistema.User
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

CREATE TABLE informacines_sistema.Contacts
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
	CONSTRAINT Creates FOREIGN KEY(fk_Userid_User) REFERENCES informacines_sistema.User (id_User)
);

CREATE TABLE informacines_sistema.employee_evaluation
(
	stars int,
	comment varchar,
	id_employee_evaluation integer,
	fk_Employeeid_Employee integer NOT NULL,
	fk_Userid_User integer NOT NULL,
	PRIMARY KEY(id_employee_evaluation),
	CONSTRAINT Evaluates FOREIGN KEY(fk_Employeeid_Employee) REFERENCES informacines_sistema.Employee (id_Employee),
	CONSTRAINT Creates FOREIGN KEY(fk_Userid_User) REFERENCES informacines_sistema.User (id_User)
);

CREATE TABLE informacines_sistema.Item_replenishment
(
	item_replenishment_number int,
	date timestamp,
	quantity int,
	id_Item_replenishment integer,
	fk_Itemid_Item integer NOT NULL,
	fk_Employeeid_Employee integer NOT NULL,
	PRIMARY KEY(id_Item_replenishment),
	CONSTRAINT Registers FOREIGN KEY(fk_Itemid_Item) REFERENCES informacines_sistema.Item (id_Item),
	CONSTRAINT Creates FOREIGN KEY(fk_Employeeid_Employee) REFERENCES informacines_sistema.Employee (id_Employee)
);

CREATE TABLE informacines_sistema.repair_document
(
	repair_description varchar,
	item_status char (20),
	id_repair_document integer,
	fk_Userid_User integer NOT NULL,
	fk_Itemid_Item integer NOT NULL,
	fk_Employeeid_Employee integer NOT NULL,
	CHECK(item_status in ('waiting_for_approval', 'rejected', ' in_progress', 'completed')),
	PRIMARY KEY(id_repair_document),
	UNIQUE(fk_Itemid_Item),
	CONSTRAINT Creates FOREIGN KEY(fk_Userid_User) REFERENCES informacines_sistema.User (id_User),
	CONSTRAINT Registers FOREIGN KEY(fk_Itemid_Item) REFERENCES informacines_sistema.Item (id_Item),
	CONSTRAINT Approves FOREIGN KEY(fk_Employeeid_Employee) REFERENCES informacines_sistema.Employee (id_Employee)
);

CREATE TABLE informacines_sistema.Support
(
	question varchar,
	id_Support integer,
	fk_Userid_User integer NOT NULL,
	PRIMARY KEY(id_Support),
	CONSTRAINT Gets FOREIGN KEY(fk_Userid_User) REFERENCES informacines_sistema.User (id_User)
);

CREATE TABLE informacines_sistema.Order
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
	fk_repair_documentid_repair_document integer NOT NULL,
	fk_Userid_User integer NOT NULL,
	CHECK(status in ('waiting_for_payment', 'rejected', 'completed')),
	PRIMARY KEY(id_Order),
	CONSTRAINT Includes FOREIGN KEY(fk_repair_documentid_repair_document) REFERENCES informacines_sistema.repair_document (id_repair_document),
	CONSTRAINT Creates FOREIGN KEY(fk_Userid_User) REFERENCES informacines_sistema.User (id_User)
);

CREATE TABLE informacines_sistema.delivery
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
	CONSTRAINT Includes FOREIGN KEY(fk_Orderid_Order) REFERENCES informacines_sistema.Order (id_Order)
);

CREATE TABLE informacines_sistema.item_evaluation
(
	stars int,
	comment varchar,
	id_item_evaluation integer,
	fk_Itemid_Item integer NOT NULL,
	fk_Orderid_Order integer NOT NULL,
	PRIMARY KEY(id_item_evaluation),
	CONSTRAINT Evaluates FOREIGN KEY(fk_Itemid_Item) REFERENCES informacines_sistema.Item (id_Item),
	CONSTRAINT Creates FOREIGN KEY(fk_Orderid_Order) REFERENCES informacines_sistema.Order (id_Order)
);

CREATE TABLE informacines_sistema.payment
(
	payment_number int,
	amount double precision,
	payment_date timestamp,
	id_payment integer,
	fk_Orderid_Order integer NOT NULL,
	PRIMARY KEY(id_payment),
	CONSTRAINT Receives FOREIGN KEY(fk_Orderid_Order) REFERENCES informacines_sistema.Order (id_Order)
);
