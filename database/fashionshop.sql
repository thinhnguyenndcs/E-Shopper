-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th3 31, 2022 lúc 02:24 PM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fashionshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `amount_discounts`
--

CREATE TABLE `amount_discounts` (
  `id` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `amount_discounts`
--

INSERT INTO `amount_discounts` (`id`, `amount`) VALUES
(1, '5');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `brieft` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `cmt` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`id`, `title`, `brieft`, `content`, `img`, `date`, `author`, `cmt`) VALUES
(1, 'Content and fashion', 'Content and fashion', 'All content, including content for the fashion industry, is important. How should customers find out about the brand-new sneakers or the latest jeans, if not with good texts? Well, there is also the circle of friends who share news with each other. But let\'s be completely honest, who wants to wear the same dress that their friend won’t stop talking about?\r\n\r\nUltimately, content marketing is about making the product visible and known. That is why good fashion texts are indispensable for e-shops and e-commerce in the fashion world. The more questions the content answers about the respective item of clothing or accessory, the more visibility the text will achieve in search engines such as Google or Bing. Figuratively speaking, search engines are now the digital catwalk on which fashion content is presented to the public as a model. The role of the designer is practically taken over by the copywriter and concept developer, who determines the sequence, show sequence and content and therefore determines the success of the fashion show.\r\n\r\nIf the search engines like the text, they will reward you with a good ranking. That in turn is the key to higher visibility and more traffic for the fashion website or online shop. If the website visitors find everything they want quickly and easily and the content says it all, in the best-case scenario they can buy an item or make a booking. It is also good if the visit results in a newsletter subscription, a nice comment, an honest evaluation or even a recommendation on their social media channels.', './images/blog/blog-one.jpg', '2022-03-22 23:50:04', 'Annie Davis', ''),
(2, 'The pressure of fashion', 'There’s no question that shoppers’ expectations of their favorite style brands are heightening. A commitment to sustainability is no longer a nice to have. A real-time and personalized shopping experience is the norm. When consumers have questions, they want immediate answers. And when interacting with brands in between purchases, they’re looking to be inspired, entertained, and informed.\r\n\r\nA content marketing strategy that reflects leading societal trends, incorporates the latest technology, creatively leverages social media, and distributes content in new ways that drive loyalty and sales is a must-have for today’s fashion brands.', 'As the pressure of the impending global climate crisis intensifies, sustainability will be a force at the forefront of content marketing for years to come. In the context of this driving force, fashion — “fast fashion” in particular — is being placed under a microscope. According to a recent study by Princeton University, “the fashion industry is currently responsible for more annual carbon emissions than all international flights and maritime shipping combined.”\r\n\r\nConsumers are taking stock. As they look for ways to reduce the impacts of their lifestyle choices on the environment, they’re demanding the same of their style brands.\r\n\r\nAccording to a recent McKinsey survey on consumer sentiment toward sustainability in fashion:\r\n\r\nTwo-thirds of surveyed consumers state that it has become even more important to limit impacts on climate change\r\n67% consider the use of sustainable materials to be an important purchasing factor\r\n63% consider a brand’s promotion of sustainability to be an important purchasing factor\r\nSo, how is the fashion world responding?\r\n\r\nPatagonia is the poster child for leading the sustainability charge in the fashion world. Their commitment to Mother Earth is central to their mission, and lensed in a variety of ways throughout their brand storytelling. \r\n', './images/blog/blog-two.jpg', '2022-03-23 00:39:08', 'Annie Davis', ''),
(3, 'Don’t ignore the power of product tutorials', 'Remember your ultimate goal should always be to maintain customer loyalty. And product tutorials can do just that. Start by helping current and potential customers appreciate the importance of what you’re offering. Besides, with product tutorials, you can easily demonstrate the best way to use your product. However, first things first you need to choose a platform that best suits your needs. That is why we suggest, YouTube, and Instagram because they are the most popular and effective channels for this type of fashion marketing strategy.', 'Remember your ultimate goal should always be to maintain customer loyalty. And product tutorials can do just that. Start by helping current and potential customers appreciate the importance of what you’re offering. Besides, with product tutorials, you can easily demonstrate the best way to use your product. However, first things first you need to choose a platform that best suits your needs. That is why we suggest, YouTube, and Instagram because they are the most popular and effective channels for this type of fashion marketing strategy.\r\n\r\n \r\n\r\nBluCactus - 15 content ideas for fashion brands - dignanisMany girls indeed suffer when deciding on what to wear so they tend to watch tutorials to get a clear idea of what’s trending. In that case, this is the ideal moment to let those creative juices flow with unique fashion combinations. Besides, it’s a good way to not be always selling something. Thus, it’s more natural. Showing is always more powerful than telling, and tutorials are a great way to bring that to life.\r\n\r\n \r\n\r\nFor example, The girls at The Dignanis started to create product tutorials that could inspire their potential customers with thousands of ideas on how to use their beautiful scarves.\r\n\r\n \r\n\r\nThey did it through videos and photos. In them, they managed to show different techniques and creative style ideas for any occasion.\r\n\r\n \r\n\r\nAs a result, not only did their direct sales have a significant increase but what also improved was their customer reach. So this is the moment to get inspired and put this idea to work in your favor and you’ll be creating a charming product tutorial in no time!', './images/blog/blog-three.jpg', '2022-03-23 00:39:08', 'Annie Davis', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fee` int(11) DEFAULT NULL,
  `war_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `fee`, `war_id`, `district_id`) VALUES
(39, 1, NULL, NULL, NULL),
(42, 7, 3, 20102, 1442);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_details`
--

CREATE TABLE `cart_details` (
  `cart_id` int(11) NOT NULL,
  `clothing_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart_details`
--

INSERT INTO `cart_details` (`cart_id`, `clothing_id`, `quantity`) VALUES
(39, 4, 1),
(39, 5, 1),
(39, 6, 1),
(42, 2, 1),
(42, 3, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(5, 'clothing'),
(6, 'shoe');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `clothes`
--

CREATE TABLE `clothes` (
  `id` int(11) NOT NULL,
  `status` enum('hide','active','delete') DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category` int(11) NOT NULL,
  `sex` enum('men','women','kid','unisex') DEFAULT NULL,
  `price` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `clothes`
--

INSERT INTO `clothes` (`id`, `status`, `img`, `title`, `description`, `category`, `sex`, `price`, `quantity`) VALUES
(1, 'active', './images/h1.jpeg', 'Collar Pleated Dress', 'Spend the brunch with your super gang in this neutral elegant piece. This midi dress is cut from pleated poly georgette. It has a peterpan collar neckline, sheer billowy three-quarter sleeves, and a toned buckle waist to balance the sweeping accordion ski', 5, 'women', 20, 0),
(2, 'active', './images/h2.jpeg', 'Ethnic Maxi Dress', 'Red and blue floral print fit & flare dress V-neck', 5, 'women', 25, 20),
(3, 'active', './images/h3.jpeg', 'Neck Fit And Flared Dress', 'White floral print fit & flare dress Tie-up neck', 5, 'women', 25, 30),
(4, 'active', './images/h4.jpeg', 'Drop Dead Gorgeous Cocktail Dress', 'Drop Dead Gorgeous Cocktail Dress', 5, 'women', 25, 5),
(5, 'active', './images/h5.jpeg', 'Women Classic Cream Colourblocked Tulle Dress', 'Look stunning when you wear this modish dress. Tailored with attractive shoulder straps and a sleeveless design, this dress will lend you a stylish look. ', 5, 'women', 25, 6),
(6, 'active', './images/h6.jpeg', 'Nike Air Max 270 G', 'Look legendary in the Nike Air Max 270 G. The silhouette is a stitch-for-stitch reconstruction of the original big Air icon', 6, 'unisex', 250, 7),
(7, 'active', './images/h7.jpeg', 'Nike Air Max Presto', 'Look legendary in the Nike Air Max 270 G. The silhouette is a stitch-for-stitch reconstruction of the original big Air icon', 6, 'unisex', 180, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `districts`
--

INSERT INTO `districts` (`id`, `name`) VALUES
(1442, 'Quận 1'),
(1443, 'Quận 2'),
(1444, 'Quận 3'),
(1446, 'Quận 4'),
(1447, 'Quận 5'),
(1448, 'Quận 6'),
(1449, 'Quận 7'),
(1450, 'Quận 8'),
(1451, 'Quận 9'),
(1452, 'Quận 10'),
(1453, 'Quận 11'),
(1454, 'Quận 12'),
(1455, 'Quận Tân Bình'),
(1457, 'Quận Phú Nhuận'),
(1459, 'Huyện Hóc Môn'),
(1460, 'Huyện Củ Chi'),
(1461, 'Quận Gò Vấp'),
(1462, 'Quận Bình Thạnh'),
(1533, 'Huyện Bình Chánh'),
(1534, 'Huyện Nhà Bè'),
(2090, 'Huyện Cần Giờ'),
(3695, 'Thủ Đức');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('confirmed','cancelled','completed','shipping') DEFAULT NULL,
  `voucher` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `ghn_id` varchar(50) DEFAULT NULL,
  `createdAt` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `voucher`, `total`, `ghn_id`, `createdAt`) VALUES
(23, 1, 'confirmed', NULL, 23, 'ZYBHI', '2022-03-27'),
(26, 1, 'confirmed', NULL, 208, 'ZYBH4', '2022-03-27'),
(29, 2, 'confirmed', NULL, 48, 'ZYBHS', '2022-03-27'),
(30, 1, 'confirmed', NULL, 158, 'ZYBHK', '2022-03-27'),
(32, 1, 'confirmed', NULL, 23, 'ZYBHW', '2022-03-27'),
(34, 1, 'confirmed', NULL, 23, 'ZYOII', '2022-03-29'),
(35, 1, 'confirmed', NULL, 23, 'ZYOIQ', '2022-03-29'),
(37, 1, 'confirmed', NULL, 28, 'ZYOD1', '2022-03-31'),
(38, 1, 'confirmed', NULL, 48, 'ZYODC', '2022-03-31'),
(40, 8, 'confirmed', NULL, 23, 'ZYOUI', '2022-03-31'),
(41, 9, 'confirmed', NULL, 28, 'ZYOUU', '2022-03-31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `clothing_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`order_id`, `clothing_id`, `quantity`) VALUES
(23, 1, 1),
(26, 5, 1),
(26, 7, 1),
(29, 1, 1),
(29, 2, 1),
(30, 1, 4),
(30, 4, 3),
(32, 1, 1),
(34, 1, 1),
(35, 1, 1),
(37, 2, 1),
(38, 1, 1),
(38, 2, 1),
(40, 1, 1),
(41, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `thanh_vien` varchar(100) NOT NULL COMMENT 'thành viên thanh toán',
  `money` float NOT NULL COMMENT 'số tiền thanh toán',
  `note` varchar(255) DEFAULT NULL COMMENT 'ghi chú thanh toán',
  `vnp_response_code` varchar(255) NOT NULL COMMENT 'mã phản hồi',
  `code_vnpay` varchar(255) NOT NULL COMMENT 'mã giao dịch vnpay',
  `code_bank` varchar(255) NOT NULL COMMENT 'mã ngân hàng',
  `time` datetime NOT NULL COMMENT 'thời gian chuyển khoản'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `thanh_vien`, `money`, `note`, `vnp_response_code`, `code_vnpay`, `code_bank`, `time`) VALUES
(1, '742874161', 'abc', 100000, 'chinh chuyển khoản', '00', '13401455', 'NCB', '2020-10-10 01:00:00'),
(2, '608324672', 'abc', 1000000, 'test chuyển khoản', '00', '13401811', 'NCB', '2020-10-11 21:00:00'),
(3, '1134065293', 'CT2', 150000, 'học phí', '00', '13407163', 'NCB', '2020-10-22 23:00:00'),
(4, '596509313', 'CT2', 5000000, 'học phí', '00', '13407176', 'NCB', '2020-10-23 00:00:00'),
(5, '70267166', 'CT2', 5000000, 'học phí', '00', '13407178', 'NCB', '2020-10-23 00:00:00'),
(6, '1672349048', 'CT1', 150000, 'học phí', '00', '13407729', 'NCB', '2020-10-23 21:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `percentage_discounts`
--

CREATE TABLE `percentage_discounts` (
  `id` int(11) NOT NULL,
  `percent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `percentage_discounts`
--

INSERT INTO `percentage_discounts` (`id`, `percent`) VALUES
(2, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_detail`
--

CREATE TABLE `product_detail` (
  `id` int(11) NOT NULL,
  `first` text DEFAULT NULL,
  `second` text DEFAULT NULL,
  `img1` text DEFAULT NULL,
  `img2` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_detail`
--

INSERT INTO `product_detail` (`id`, `first`, `second`, `img1`, `img2`) VALUES
(1, 'The perfect addition to your capsule wardrobe ~ the Poppy Skirt in Black & Cream Polka is crafted from an easy wear fabrication, and features additional support around the waist for a smooth finish. Pair with the Poppy Top in Black & Cream Polka for a complete look.', 'The perfect addition to your capsule wardrobe ~ the Poppy Skirt in Black & Cream Polka is crafted from an easy wear fabrication, and features additional support around the waist for a smooth finish. Pair with the Poppy Top in Black & Cream Polka for a complete look.', 'https://firebasestorage.googleapis.com/v0/b/iot-nodejs-server.appspot.com/o/women_1.jpg?alt=media&token=1c3da31a-7bd5-4a27-8322-82c482887182', 'https://firebasestorage.googleapis.com/v0/b/iot-nodejs-server.appspot.com/o/women_1.jpg?alt=media&token=1c3da31a-7bd5-4a27-8322-82c482887182'),
(2, 'The perfect addition to your capsule wardrobe ~ the Poppy Skirt in Black & Cream Polka is crafted from an easy wear fabrication, and features additional support around the waist for a smooth finish. Pair with the Poppy Top in Black & Cream Polka for a complete look.', 'The perfect addition to your capsule wardrobe ~ the Poppy Skirt in Black & Cream Polka is crafted from an easy wear fabrication, and features additional support around the waist for a smooth finish. Pair with the Poppy Top in Black & Cream Polka for a complete look.', 'https://firebasestorage.googleapis.com/v0/b/iot-nodejs-server.appspot.com/o/women_2.jpg?alt=media&token=ab937868-8e65-48b1-82cc-06f811dc0672', 'https://firebasestorage.googleapis.com/v0/b/iot-nodejs-server.appspot.com/o/women_2.jpg?alt=media&token=ab937868-8e65-48b1-82cc-06f811dc0672'),
(3, 'The perfect addition to your capsule wardrobe ~ the Poppy Skirt in Black & Cream Polka is crafted from an easy wear fabrication, and features additional support around the waist for a smooth finish. Pair with the Poppy Top in Black & Cream Polka for a complete look.', 'The perfect addition to your capsule wardrobe ~ the Poppy Skirt in Black & Cream Polka is crafted from an easy wear fabrication, and features additional support around the waist for a smooth finish. Pair with the Poppy Top in Black & Cream Polka for a complete look.', 'https://firebasestorage.googleapis.com/v0/b/iot-nodejs-server.appspot.com/o/women_3.jpg?alt=media&token=9d66edf6-ae60-49b6-9d29-793d5528554a', 'https://firebasestorage.googleapis.com/v0/b/iot-nodejs-server.appspot.com/o/women_3.jpg?alt=media&token=9d66edf6-ae60-49b6-9d29-793d5528554a'),
(4, 'The perfect addition to your capsule wardrobe ~ the Poppy Skirt in Black & Cream Polka is crafted from an easy wear fabrication, and features additional support around the waist for a smooth finish. Pair with the Poppy Top in Black & Cream Polka for a complete look.', 'The perfect addition to your capsule wardrobe ~ the Poppy Skirt in Black & Cream Polka is crafted from an easy wear fabrication, and features additional support around the waist for a smooth finish. Pair with the Poppy Top in Black & Cream Polka for a complete look.', 'https://firebasestorage.googleapis.com/v0/b/iot-nodejs-server.appspot.com/o/women_4.jpg?alt=media&token=16d4a0bc-b40f-43f8-bc12-a8c820074e82', 'https://firebasestorage.googleapis.com/v0/b/iot-nodejs-server.appspot.com/o/women_4.jpg?alt=media&token=16d4a0bc-b40f-43f8-bc12-a8c820074e82'),
(5, 'The perfect addition to your capsule wardrobe ~ the Poppy Skirt in Black & Cream Polka is crafted from an easy wear fabrication, and features additional support around the waist for a smooth finish. Pair with the Poppy Top in Black & Cream Polka for a complete look.', 'The perfect addition to your capsule wardrobe ~ the Poppy Skirt in Black & Cream Polka is crafted from an easy wear fabrication, and features additional support around the waist for a smooth finish. Pair with the Poppy Top in Black & Cream Polka for a complete look.', 'https://firebasestorage.googleapis.com/v0/b/iot-nodejs-server.appspot.com/o/women_5.jpg?alt=media&token=aa2d5915-1bf9-4cf9-abe6-b1a83ed9a493', 'https://firebasestorage.googleapis.com/v0/b/iot-nodejs-server.appspot.com/o/women_5.jpg?alt=media&token=aa2d5915-1bf9-4cf9-abe6-b1a83ed9a493'),
(6, 'Forget all you thought you knew about Nike\'s signature Air Max; the Air Max 270 edition boasts the tallest heel counter the shoe has ever seen, informed by the ergonomic expertise of archive cuts to engineer a silhouette that\'s entirely new. A sock-like knitted upper sets an almond toe design, optimising breathability with mesh panels. The design features a classic lace fastening, a brand embossed tongue, a branded pull tab at the rear and the signature Nike swoosh to the side, an ultra-cushioned interior set upon a signature Nike Air sole with a translucent visible air unit.', 'Forget all you thought you knew about Nike\'s signature Air Max; the Air Max 270 edition boasts the tallest heel counter the shoe has ever seen, informed by the ergonomic expertise of archive cuts to engineer a silhouette that\'s entirely new. A sock-like knitted upper sets an almond toe design, optimising breathability with mesh panels. The design features a classic lace fastening, a brand embossed tongue, a branded pull tab at the rear and the signature Nike swoosh to the side, an ultra-cushioned interior set upon a signature Nike Air sole with a translucent visible air unit.', 'https://firebasestorage.googleapis.com/v0/b/iot-nodejs-server.appspot.com/o/shoe_1.jpg?alt=media&token=e00fccae-2f4a-4ca6-9d2c-254653d5f25b', 'https://firebasestorage.googleapis.com/v0/b/iot-nodejs-server.appspot.com/o/shoe_1.jpg?alt=media&token=e00fccae-2f4a-4ca6-9d2c-254653d5f25b'),
(7, 'Just like magic, you\'ll be in for something special. These Air Presto low-top sneakers from Nike are a casual and comfortable pair, that feel like you\'re walking in the clouds. Just like air', 'These styles are supplied by a premium sneaker marketplace. Stocking only the most sought-after footwear, they source and curate some of the most hard to find sneakers from around the world.', 'https://firebasestorage.googleapis.com/v0/b/iot-nodejs-server.appspot.com/o/shoe_2.jpg?alt=media&token=4cf57221-bfb3-4bac-aa90-218ad06dd4ea', 'https://firebasestorage.googleapis.com/v0/b/iot-nodejs-server.appspot.com/o/shoe_2.jpg?alt=media&token=4cf57221-bfb3-4bac-aa90-218ad06dd4ea');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `clothing_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id`, `value`, `comment`, `user_id`, `clothing_id`, `date`) VALUES
(1, 4, 'Nice dress', 1, 1, '2022-03-22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `STT` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`STT`, `id`, `date`, `time`, `name`, `email`, `review`) VALUES
(1, 1, '2022-03-26', '18:02:00', 'EUGEN', '', 'Sản phẩm rất hoàn hảo, đường may tỉ mỉ, tinh tế. Khi mang vào rất tôn dáng. Giá cả cũng phải chăng.'),
(2, 1, '2022-03-26', '18:02:00', 'EUGEN', '', 'Nhân viên shop phục vụ rất chu đáo, giải thích rõ ràng'),
(3, 1, '2022-03-26', '18:02:00', 'EUGEN', '', 'Mua vào dịp được giảm giá nên giá cả rất rẻ và phải chăng'),
(4, 2, '2022-03-26', '18:02:00', 'EUGEN', '', 'Sản phẩm rất hoàn hảo, đường may tỉ mỉ, tinh tế. Khi mang vào rất tôn dáng. Giá cả cũng phải chăng.'),
(5, 2, '2022-03-26', '18:02:00', 'EUGEN', '', 'Nhân viên shop phục vụ rất chu đáo, giải thích rõ ràng'),
(6, 2, '2022-03-26', '18:02:00', 'EUGEN', '', 'Mua vào dịp được giảm giá nên giá cả rất rẻ và phải chăng'),
(7, 3, '2022-03-26', '18:02:00', 'EUGEN', '', 'Sản phẩm rất hoàn hảo, đường may tỉ mỉ, tinh tế. Khi mang vào rất tôn dáng. Giá cả cũng phải chăng.'),
(8, 3, '2022-03-26', '18:02:00', 'EUGEN', '', 'Nhân viên shop phục vụ rất chu đáo, giải thích rõ ràng'),
(9, 3, '2022-03-26', '18:02:00', 'EUGEN', '', 'Mua vào dịp được giảm giá nên giá cả rất rẻ và phải chăng'),
(10, 4, '2022-03-26', '18:02:00', 'EUGEN', '', 'Sản phẩm rất hoàn hảo, đường may tỉ mỉ, tinh tế. Khi mang vào rất tôn dáng. Giá cả cũng phải chăng.'),
(11, 4, '2022-03-26', '18:02:00', 'EUGEN', '', 'Nhân viên shop phục vụ rất chu đáo, giải thích rõ ràng'),
(12, 4, '2022-03-26', '18:02:00', 'EUGEN', '', 'Mua vào dịp được giảm giá nên giá cả rất rẻ và phải chăng'),
(13, 5, '2022-03-26', '18:02:00', 'EUGEN', '', 'Sản phẩm rất hoàn hảo, đường may tỉ mỉ, tinh tế. Khi mang vào rất tôn dáng. Giá cả cũng phải chăng.'),
(14, 5, '2022-03-26', '18:02:00', 'EUGEN', '', 'Nhân viên shop phục vụ rất chu đáo, giải thích rõ ràng'),
(15, 5, '2022-03-26', '18:02:00', 'EUGEN', '', 'Mua vào dịp được giảm giá nên giá cả rất rẻ và phải chăng'),
(16, 6, '2022-03-26', '18:02:00', 'EUGEN', '', 'Giày đúng chính hãng, nhân viên nhiệt tình'),
(17, 6, '2022-03-26', '18:02:00', 'EUGEN', '', 'Nhân viên shop phục vụ rất chu đáo, giải thích rõ ràng'),
(18, 6, '2022-03-26', '18:02:00', 'EUGEN', '', 'Mua vào dịp được giảm giá nên giá cả rất rẻ và phải chăng'),
(19, 7, '2022-03-26', '18:02:00', 'EUGEN', '', 'Giày đúng chính hãng, nhân viên nhiệt tình'),
(20, 7, '2022-03-26', '18:02:00', 'EUGEN', '', 'Nhân viên shop phục vụ rất chu đáo, giải thích rõ ràng'),
(21, 7, '2022-03-26', '18:02:00', 'EUGEN', '', 'Mua vào dịp được giảm giá nên giá cả rất rẻ và phải chăng'),
(23, 7, '2022-03-27', '13:14:00', 'Hải', '', 'This is a test review '),
(25, 2, '2022-03-27', '13:22:00', 'Minh', '', 'This is test 2\n '),
(26, 1, '2022-03-27', '13:26:00', 'Minh', '', 'Testing review '),
(27, 1, '2022-03-27', '19:03:00', 'Kohn Doe', 'johndue@gmail.com', 'hay '),
(28, 1, '2022-03-27', '19:43:00', 'Kohn Doe', 'johndue@gmail.com', 'hay qua '),
(29, 4, '2022-03-27', '20:10:00', 'Kohn Doe', 'johndue@gmail.com', 'san pham tot ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dateOfBirth` datetime DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL,
  `role` enum('client','admin') NOT NULL DEFAULT 'client',
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `address` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `createdAt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `dateOfBirth`, `email`, `role`, `password`, `image`, `status`, `address`, `phone_no`, `createdAt`) VALUES
(1, 'Kohn Doe', '1996-04-16 00:00:00', 'johndue@gmail.com', 'client', '123456', NULL, 1, '88 Dong Khoi, District 1, HCM, Viet Nam', '0909179911', '2022-03-22'),
(2, 'Micheal Rechardo', '1996-04-16 00:00:00', 'mirechardo@gmail.com', 'client', '123456', NULL, 1, '188 Dong Khoi, District 1, HCM, Viet Nam', '0909990990', '2022-03-22'),
(3, 'Micheal William', '1996-04-16 00:00:00', 'miwill@gmail.com', 'client', '123456', NULL, 1, '189 Dong Khoi, District 1, HCM, Viet Nam', '0909912990', '2022-03-22'),
(4, 'Jason Rockie', '1996-04-16 00:00:00', 'rockie9090@gmail.com', 'client', '123456', NULL, 1, '289 Dong Khoi, District 1, HCM, Viet Nam', '0933912990', '2022-03-22'),
(5, 'Jason Samatham', '1996-04-16 00:00:00', 'Samatham090@gmail.com', 'client', '123456', NULL, 1, '289 Dong Khoi, District 1, HCM, Viet Nam', '0919912990', '2022-03-22'),
(6, 'Minh', '2022-03-01 00:00:00', 'minh@gmail.com', 'admin', '123456', NULL, 1, 'TPHCM', '0909179911', '2022-03-22'),
(7, 'Thanh', '2022-03-31 01:55:53', 'thanh@gmail.com', 'client', '123456', NULL, 1, 'NULL', 'NULL', '2022-03-31'),
(8, 'Hieu', '2022-03-31 03:50:39', 'hieu@gmail.com', 'client', '123456', NULL, 1, 'TPHCM', '0909179911', '2022-03-31'),
(9, 'Thinh', '2022-03-31 03:59:08', 'thinh@gmail.com', 'client', '123456', NULL, 1, 'TPHCM', '0909179911', '2022-03-31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_blog`
--

CREATE TABLE `user_blog` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `role` enum('author','reader') NOT NULL,
  `content` text NOT NULL,
  `name` varchar(20) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user_blog`
--

INSERT INTO `user_blog` (`id`, `blog_id`, `role`, `content`, `name`, `date`) VALUES
(1, 1, 'author', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Annie Davis', '2022-03-23 02:39:49'),
(2, 2, 'author', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'JANIS GALLAGHER', '2022-03-23 02:39:49'),
(3, 3, 'author', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Mac Doe', '2022-03-23 02:39:49'),
(4, 1, 'reader', 'Nice', 'Minh', '2022-03-23 02:39:49'),
(5, 1, 'reader', 'Hay', 'Huynh', '2022-03-23 02:39:49'),
(7, 1, 'reader', '123', 'Minh', '2022-03-23 02:39:49'),
(13, 1, 'reader', 'hay', 'Hien', '2022-03-24 14:30:30'),
(14, 2, 'reader', 'asd', 'Nam', '2022-03-24 14:31:03'),
(15, 3, 'reader', 'hay', 'Hien', '2022-03-24 14:31:30'),
(16, 1, 'reader', 'hay qua', 'Nam', '2022-03-27 15:16:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `vouchers`
--

INSERT INTO `vouchers` (`id`, `code`, `start_time`, `end_time`, `quantity`) VALUES
(1, '123456', '2022-03-19 00:00:00', '2022-03-23 00:00:00', 5),
(2, '123457', '2022-03-14 00:00:00', '2022-03-25 00:00:00', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `war`
--

CREATE TABLE `war` (
  `id` int(11) NOT NULL,
  `id_district` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `war`
--

INSERT INTO `war` (`id`, `id_district`, `name`) VALUES
(20102, 1442, 'Phường Bến Thành'),
(20106, 1442, 'Phường Đa Kao'),
(20107, 1442, 'Phường Nguyễn Cư Trinh'),
(20108, 1442, 'Phường Nguyễn Thái Bình'),
(20109, 1442, 'Phường Phạm Ngũ Lão'),
(20110, 1442, 'Phường Tân Định'),
(22012, 1533, 'Xã Tân Kiên'),
(22013, 1533, 'Xã Tân Nhựt'),
(22014, 1533, 'Xã Tân Quý Tây'),
(22015, 1533, 'Xã Vĩnh Lộc A'),
(22016, 1533, 'Xã Vĩnh Lộc B');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `amount_discounts`
--
ALTER TABLE `amount_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `district_id_cart` (`district_id`),
  ADD KEY `war_id_cart` (`war_id`);

--
-- Chỉ mục cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`cart_id`,`clothing_id`),
  ADD KEY `clothing_id` (`clothing_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `clothes`
--
ALTER TABLE `clothes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Chỉ mục cho bảng `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `voucher` (`voucher`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`clothing_id`),
  ADD KEY `clothing_id` (`clothing_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `percentage_discounts`
--
ALTER TABLE `percentage_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `clothing_id` (`clothing_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`STT`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_blog`
--
ALTER TABLE `user_blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`);

--
-- Chỉ mục cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `war`
--
ALTER TABLE `war`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_district_` (`id_district`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `clothes`
--
ALTER TABLE `clothes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `STT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `user_blog`
--
ALTER TABLE `user_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `war`
--
ALTER TABLE `war`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22017;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `amount_discounts`
--
ALTER TABLE `amount_discounts`
  ADD CONSTRAINT `amount_discounts_ibfk_1` FOREIGN KEY (`id`) REFERENCES `vouchers` (`id`);

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `district_id_cart` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`),
  ADD CONSTRAINT `war_id_cart` FOREIGN KEY (`war_id`) REFERENCES `war` (`id`);

--
-- Các ràng buộc cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `cart_details_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `cart_details_ibfk_2` FOREIGN KEY (`clothing_id`) REFERENCES `clothes` (`id`);

--
-- Các ràng buộc cho bảng `clothes`
--
ALTER TABLE `clothes`
  ADD CONSTRAINT `clothes_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`voucher`) REFERENCES `vouchers` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`clothing_id`) REFERENCES `clothes` (`id`);

--
-- Các ràng buộc cho bảng `percentage_discounts`
--
ALTER TABLE `percentage_discounts`
  ADD CONSTRAINT `percentage_discounts_ibfk_1` FOREIGN KEY (`id`) REFERENCES `vouchers` (`id`);

--
-- Các ràng buộc cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `product_detail_ibfk_1` FOREIGN KEY (`id`) REFERENCES `clothes` (`id`);

--
-- Các ràng buộc cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`clothing_id`) REFERENCES `clothes` (`id`);

--
-- Các ràng buộc cho bảng `user_blog`
--
ALTER TABLE `user_blog`
  ADD CONSTRAINT `id_blogs_referrals` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`);

--
-- Các ràng buộc cho bảng `war`
--
ALTER TABLE `war`
  ADD CONSTRAINT `id_district_` FOREIGN KEY (`id_district`) REFERENCES `districts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
