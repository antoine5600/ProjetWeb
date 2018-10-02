drop table Product_category;
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
drop table Addresses;

create table Addresses( id_addr integer NOT NULL, 
                        Street varchar(128), 
                        Additional varchar(128), 
                        Postcode integer, 
                        City varchar(64), 
                        Country varchar(64),
                        CONSTRAINT PK_addr PRIMARY KEY (id_addr)
);


create table Users( id_usr integer NOT NULL, 
                    Name varchar(128), 
                    First_name varchar(128), 
                    Mail varchar(128), 
                    Psswd char(128),
                    CONSTRAINT PK_usr PRIMARY KEY (id_usr)
);


create table Clients(   id_client integer NOT NULL, 
                        Telephone varchar(128),
                        CONSTRAINT PK_client PRIMARY KEY (id_client),
                        CONSTRAINT FK_client FOREIGN KEY (id_client) REFERENCES Users(id_usr)
);


create table Admins(     id_admin integer NOT NULL,
                        CONSTRAINT PK_admin PRIMARY KEY (id_admin),
                        CONSTRAINT FK_admin FOREIGN KEY (id_admin) REFERENCES Users(id_usr)
);


create table Mods(      id_mod integer NOT NULL,
                        CONSTRAINT PK_mod PRIMARY KEY (id_mod),
                        CONSTRAINT FK_mod FOREIGN KEY (id_mod) REFERENCES Users(id_usr)
);


create table Products(  id_prod integer NOT NULL, 
                        Name varchar(256), 
                        Price real, 
                        Stock integer, 
                        Sales real,
                        CONSTRAINT PK_prod PRIMARY KEY (id_prod)
);


create table Categories(  id_cat integer NOT NULL, 
                        Name varchar(64), 
                        parent_category integer,
                        CONSTRAINT PK_cat PRIMARY KEY (id_cat),
                        CONSTRAINT FK_cat FOREIGN KEY (parent_category) REFERENCES Categories(id_cat)
);


create table Product_list(  id_list integer NOT NULL,
                            CONSTRAINT PK_list PRIMARY KEY (id_list)
);


create table Product_quantity(  list integer NOT NULL, 
                                product integer NOT NULL, 
                                Quantity integer,
                                CONSTRAINT PK_prod_qty PRIMARY KEY (list,product),
                                CONSTRAINT FK_prod_qty_list FOREIGN KEY (list) REFERENCES Product_list(id_list),
                                CONSTRAINT FK_prod_qty_prod FOREIGN KEY (product) REFERENCES Products(id_prod)
);




create table Command(   id_command integer NOT NULL, 
                        Delivery_addr integer, 
                        Payment_addr integer,
                        Client integer,
                        CONSTRAINT PK_command PRIMARY KEY (id_command),
                        CONSTRAINT FK_command_delivery FOREIGN KEY (Delivery_addr) REFERENCES Addresses(id_addr),
                        CONSTRAINT FK_command_payment FOREIGN KEY (Payment_addr) REFERENCES Addresses(id_addr),
                        CONSTRAINT FK_command_client FOREIGN KEY (Client) REFERENCES Clients(id_client)
);


create table Favorites( id_fav integer NOT NULL, 
                        Client integer,
                        CONSTRAINT PK_fav PRIMARY KEY (id_fav),
                        CONSTRAINT FK_fav FOREIGN KEY (Client) REFERENCES Clients(id_client)
);



create table Client_addr(   Client integer NOT NULL, 
                            Address integer NOT NULL,
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





