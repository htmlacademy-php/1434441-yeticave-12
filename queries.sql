INSERT categories (name, symbol_code) VALUES 
("Доски и лыжи", "boards"),
("Крепления", "attachment"),
("Ботинки", "boots"),
("Одежда", "clothing"),
("Инструменты", "tools"),
("Разное", "other");

INSERT users (name, email, password, contact_info, dt_reg) VALUES 
("Иван", "ivan@mail.com", "ivan1", "88005553535", "2021-07-19 21:21:21"),
("Ксения", "ksenia@mail.com", "ksenia1", "88005553535", "2021-07-29 20:20:01"),
("Игорь", "igor@mail.com", "igor1", "88005553535", "2021-08-01 07:17:35"),
("Мария", "maria@mail.com", "maria1", "88005553535", "2021-03-29 01:01:01"),
("Григорий", "grigorii@mail.com", "grigorii1", "88005553535", "2020-01-3 04:27:21");

INSERT lots (category_id, user_id, title, description, start_price, dt_add, dt_sell, img_path, rate_step) VALUES
(1, 4, "2014 Rossignol District Snowboard", "Сноуборд", 10999, "2021-08-01 00:00:00", "2021-09-30 00:00:00", "img/lot-1.jpg", 2000),
(1, 2, "DC Ply Mens 2016/2017 Snowboard", "Сноуборд", 159999, "2021-08-12 00:00:00", "2021-09-30 00:00:00", "img/lot-2.jpg", 15000),
(2, 1, "Крепления Union Contact Pro 2015 года размер L/XL", "Крепления", 8000, "2021-08-01 00:00:00", "2021-09-30 00:00:00", "img/lot-3.jpg", 1000),
(3, 5, "Ботинки для сноуборда DC Mutiny Charocal", "Ботиночки", 10999, "2021-08-13 00:00:00", "2021-09-30 00:00:00", "img/lot-4.jpg", 2000),
(4, 3, "Куртка для сноуборда DC Mutiny Charocal", "Куртка", 7500, "2021-08-01 00:00:00", "2021-09-30 00:00:00", "img/lot-5.jpg", 500),
(6, 1, "Маска Oakley Canopy", "Маска", 5400, "2021-08-14 00:00:00", "2021-09-30 00:00:00", "img/lot-6.jpg", 1000);

INSERT rates (user_id, lot_id, dt_add, price) VALUES 
(1, 2, "2021-08-02 07:07:07", 174999),
(1, 1, "2021-08-02 08:08:08", 12999),
(2, 5, "2021-08-03 09:09:09", 8000),
(3, 4, "2021-08-03 10:10:10", 12999),
(4, 2, "2021-08-04 11:11:11", 199999),
(5, 1, "2021-08-05 12:12:12", 14999);

-- Получит все категории из таблица категорий 
SELECT name FROM categories;

-- Получит самые новые, открытые лоты
SELECT title, start_price, img_path, category_id FROM lots WHERE dt_sell > CURRENT_TIMESTAMP ORDER BY dt_add DESC LIMIT 10;

-- Покажет лот по его ID. Получит название категории, к которой принадлежит лот
SELECT user_id, title, description, name FROM lots l INNER JOIN categories c ON (l.category_id = c.id) WHERE l.id = 2;

-- Обновит лот по его id
UPDATE lots SET title = "2013 Rossignol District Snowboard" WHERE id = 1;

-- Получит список ставок для лота по его идентификатору с сортировкой по дате
SELECT lot_id, r.dt_add, price FROM rates r INNER JOIN lots l ON (l.id = r.lot_id) WHERE l.id = 5 ORDER BY r.dt_add DESC;