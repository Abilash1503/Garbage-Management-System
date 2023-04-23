


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `token_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_creation_time` datetime NOT NULL,
  `verification_status` int(1) NOT NULL DEFAULT 1,
  `email` varchar(255) NOT NULL,
  `password_code` int(11) NOT NULL,
  `password_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admin` (`admin_id`, `admin_username`, `token_email`, `password`, `account_creation_time`, `verification_status`, `email`, `password_code`, `password_token`) VALUES
(1, 'admin', '', '$2a$12$O4OsLaPuvvSIvt1dCjw8i.t3YXxKeE50Z3p5KauHxoJzj3QSjMT0G', '2023-02-19 15:30:55', 1, '20x007@psgtech.ac.in', 0, 'a74f866f88232df04eb8cc9f0b602d');

-- --------------------------------------------------------

--
-- Table structure for table `application_request`
--

CREATE TABLE `application_request` (
  `application_request_id` int(11) NOT NULL,
  `garbage_type` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `login_username` varchar(255) NOT NULL,
  `permission` int(11) NOT NULL DEFAULT 2,
  `fname` varchar(255) NOT NULL,
  `service_date` date NOT NULL,
  `vehicle_unique_id` varchar(255) NOT NULL,
  `slot_time` text NOT NULL,
  `route_name` varchar(255) NOT NULL,
  `stop` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL,
  `driver_unique_id` varchar(255) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Mno` bigint(255) NOT NULL,
  `vehicle_unique_id` varchar(255) NOT NULL,
  `date_of_joining` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `driver` (`driver_id`, `driver_unique_id`, `driver_name`, `age`, `email`, `Mno`, `vehicle_unique_id`, `date_of_joining`) VALUES
(1, 'driver001', 'raja', 21, 'raja@gmail.com', 9971653248, 'v001', '2022-09-04');
-- --------------------------------------------------------

--
-- Table structure for table `driver_admin`
--

CREATE TABLE `driver_admin` (
  `driver_admin_id` int(11) NOT NULL,
  `driver_unique_id` varchar(255) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `vehicle_unique_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification_status` int(1) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `driver_admin` (`driver_admin_id`, `driver_unique_id`, `driver_name`, `vehicle_unique_id`, `password`, `verification_status`, `email`) VALUES
(1, 'driver-a-001', 'raja', 'v001', '$2a$12$q/0kuYDEdM1Pp2yULPMViOhruIELtWWoK0UGqEH2EYgvmXG17JO4u', 1, 'raja@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `garbage_category`
--

CREATE TABLE `garbage_category` (
  `garbage_id` int(11) NOT NULL,
  `garbage_type` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `create_datetime` datetime NOT NULL,
  `service_available` varchar(255) NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `login_username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Mno` bigint(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `garbage_type` varchar(255) NOT NULL,
  `route_name` varchar(255) NOT NULL,
  `stop` varchar(255) NOT NULL,
  `driver_unique_id` varchar(255) NOT NULL,
  `vehicle_unique_id` varchar(255) NOT NULL,
  `color` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `slot_timetable`
--

CREATE TABLE `slot_timetable` (
  `slot_id` int(11) NOT NULL,
  `vehicle_unique_id` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `garbage_type` varchar(255) NOT NULL,
  `start_time` text NOT NULL,
  `end_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `login_username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Mno` bigint(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_account_time` datetime NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `password_token` varchar(255) NOT NULL,
  `password_code` int(11) NOT NULL,
  `disabled_account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`user_id`, `fname`, `login_username`, `email`, `Mno`, `password`, `create_account_time`, `token`, `status`, `password_token`, `password_code`, `disabled_account`) VALUES
(1, 'ashwin', 'ashwin', '20x007@psgtech.ac.in', 6385792955, '$2a$12$sZ82uF1cOI9HnSyMoBbaGOSWy4TpoPw.BJuJQx2ObZ27vwewEs9RK', '2023-03-09 01:52:03', '034df28de6ce577acb668dd25252bb', 1, '7d89b28ec88bad40238c6edb7a5cef', 1, 1);


-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` int(11) NOT NULL,
  `vehicle_unique_id` varchar(255) NOT NULL,
  `end_point` varchar(255) NOT NULL,
  `garbage_type` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `max_capacity` varchar(255) NOT NULL,
  `vehicle_available` varchar(255) DEFAULT 'enabled',
  `admin_username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_username` (`admin_username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `application_request`
--
ALTER TABLE `application_request`
  ADD PRIMARY KEY (`application_request_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `Mno` (`Mno`),
  ADD UNIQUE KEY `driver_unique_id` (`driver_unique_id`),
  ADD UNIQUE KEY `assign_truck` (`vehicle_unique_id`);

--
-- Indexes for table `driver_admin`
--
ALTER TABLE `driver_admin`
  ADD PRIMARY KEY (`driver_admin_id`),
  ADD UNIQUE KEY `driver_unique_id` (`driver_unique_id`);

--
-- Indexes for table `garbage_category`
--
ALTER TABLE `garbage_category`
  ADD PRIMARY KEY (`garbage_id`),
  ADD UNIQUE KEY `garbage_type` (`garbage_type`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD UNIQUE KEY `sechudule` (`route_name`,`stop`,`driver_unique_id`,`vehicle_unique_id`) USING HASH;

--
-- Indexes for table `slot_timetable`
--
ALTER TABLE `slot_timetable`
  ADD PRIMARY KEY (`slot_id`),
  ADD UNIQUE KEY `slot` (`vehicle_unique_id`,`day`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`login_username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `Mno` (`Mno`),
  ADD UNIQUE KEY `login_username` (`login_username`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD UNIQUE KEY `vehicle_unique_id` (`vehicle_unique_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `application_request`
--
ALTER TABLE `application_request`
  MODIFY `application_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `driver_admin`
--
ALTER TABLE `driver_admin`
  MODIFY `driver_admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `garbage_category`
--
ALTER TABLE `garbage_category`
  MODIFY `garbage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `slot_timetable`
--
ALTER TABLE `slot_timetable`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
