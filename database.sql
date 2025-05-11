-- Create database
CREATE DATABASE IF NOT EXISTS gallery_db;
USE gallery_db;

-- Drop existing tables if they exist
DROP TABLE IF EXISTS photos;
DROP TABLE IF EXISTS users;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create photos table
CREATE TABLE IF NOT EXISTS photos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_path VARCHAR(255) NOT NULL,
    title VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample photos
INSERT INTO photos (file_path, title) VALUES
('amomentofbloom.jpg', 'A Moment of Bloom'),
('daisyclose-up.jpg', 'Daisy Close-up'),
('delicateveinsofcolor.jpg', 'Delicate Veins of Color'),
('glimmeringfragments.jpg', 'Glimmering Fragments'),
('marigold.jpg', 'Marigold'),
("nature'sgoldenstar.png", "Nature's Golden Star"),
("nature'swhitevelvet.jpg", "Nature's White Velvet"),
('simplebeauty.jpg', 'Simple Beauty'),
('simplejoyinbloom.jpg', 'Simple Joy in Bloom'),
('springcrocuspair.jpg', 'Spring Crocus Pair'),
("spring'spinkdelight.jpg", "Spring's Pink Delight"),
("spring'swhitewhisper.jpg", "Spring's White Whisper"),
('sunnydandelionhead.jpg', 'Sunny Dandelion Head'),
('unfadingbloom.png', 'Unfading Bloom'),
('violetbloom.jpg', 'Violet Bloom'),
('whiteandyellowdaisy.jpg', 'White and Yellow Daisy'),
('pic1.jpg', 'pic1'),
('pic2.jpg', 'pic2'),
('pic3.jpg', 'pic3'),
('pic4.jpg', 'pic4'),
('pic5.jpg', 'pic5'),
('pic6.jpg', 'pic6'),
('pic7.jpg', 'pic7'),
('pic8.jpg', 'pic8'),
('pic9.jpg', 'pic9'),
('pic10.jpg', 'pic10'),
('pic11.jpg', 'pic11'),
('pic12.jpg', 'pic12'),
('pic13.jpg', 'pic13');
