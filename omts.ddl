DROP DATABASE omts;
CREATE DATABASE omts; USE omts;
CREATE TABLE Theatre_Complex(
    complex_id CHAR(9) NOT NULL,
    name VARCHAR(40) NOT NULL,
    street VARCHAR(40) NOT NULL,
    city VARCHAR(40) NOT NULL,
    pc CHAR(6) NOT NULL,
    PRIMARY KEY(complex_id)
); CREATE TABLE Theatre(
    theatre_num INTEGER NOT NULL,
    max_seats INTEGER NOT NULL,
    screen_size INTEGER NOT NULL,
    complex_id CHAR(9) NOT NULL,
    PRIMARY KEY(theatre_num, complex_id),
    FOREIGN KEY(complex_id) REFERENCES Theatre_Complex(complex_id)
); CREATE TABLE Movie_Supplier(
    company_name VARCHAR(40) NOT NULL,
    street VARCHAR(40) NOT NULL,
    city VARCHAR(40) NOT NULL,
    pc CHAR(6) NOT NULL,
    phone_number CHAR(10),
    first_name VARCHAR(40) NOT NULL,
    last_name VARCHAR(40) NOT NULL,
    PRIMARY KEY(company_name)
); CREATE TABLE Movie(
    movie_id CHAR(9) NOT NULL,
    title VARCHAR(40) NOT NULL,
    running_time TIME NOT NULL,
    rating VARCHAR(5),
    plot_synopsis VARCHAR(140),
    director VARCHAR(40) NOT NULL,
    production_company VARCHAR(40) NOT NULL,
    name_of_supplier VARCHAR(40) NOT NULL,
    start_date DATE,
    end_date DATE,
    PRIMARY KEY(movie_id),
    FOREIGN KEY(name_of_supplier) REFERENCES Movie_Supplier(company_name)
); CREATE TABLE Movie_Reviews(
    movie_id CHAR(9) NOT NULL,
    account_number CHAR(9) NOT NULL,
    review_date DATE NOT NULL,
    rating DECIMAL,
    body VARCHAR(140),
    PRIMARY KEY(movie_id, account_number),
    FOREIGN KEY(movie_id) REFERENCES Movie(movie_id),
    FOREIGN KEY(account_number) REFERENCES Customer(account_number)
); CREATE TABLE Customer(
    account_number CHAR(9) NOT NULL,
    PASSWORD VARCHAR(40) NOT NULL,
    first_name VARCHAR(40) NOT NULL,
    last_name VARCHAR(40) NOT NULL,
    street VARCHAR(40) NOT NULL,
    city VARCHAR(40) NOT NULL,
    pc CHAR(6) NOT NULL,
    phone_number CHAR(10),
    credit_card_number CHAR(16) NOT NULL,
    credit_card_expiry CHAR(4) NOT NULL,
    credit_card_cvc CHAR(3) NOT NULL,
    is_admin BIT,
    PRIMARY KEY(account_number)
); CREATE TABLE Reservations(
    reservation_number int NOT NULL AUTO_INCREMENT,
    num_tickets_reserved INTEGER,
    account_number CHAR(9) NOT NULL,
    showing_id CHAR(9) NOT NULL,
    movie_id CHAR(9) NOT NULL,
    complex_id CHAR(9) NOT NULL,
    theatre_num INTEGER NOT NULL,
    PRIMARY KEY(reservation_number),
    FOREIGN KEY(account_number) REFERENCES Customer(account_number),
    FOREIGN KEY(showing_id) REFERENCES Showing(showing_id),
    FOREIGN KEY(movie_id) REFERENCES Movie(movie_id),
    FOREIGN KEY(complex_id) REFERENCES Theatre_Complex(complex_id)
); CREATE TABLE Showing(
    showing_id CHAR(9) NOT NULL,
	showing_date VARCHAR(12) NOT NULL,
    movie_id CHAR(9) NOT NULL,
    complex_id CHAR(9) NOT NULL,
    start_time CHAR(9) NOT NULL,
    theatre_num INTEGER NOT NULL,
    seats_available INTEGER,
    PRIMARY KEY(showing_id),
    FOREIGN KEY(movie_id) REFERENCES Movie(movie_id),
    FOREIGN KEY(complex_id) REFERENCES theatre_complex(complex_id),
    FOREIGN KEY(theatre_num) REFERENCES Theatre(theatre_num)
); INSERT INTO Theatre_Complex
VALUES(
    '000000001',
    'westons complex',
    'weston',
    'kingston',
    'K7L122'
),(
    '000000002',
    'williams complex',
    'william',
    'kingston',
    'K7L538'
),(
    '000000003',
    'kings castle',
    'king',
    'kingston',
    'K7L583'
),(
    '000000004',
    'queens castle',
    'Queen',
    'kingston',
    'K7L840'
);
INSERT INTO Theatre
VALUES
(1, 40, 300, '000000001'),
(2, 40, 300, '000000001'),
(1, 100, 400, '000000002'),
(2, 150, 400, '000000002'),
(3, 100, 400, '000000002'),
(1, 150, 300, '000000003'),
(2, 150, 300, '000000003'),
(3, 150, 300, '000000003'),
(1, 300, 700, '000000004'),
(2, 300, 700, '000000004');
INSERT INTO Movie_Supplier
VALUES(
    'Electronic Arts',
    'Jane',
    'New York',
    '1Z74F8',
    '1238463964',
    'Bob',
    'Populous'
),(
    'Warner Sis',
    'Narnia',
    'Cali',
    '492f83',
    '0376411403',
    'Phil',
    'Jenko'
),(
    'Teletoon',
    'Wood',
    'Toronto',
    '3984hs',
    '9847293739',
    'Carly',
    'Mama'
);
INSERT INTO Movie
VALUES(
    '10180301',
    'Parry Hotter',
    '02:30:00',
    'R',
    'Harry Potter slays all the dragons and evil wizards',
    'Bilbo Baggins',
    'Harry Potter Pics',
    'Electronic Arts',
    '2018-05-01',
    '2018-07-25'
),(
    '10180302',
    'Sky Wars',
    '03:30:00',
    'R',
    'Obi Qwon and Luke StarWalker conquer the galaxy',
    'Tom Ford',
    'Sky Wars Pics',
    'Electronic Arts',
    '2018-03-01',
    '2018-05-25'
),(
    '10180303',
    'Mountain Explorers 3',
    '05:00:00',
    'R++',
    'What happens on the mountain stays on the mountain',
    'Jerry Seinfeld',
    'Mountain Pictures',
    'Warner Sis',
    '2019-01-01',
    '2018-05-02'
),(
    '10180304',
    'Love Factually',
    '00:45:00',
    'PG',
    'Ryan Reynolds and Jennifer Lawrence fall out of love',
    'Steven Spielberg',
    'Love.yeah',
    'Warner Sis',
    '2019-01-01',
    '2018-05-02'
);
INSERT INTO Customer
VALUES(
    '100000001',
    'password',
    'Admin',
    'Admin',
    'clergy',
    'kingston',
    '35kdqj',
    '0374184592',
    '3747361478347583',
    '0420',
    '003',
    1
),(
    '200000002',
    'pass123',
    'Nick',
    'Gres',
    'West',
    'Toronto',
    '9653f3',
    '8462984692',
    '3748O32485975379',
    '0619',
    '643',
    0
),(
    '300000003',
    '38973dhb',
    'Clark',
    'crow',
    'King',
    'markam',
    '890hd8',
    '3588372917',
    '3853732573285208',
    '0520',
    '986',
    0
),(
    '400000004',
    'hdbei83971',
    'Cindy',
    'venit',
    'Oak',
    'kingston',
    '90c83e',
    '3847927398',
    '5867329057364928',
    '1123',
    '345',
    0
),(
    '500000005',
    '8472hgdqi2',
    'Flo',
    'sho',
    'West',
    'Toronto',
    '038fdh',
    '4850274927',
    '8695744100234785',
    '0729',
    '424',
    0
),(
    '600000006',
    'hgd3d7932',
    'Gig',
    'clearly',
    'North',
    'California',
    'm83sh2',
    '3848273769',
    '1836493573958735',
    '0421',
    '443',
    0
);

INSERT INTO Reservations (
  num_tickets_reserved,
  account_number,
  showing_id,
  movie_id,
  complex_id,
  theatre_num
)
VALUES(
    2,
    '100000001',
    'SID000001',
    '10180301',
    '000000001',
    1
),(
    5,
    '400000004',
    'SID000002',
    '10180303',
    '000000001',
    2
);
INSERT INTO Showing
VALUES(
    'SID000001',	'MAR 30, 2018',    '10180301',    '000000002',    '000000237',    '1',    '200'),
    ( 'SID000002','MAR 30, 2018','10180303','000000001','000000452','2','350'
),
('SID000003','MAR 28, 2018','10180304','000000001','000000237','2','200'),
('SID000004','MAR 29, 2018','10180301','000000001','000000452','2','350'),
('SID000005','MAR 28, 2018','10180304','000000002','000140237','2','200'),
('SID000006','MAR 29, 2018','10180301','000000002','000000452','1','350');
INSERT INTO Movie_Reviews
VALUES(
    '10180301',
    '100000001',
    '18-05-01',
    10,
    'it was a sick movie'
),(
    '10180301',
    '100000002',
    '18-05-02',
    5,
    'it was pretty average'
);
