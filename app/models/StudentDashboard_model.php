<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Student Dashboard Model
 * Handles database operations for student dashboard data
 */
class StudentDashboard_model extends Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Get student profile information
     */
    public function get_student_profile($student_id) {
        $sql = "SELECT id, name, email, profile_picture, created_at
                FROM users
                WHERE id = ? AND role = 'student'";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$student_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Get student's enrolled courses with progress
     */
    public function get_enrolled_courses($student_id) {
        $sql = "SELECT
                    c.id,
                    c.title,
                    c.description,
                    c.price,
                    c.category,
                    c.level,
                    u.name as instructor_name,
                    e.enrolled_at,
                    e.progress_percentage,
                    e.completed_at
                FROM enrollments e
                JOIN courses c ON e.course_id = c.id
                JOIN users u ON c.instructor_id = u.id
                WHERE e.student_id = ? AND c.status = 'published'
                ORDER BY e.enrolled_at DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$student_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get detailed progress for a specific course
     */
    public function get_course_progress($student_id, $course_id) {
        // Get total lessons in course
        $total_sql = "SELECT COUNT(*) as total_lessons
                      FROM course_lessons cl
                      JOIN course_modules cm ON cl.module_id = cm.id
                      WHERE cm.course_id = ?";

        $total_stmt = $this->db->prepare($total_sql);
        $total_stmt->execute([$course_id]);
        $total_result = $total_stmt->fetch(PDO::FETCH_ASSOC);
        $total_lessons = $total_result['total_lessons'] ?? 0;

        // Get completed lessons by student
        $completed_sql = "SELECT COUNT(*) as completed_lessons
                          FROM lesson_progress lp
                          JOIN course_lessons cl ON lp.lesson_id = cl.id
                          JOIN course_modules cm ON cl.module_id = cm.id
                          WHERE lp.student_id = ? AND cm.course_id = ? AND lp.completed = 1";

        $completed_stmt = $this->db->prepare($completed_sql);
        $completed_stmt->execute([$student_id, $course_id]);
        $completed_result = $completed_stmt->fetch(PDO::FETCH_ASSOC);
        $completed_lessons = $completed_result['completed_lessons'] ?? 0;

        // Calculate percentage
        $percentage = $total_lessons > 0 ? round(($completed_lessons / $total_lessons) * 100) : 0;

        return [
            'total_lessons' => $total_lessons,
            'completed_lessons' => $completed_lessons,
            'percentage' => $percentage
        ];
    }

    /**
     * Get recommended courses based on student's enrolled categories
     */
    public function get_recommended_courses($student_id) {
        // Get categories the student is enrolled in
        $category_sql = "SELECT DISTINCT c.category
                         FROM enrollments e
                         JOIN courses c ON e.course_id = c.id
                         WHERE e.student_id = ?";

        $category_stmt = $this->db->prepare($category_sql);
        $category_stmt->execute([$student_id]);
        $categories = $category_stmt->fetchAll(PDO::FETCH_COLUMN);

        if (empty($categories)) {
            // If no enrolled categories, return trending courses
            return $this->get_trending_courses();
        }

        // Get courses from same categories that student hasn't enrolled in
        $placeholders = str_repeat('?,', count($categories) - 1) . '?';
        $sql = "SELECT
                    c.id,
                    c.title,
                    c.description,
                    c.price,
                    c.category,
                    c.level,
                    u.name as instructor_name,
                    COUNT(e.student_id) as enrolled_count
                FROM courses c
                JOIN users u ON c.instructor_id = u.id
                LEFT JOIN enrollments e ON c.id = e.course_id
                WHERE c.category IN ($placeholders)
                AND c.status = 'published'
                AND c.id NOT IN (
                    SELECT course_id FROM enrollments WHERE student_id = ?
                )
                GROUP BY c.id
                ORDER BY enrolled_count DESC, c.created_at DESC
                LIMIT 10";

        $params = array_merge($categories, [$student_id]);
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get trending courses (most enrolled globally)
     */
    public function get_trending_courses() {
        $sql = "SELECT
                    c.id,
                    c.title,
                    c.description,
                    c.price,
                    c.category,
                    c.level,
                    u.name as instructor_name,
                    COUNT(e.student_id) as enrolled_count
                FROM courses c
                JOIN users u ON c.instructor_id = u.id
                LEFT JOIN enrollments e ON c.id = e.course_id
                WHERE c.status = 'published'
                GROUP BY c.id
                ORDER BY enrolled_count DESC, c.created_at DESC
                LIMIT 10";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get latest announcements
     */
    public function get_latest_announcements() {
        $sql = "SELECT
                    a.id,
                    a.title,
                    a.content,
                    a.created_at,
                    u.name as posted_by,
                    u.role
                FROM announcements a
                JOIN users u ON a.posted_by = u.id
                WHERE a.status = 'active'
                ORDER BY a.created_at DESC
                LIMIT 5";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
