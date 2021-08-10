DROP TABLE IF EXISTS `exports`;
CREATE TABLE IF NOT EXISTS `exports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `exports` (`id`, `name`, `created_at`, `username`, `localname`) VALUES
(1, 'Test 1', '2021-08-09 15:24:03', 'User 1', 'Lokal 1'),
(2, 'Test 1', '2021-08-09 15:24:28', 'User 1', 'Lokal 1'),
(3, 'Test 1', '2021-08-07 15:24:32', 'User 1', 'Lokal 1'),
(4, 'Test 2', '2021-08-06 15:24:43', 'User 2', 'Lokal 2'),
(5, 'Test 2', '2021-08-05 15:24:44', 'User 2', 'Lokal 2'),
(6, 'Test 2', '2021-08-04 15:24:45', 'User 2', 'Lokal 2'),
(7, 'Test 3', '2021-08-03 15:24:52', 'User 3', 'Lokal 3'),
(8, 'Test 3', '2021-08-02 15:24:53', 'User 3', 'Lokal 3'),
(9, 'Test 3', '2021-08-01 15:24:54', 'User 3', 'Lokal 3'),
(10, 'Test 3', '2021-08-10 15:24:55', 'User 3', 'Lokal 3');
COMMIT;