-- Update Photos SQL File
-- Use this file to add new photos to your gallery
-- Make sure to run this after the main database.sql file

USE gallery_db;

-- Add your new photos here using this format:
INSERT INTO photos (file_path, title) VALUES
('*.jpg', '*'),
;

-- Note: Make sure the file_path matches the actual image files in your uploads directory 