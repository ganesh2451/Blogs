-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2024 at 04:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_password`) VALUES
(1, 'admin', 'password123');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `author` varchar(200) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `author`, `content`, `img`) VALUES
(6, 'Iron Man', 'abc123@gmail.com', 'Iron Man is a superhero appearing in American comic books published by Marvel Comics. Co-created by writer and editor Stan Lee, developed by scripter Larry Lieber, and designed by artists Don Heck and Jack Kirby, the character first appeared in Tales of Suspense #39 in 1962 and received his own title with Iron Man #1 in 1968. Shortly after his creation, Iron Man became a founding member of the superhero team, the Avengers, with Thor, Ant-Man, the Wasp, and the Hulk. Iron Man stories, individually and with the Avengers, have been published consistently since the character\'s creation. Iron Man is the superhero persona of Anthony Edward \"Tony\" Stark, a businessman and engineer who runs the weapons manufacturing company Stark Industries.\r\nWhen Stark was captured in a war zone and sustained a severe heart wound, he built his Iron Man armor and escaped his captors. Iron Man\'s suits of armor grant him superhuman strength, flight, energy projection, and other abilities. The character was created in response to the Vietnam War as Lee\'s attempt to create a likeable pro-war character. Since his creation, Iron Man has been used to explore political themes, with early Iron Man stories being set in the Cold War. The character\'s role as a weapons manufacturer proved controversial, and Marvel moved away from geopolitics by the 1970s. Instead, the stories began exploring themes such as civil unrest, technological advancement, corporate espionage, alcoholism, and governmental authority.', 'img/iron-man-marvel-comics-wallpaper-preview.jpg'),
(7, 'Obtio And Kakashi', 'bca12@gmail.com', 'So the dynamic between these two begins with a filler where they are shown under team Minato along with Rin Nohara in the middle of the third great ninja war as three very young shinobis. What makes them engaging at the time is how well Kakashi and Obito go together with their ideologies and personalities. Kakashi is cold, obedient and very skilled because of his desire to not end up as his \"disgrace\" of a father that didn\'t obey the rules and ran away from his duties as a leader to the village and father to Kakashi. Obito on the other hand never had parents and was very accepting of people and competitive to become the hokage and \"save the world\". Whilst they are opposite of each other Obito brings about change to Kakashi\'s heart telling him that his father was a true \"hero\" and that people who abandon their comrades \"are worse than trash/scum\". When Obito chose to save Rin, sticking close to his beliefs, Kakashi came to help him losing an eye in the process forcing Obito to awaken his Sharingan when they were in a corner. He awakened his Sharingan out of a strong desire to save his friends. Unfortunately their newly formed friendship was cut short by the hidden stone shinobi. Kakashi nearly dying to a giant boulder was saved by Obito who sacrificed seeing his dreams, his love-interest and his own life so that Kakashi would still be alive. Obito then gives his right eye to Kakashi as a \"gift\" as he asked Kakashi to protect Rin.', 'img/AW1pIg.jpg'),
(9, 'RCB', 'bca12@gmail.com', 'Royal Challengers Bangalore (RCB), officially known as Royal Challengers Bengaluru, are a professional cricket franchise based in Bangalore, Karnataka, competing in the Indian Premier League (IPL). Founded in 2008 by United Spirits, the team is named after the company\'s liquor brand, Royal Challenge. The M. Chinnaswamy Stadium in Bangalore serves as their home ground.\r\n\r\nRoyal Challengers have finished as runners-up on three occasions in 2009, 2011, and 2016, and have qualified for the playoffs in nine out of seventeen seasons. The franchise has also competed in the Champions League Twenty20, finishing as runners-up in the 2011 season. RCB is valued at $69.8 million, making them one of the most valuable IPL franchises. As of 2024, the team is captained by Faf du Plessis and coached by Andy Flower.', 'img/OIP (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `created_at`) VALUES
(1, 6, 1, 'Nice', '2024-07-28 11:49:59'),
(2, 7, 1, 'Amazing', '2024-07-28 11:50:28'),
(3, 6, 1, 'Cool', '2024-07-28 11:50:35'),
(4, 6, 2, 'Wow', '2024-07-28 11:51:18'),
(5, 7, 2, 'Intersting', '2024-07-28 11:51:28'),
(6, 9, 1, 'E Sala Cup Namde', '2024-07-28 12:45:12'),
(7, 7, 1, 'Cool', '2024-07-28 13:49:22'),
(8, 6, 1, 'Amazing', '2024-07-28 14:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `subject` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `firstname`, `lastname`, `country`, `subject`, `submitted_at`) VALUES
(1, 'Ganesh', 'M', 'india', 'This is a good Blogging website', '2024-07-28 12:40:02'),
(2, 'War', 'Machine', 'usa', 'I have a problem in uploading blog please resolve it', '2024-07-28 13:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`) VALUES
(3, 6, 1),
(4, 7, 1),
(5, 6, 2),
(6, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `emailid` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `dob` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `emailid`, `password`, `name`, `description`, `dob`) VALUES
(1, 'abc123@gmail.com', '123', 'ganesh', 'blogs', '2024-07-05'),
(2, 'bca12@gmail.com', '111', 'War Machine', 'Blog Writer', '2024-07-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `blogs` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `blogs` (`id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
