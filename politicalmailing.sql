-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2016 at 09:42 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `politicalmailing`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `postImage` text NOT NULL,
  `postTitle` longtext NOT NULL,
  `postContent` longtext NOT NULL,
  `postDate` text NOT NULL,
  `postTime` text NOT NULL,
  `username` text NOT NULL,
  `editUser` text NOT NULL,
  `editDate` text NOT NULL,
  `editTime` text NOT NULL,
  `sidebarMonth` text NOT NULL,
  `sidebarYear` text NOT NULL,
  `tags` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `postImage`, `postTitle`, `postContent`, `postDate`, `postTime`, `username`, `editUser`, `editDate`, `editTime`, `sidebarMonth`, `sidebarYear`, `tags`) VALUES
(52, 'testheader.jpg', 'Post 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus urna ut purus maximus, quis aliquet enim facilisis. Phasellus a risus tempus, accumsan ante at, dapibus turpis. Duis aliquet elit at lacus tristique pellentesque. Sed tempus congue tristique. Maecenas facilisis lectus vel mattis consectetur. Sed id lacinia metus. Nam quis maximus augue. Nulla congue tempus justo, in ullamcorper diam imperdiet eget', '10/20/16', '11:55:15', 'sean', 'sean', '10/20/16', '12:36:08', '10', '16', 'Tag 5, Tag 1'),
(54, 'testheader3.jpg', 'Post 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus urna ut purus maximus, quis aliquet enim facilisis. Phasellus a risus tempus, accumsan ante at, dapibus turpis. Duis aliquet elit at lacus tristique pellentesque. Sed tempus congue tristique. Maecenas facilisis lectus vel mattis consectetur. Sed id lacinia metus. Nam quis maximus augue. Nulla congue tempus justo, in ullamcorper diam imperdiet eget', '10/20/16', '11:55:56', 'kev', 'sean', '10/20/16', '12:35:52', '10', '16', 'Tag 3, Tag 4'),
(56, 'testheader.jpg', 'Post 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus urna ut purus maximus, quis aliquet enim facilisis. Phasellus a risus tempus, accumsan ante at, dapibus turpis. Duis aliquet elit at lacus tristique pellentesque. Sed tempus congue tristique. Maecenas facilisis lectus vel mattis consectetur. Sed id lacinia metus. Nam quis maximus augue. Nulla congue tempus justo, in ullamcorper diam imperdiet eget', '10/20/16', '11:59:08', 'sean', 'sean', '10/20/16', '12:35:35', '10', '16', 'Tag 1, Tag 2'),
(58, 'testheader.jpg', 'New Post with Tags', 'Post with Tags\r\n', '10/20/16', '12:22:29', 'sean', '', '', '', '10', '16', 'Tag 1, Tag 2, Tag 3, Tag 4'),
(60, 'testheader2.jpg', 'adadadad', 'sdasdasdsafsdasfas', '10/20/16', '16:03:24', 'sean', '', '', '', '10', '16', 'Tag 3');

-- --------------------------------------------------------

--
-- Table structure for table `blog_users`
--

CREATE TABLE `blog_users` (
  `user` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_users`
--

INSERT INTO `blog_users` (`user`, `password`) VALUES
('sean', 'password'),
('kev', 'password'),
('rob', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table for holding emails who want to be sent the newsletter';

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`email`) VALUES
(''),
('seanmaclarion@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `imageFront` text NOT NULL,
  `imageBack` text NOT NULL,
  `caption` longtext NOT NULL,
  `result` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `title`, `imageFront`, `imageBack`, `caption`, `result`) VALUES
(1, 'Stephen DAngelo', 'joe25.png', 'joe25.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas quis nisl a urna luctus accumsan. Vivamus aliquet, nulla egestas gravida luctus, lectus orci elementum tellus, eget cursus metus sem sed ex. Proin efficitur sollicitudin euismod. Aliquam erat volutpat. Ut fringilla, mi a sodales porttitor, justo mi viverra sapien, ut rhoncus est sapien et sapien. Integer neque est, vehicula sit amet eros non, aliquam laoreet libero. Pellentesque tempus faucibus mi, quis elementum dui. Nullam ut justo id elit auctor lacinia fringilla vel nibh. Vestibulum eget nulla placerat, semper urna nec, lobortis nisi. Maecenas a egestas dui.\r\n\r\nDonec congue mi vitae justo egestas blandit nec malesuada est. Pellentesque tincidunt nisi eu pulvinar lacinia. Duis et fermentum massa. Sed quis risus eu augue viverra ultrices in eget mi. Suspendisse condimentum elit vel faucibus dictum. Duis porttitor a dui a varius. Duis euismod mi diam, quis elementum nunc efficitur in. Aenean imperdiet vehicula massa, convallis tempus massa commodo et. Sed vestibulum at urna non fringilla. In a blandit leo, eu ullamcorper lectus. Nullam porttitor, nibh sit amet maximus sagittis, ex metus tincidunt nunc, quis gravida urna eros pulvinar justo. Suspendisse egestas purus id auctor venenatis. Donec ut orci non dui semper consequat. Praesent quam libero, iaculis nec cursus et, auctor non leo.\r\n\r\nMaecenas pulvinar quis risus non rutrum. Sed suscipit congue metus, at ornare justo tristique vel. Morbi id arcu ut purus fermentum vulputate. Nulla accumsan vestibulum nisi varius accumsan. Praesent vitae porttitor nisi. Maecenas laoreet nisl quam, ornare elementum ipsum finibus in. Proin dignissim molestie erat.', 'Win'),
(4, 'Second Card', 'kevin25.png', 'kevin25.png', 'adasdsadsadsadasdsa', 'Tie'),
(5, 'Third Post', 'joe25.png', 'kevin25.png', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 'hhhhhhhhhhhhhh');

-- --------------------------------------------------------

--
-- Table structure for table `username`
--

CREATE TABLE `username` (
  `displayname` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
