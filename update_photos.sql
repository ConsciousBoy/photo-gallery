-- Update Photos SQL File
-- Use this file to add new photos to your gallery
-- Make sure to run this after the main database.sql file

USE gallery_db;

-- Add your new photos here using this format:
INSERT INTO photos (file_path, title) VALUES
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

-- Note: Make sure the file_path matches the actual image files in your uploads directory 