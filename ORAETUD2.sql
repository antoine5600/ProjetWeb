/* Use these lines to drop former tables*/

/*drop table Product_category;
drop table Client_addr;
drop table Favorites;
drop table Command;
drop table Product_quantity;
drop table Product_list;
drop table Categories;
drop table Products;
drop table Mods;
drop table Admins;
drop table Clients;
drop table Users;
drop table Addresses;*/


/* Physical geographic postal addresses for facturation and delivery. 
		- * id_addr: 	Primary key, auto-generated
		- Street: 		Number and name of street
		- Additional:	Additional information for address, like number of building or floor
		- Postcode:		For countries using one, postcode as an integer
		- City: 		Name of city
		- Country:		Name of state
		
	TABLES LINKED:
		Client_addr, 
		Command
*/
create table Addresses( id_addr integer NOT NULL AUTO_INCREMENT, 
                        Street Nvarchar(128), 
                        Additional Nvarchar(128), 
                        Postcode integer, 
                        City Nvarchar(64), 
                        Country Nvarchar(64),
                        CONSTRAINT PK_addr PRIMARY KEY (id_addr)
);


/* Users and personal users information
		- * id_usr: 			Primary key, auto-generated
		- * Name: 				Name of the user
		- * First_name:			First Name of the user
		- * Mail:				Used to log in and for contact purposes
		- * Psswd: 				Encrypted password for authentication
		- Telephone:			Useful for contact purposes and delivery problems
		- * User_permission: 	4 levels of permission, 0:Undefined, 1:Client, 2:Moderator, 3:Administrator
		- User_sex:				User genre (usually M or F), if needed for statistic purposes
		- User_Bday:			Birthday of the User, if needed for statistics or legislation
		- Salt:					Unique string used to further encrypt the password.
		
	TABLES LINKED:
		Client_addr, 
		Command,
		Favorites
*/
create table Users( id_usr integer NOT NULL AUTO_INCREMENT, 
                    Name Nvarchar(128) NOT NULL, 
                    First_name Nvarchar(128) NOT NULL, 
                    Mail Nvarchar(128) NOT NULL UNIQUE, 
                    Psswd char(128) NOT NULL,
                    Telephone Nvarchar(12),
					User_permission integer NOT NULL,
					User_sex char(1),
					User_Bday date,
					Salt UNIQUEIDENTIFIER,
                    CONSTRAINT PK_usr PRIMARY KEY (id_usr),
					CONSTRAINT CHK_usr CHECK (User_permission<=3 AND User_permission>=0)
);


create table Products(  id_prod integer NOT NULL AUTO_INCREMENT, 
                        Name Nvarchar(256), 
						Description Nvarchar(512),
                        Price real, 
                        Stock integer, 
                        Sales real,
                        CONSTRAINT PK_prod PRIMARY KEY (id_prod),
                        CONSTRAINT CHK_prod CHECK (Price >= 0)
);


create table Categories(    id_cat integer NOT NULL AUTO_INCREMENT, 
                            Name Nvarchar(64), 
							Description Nvarchar(512),
                            parent_category integer,
                            CONSTRAINT PK_cat PRIMARY KEY (id_cat),
                            CONSTRAINT FK_cat FOREIGN KEY (parent_category) REFERENCES Categories(id_cat)
);


create table Product_list(  id_list integer NOT NULL AUTO_INCREMENT,
                            CONSTRAINT PK_list PRIMARY KEY (id_list)
);


create table Product_quantity(  list integer NOT NULL, 
                                product integer NOT NULL, 
                                Quantity integer,
                                CONSTRAINT PK_prod_qty PRIMARY KEY (list,product),
                                CONSTRAINT FK_prod_qty_list FOREIGN KEY (list) REFERENCES Product_list(id_list),
                                CONSTRAINT FK_prod_qty_prod FOREIGN KEY (product) REFERENCES Products(id_prod),
                                CONSTRAINT CHK_prod_qty CHECK (Quantity>=0)
);


create table Command(   id_command integer NOT NULL AUTO_INCREMENT, 
                        Delivery_addr integer, 
                        Payment_addr integer,
                        Client integer,
                        CONSTRAINT PK_command PRIMARY KEY (id_command),
                        CONSTRAINT FK_command_delivery FOREIGN KEY (Delivery_addr) REFERENCES Addresses(id_addr),
                        CONSTRAINT FK_command_payment FOREIGN KEY (Payment_addr) REFERENCES Addresses(id_addr),
                        CONSTRAINT FK_command_client FOREIGN KEY (Client) REFERENCES Clients(id_client)
);


create table Favorites( id_fav integer NOT NULL AUTO_INCREMENT, 
                        Client integer,
                        CONSTRAINT PK_fav PRIMARY KEY (id_fav),
                        CONSTRAINT FK_fav FOREIGN KEY (Client) REFERENCES Clients(id_client)
);


create table Client_addr(   Client integer NOT NULL, 
                            Address integer NOT NULL,
							Name Nvarchar(64),
                            CONSTRAINT PK_client_addr PRIMARY KEY (Client, Address),
                            CONSTRAINT FK_client_addr_c FOREIGN KEY (Client) REFERENCES Clients(id_client),
                            CONSTRAINT FK_client_addr_a FOREIGN KEY (Address) REFERENCES Addresses(id_addr)
);


create table Product_category(  Product integer NOT NULL,
                                Category integer NOT NULL,
                                CONSTRAINT PK_prod_cat PRIMARY KEY (Product, Category),
                                CONSTRAINT FK_prod_cat_p FOREIGN KEY (Product) REFERENCES Products(id_prod),
                                CONSTRAINT FK_prod_cat_c FOREIGN KEY (Category) REFERENCES Categories(id_cat)
);


create unique index I_passwords on Users (Mail, Psswd);
create index I_products on Product_category (Product);
create index I_passwords on Product_quantity (list);


CREATE TRIGGER before_insert_commande BEFORE INSERT
ON Command FOR EACH ROW
BEGIN
	INSERT INTO Product_list VALUES(NEW.id_command)
END

CREATE TRIGGER before_insert_fav BEFORE INSERT
ON Favorites FOR EACH ROW
BEGIN
	INSERT INTO Product_list VALUES(NEW.id_fav)
END


CREATE PROCEDURE AddUser
	@pName Nvarchar(128),
	@pFirst_name Nvarchar(128),
	@pMail Nvarchar(128),
	@pPsswd char(128),
	@pTelephone Nvarchar(12),
	@pUser_permission integer,
	@pUser_sex char(1),
	@pUser_Bday date,
	@responseMessage NVARCHAR(250) OUTPUT
AS
BEGIN
    SET NOCOUNT ON
	
	DECLARE @vSalt UNIQUEIDENTIFIER = NEWID()
    BEGIN TRY
        INSERT INTO Users(Name, First_name, Mail, Psswd, Telephone, User_permission, User_sex, User_Bday, Salt)
        VALUES(@pName, @First_name, @pMail, HASHBYTES('SHA2_512', @pPsswd + CAST(@iSalt AS NVARCHAR(36))), @pTelephone, @pUser_permission, @pUser_sex, @pUser_Bday, @vSalt)
        SET @responseMessage='SUCCESS'
    END TRY
    BEGIN CATCH
        SET @responseMessage='ERROR'
    END CATCH

END


CREATE PROCEDURE Login
    @pMail NVARCHAR(128),
    @pPsswd NVARCHAR(128),
    @responseMessage NVARCHAR(250)='' OUTPUT
AS
BEGIN
    SET NOCOUNT ON

    DECLARE @userID integer
    IF EXISTS (SELECT id_usr FROM Users WHERE Mail=@pMail)
    BEGIN
        SET @userID=(SELECT id_usr FROM Users WHERE Mail=@pMail AND Psswd=HASHBYTES('SHA2_512', @pPsswd+CAST(Salt AS NVARCHAR(36))))

       IF(@userID IS NULL)
           SET @responseMessage='ERROR'
       ELSE 
           SET @responseMessage='SUCESS'
    END
    ELSE
       SET @responseMessage='ERROR'
END