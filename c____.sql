-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 12:08 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c++++`
--
CREATE DATABASE IF NOT EXISTS `c++++` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `c++++`;

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`id`, `name`, `code`) VALUES
(1, 'Prím ellenőrzés', 'bool ifPrim(int n) {\r\n    if (n == 1 || n == 0) {\r\n        return false;\r\n    }\r\n    for (int i = 2; i <= sqrt(n); ++i) {\r\n        if (n % i == 0) {\r\n            return false;\r\n        }\r\n    }\r\n    return true;\r\n}'),
(2, 'N. faktoriális kiszámolása', 'int Fact(int n) {\r\n    int result[1000] = {0};\r\n    if (n >= 0) {\r\n        result[0] = 1;\r\n        for (int i = 1; i <= n; ++i) {\r\n            result[i] = i * result[i - 1];\r\n        }\r\n        return result[n];\r\n    }\r\n    return 0;\r\n}'),
(3, 'N. Fibonacci szám kiszámolása', 'int fib(int n) {\r\n    int a = 0, b = 1, c, i;\r\n    if (n == 0)\r\n        return a;\r\n    for (i = 2; i <= n; i++) {\r\n        c = a + b;\r\n        a = b;\r\n        b = c;\r\n    }\r\n    return b;\r\n}'),
(4, 'Szekvenciális rendezés', 'template <typename T>\r\nvoid univ_swap(T& a, T& b) {\r\n        T c(a); a = b; b = c;\r\n    }\r\n\r\ntemplate <typename T>\r\nstatic void ArrSort(T(&array)[size]) {\r\n        for(int i = 0; i < size; i++) {\r\n            for(int j = i + 1; j < size; j++) {\r\n                if(array[i] > array[j]) {\r\n                    univ_swap(array[i], array[j]);\r\n                }\r\n            }\r\n        }\r\n    }'),
(5, 'Mátrix determinánsának kiszámítása', 'template <typename T, size_t row, size_t col>\r\n    int MatDet(T(&matrix)[row][col]) {\r\n        int num1, num2, det = 1, index, total = 1, n = row;\r\n\r\n        int temp[n + 1];\r\n\r\n        for (int i = 0; i < n; i++) {\r\n            index = i;\r\n\r\n            while (matrix[index][i] == 0 && index < n) {\r\n                index++;\r\n            }\r\n\r\n            if (index == n) {\r\n                continue;\r\n            }\r\n\r\n            if (index != i) {\r\n                for (int j = 0; j < n; j++) {\r\n                    swap(matrix[index][j], matrix[i][j]);\r\n                }\r\n                det = det * pow(-1, index - i);\r\n            }\r\n\r\n            for (int j = 0; j < n; j++) {\r\n                temp[j] = matrix[i][j];\r\n            }\r\n\r\n            for (int j = i + 1; j < n; j++) {\r\n                num1 = temp[i];\r\n                num2 = matrix[j][i];\r\n\r\n                for (int k = 0; k < n; k++) {\r\n                    matrix[j][k] = (num1 * matrix[j][k]) - (num2 * temp[k]);\r\n                }\r\n                total = total * num1;\r\n            }\r\n        }\r\n\r\n        for (int i = 0; i < n; i++) {\r\n            det = det * matrix[i][i];\r\n        }\r\n        return (det / total);\r\n    }'),
(6, 'Mátrix csigabejárása', 'template <typename T, size_t row, size_t col>\r\n    void MatPSpir(T(&matrix)[row][col]) {\r\n        int i, k = 0, l = 0, n = col, m = row;\r\n        /* k - sor első indexe\r\n            m - sor utolsó indexe\r\n            l - oszlop első indexe\r\n            n - oszlop utolsó indexe\r\n            i - iterator\r\n        */\r\n\r\n        while (k < m && l < n) {\r\n            for (i = l; i < n; ++i) {\r\n                cout << matrix[k][i] << \" \";\r\n            }\r\n            k++;\r\n\r\n            for (i = k; i < m; ++i) {\r\n                cout << matrix[i][n - 1] << \" \";\r\n            }\r\n            n--;\r\n\r\n            if (k < m) {\r\n                for (i = n - 1; i >= l; --i) {\r\n                    cout << matrix[m - 1][i] << \" \";\r\n                }\r\n                m--;\r\n            }\r\n            if (l < n) {\r\n                for (i = m - 1; i >= k; --i) {\r\n                    cout << matrix[i][l] << \" \";\r\n                }\r\n                l++;\r\n            }\r\n        }\r\n    }');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) DEFAULT NULL,
  `user` varchar(255) NOT NULL,
  `question` varchar(800) NOT NULL,
  `answer` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `username`, `fname`, `lname`, `email`, `password`, `status`) VALUES
(1, 1307009951, 'Tester', 'Tester', 'Tester', 'Tester@gmail.com', '2a796972a1b252970d9d9724cf635be8', 'Aktiv');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
