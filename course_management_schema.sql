-- Course Management Database Schema
-- Run this SQL script to create the necessary tables for course management

-- Courses table
CREATE TABLE IF NOT EXISTS courses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    category VARCHAR(100),
    level ENUM('beginner', 'intermediate', 'advanced') DEFAULT 'beginner',
    instructor_id INT NOT NULL,
    status ENUM('draft', 'published') DEFAULT 'draft',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_instructor (instructor_id),
    INDEX idx_status (status),
    INDEX idx_category (category)
);

-- Course modules table
CREATE TABLE IF NOT EXISTS course_modules (
    id INT PRIMARY KEY AUTO_INCREMENT,
    course_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    order_index INT NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE,
    INDEX idx_course (course_id),
    INDEX idx_order (order_index)
);

-- Course lessons table
CREATE TABLE IF NOT EXISTS course_lessons (
    id INT PRIMARY KEY AUTO_INCREMENT,
    module_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT,
    video_url VARCHAR(500),
    duration INT DEFAULT 0, -- Duration in minutes
    order_index INT NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (module_id) REFERENCES course_modules(id) ON DELETE CASCADE,
    INDEX idx_module (module_id),
    INDEX idx_order (order_index)
);

-- Enrollments table (for tracking student enrollments)
CREATE TABLE IF NOT EXISTS enrollments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    course_id INT NOT NULL,
    student_id INT NOT NULL,
    enrolled_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    progress_percentage DECIMAL(5,2) DEFAULT 0.00,
    completed_at TIMESTAMP NULL,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE,
    UNIQUE KEY unique_enrollment (course_id, student_id),
    INDEX idx_course (course_id),
    INDEX idx_student (student_id)
);

-- Sample data insertion (optional - for testing)
-- Insert sample courses
INSERT INTO courses (title, description, price, category, level, instructor_id, status) VALUES
('Web Development Bootcamp', 'Complete web development course covering HTML, CSS, JavaScript, and PHP', 99.99, 'Web Development', 'beginner', 1, 'published'),
('Data Science Fundamentals', 'Learn data analysis, visualization, and machine learning basics', 149.99, 'Data Science', 'intermediate', 1, 'published'),
('Python Programming', 'Master Python programming from basics to advanced concepts', 79.99, 'Programming', 'beginner', 1, 'draft');

-- Insert sample modules for first course
INSERT INTO course_modules (course_id, title, description, order_index) VALUES
(1, 'HTML Fundamentals', 'Learn the basics of HTML markup', 1),
(1, 'CSS Styling', 'Master CSS for beautiful web designs', 2),
(1, 'JavaScript Basics', 'Introduction to JavaScript programming', 3);

-- Insert sample lessons
INSERT INTO course_lessons (module_id, title, content, video_url, duration, order_index) VALUES
(1, 'What is HTML?', 'HTML is the standard markup language for creating web pages...', 'https://example.com/video1.mp4', 15, 1),
(1, 'HTML Elements', 'Learn about different HTML elements and their uses...', 'https://example.com/video2.mp4', 20, 2),
(2, 'CSS Selectors', 'Understanding CSS selectors and how to target elements...', 'https://example.com/video3.mp4', 18, 1),
(2, 'Box Model', 'Learn about the CSS box model and layout...', 'https://example.com/video4.mp4', 22, 2);
