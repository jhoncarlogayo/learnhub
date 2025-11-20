<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Course Model
 * Handles database operations for courses, modules, and lessons
 */
class Course extends Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute a query with error handling
     */
    private function executeQuery($sql, $params = []) {
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get all courses for a specific instructor
     */
    public function getCoursesByInstructor($instructor_id) {
        $sql = "SELECT c.*,
                       COUNT(DISTINCT cm.id) as module_count,
                       COUNT(DISTINCT cl.id) as lesson_count,
                       COUNT(DISTINCT e.student_id) as enrolled_students
                FROM courses c
                LEFT JOIN course_modules cm ON c.id = cm.course_id
                LEFT JOIN course_lessons cl ON cm.id = cl.module_id
                LEFT JOIN enrollments e ON c.id = e.course_id
                WHERE c.instructor_id = ?
                GROUP BY c.id
                ORDER BY c.created_at DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$instructor_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get a single course by ID
     */
    public function getCourseById($course_id, $instructor_id = null) {
        $sql = "SELECT * FROM courses WHERE id = ?";
        $params = [$course_id];

        if ($instructor_id) {
            $sql .= " AND instructor_id = ?";
            $params[] = $instructor_id;
        }

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Create a new course
     */
    public function createCourse($data) {
        $sql = "INSERT INTO courses (title, description, price, category, level, instructor_id, status, created_at, updated_at)
                VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $data['title'],
            $data['description'],
            $data['price'],
            $data['category'],
            $data['level'],
            $data['instructor_id'],
            $data['status'] ?? 'draft'
        ]);

        return $this->db->lastInsertId();
    }

    /**
     * Update an existing course
     */
    public function updateCourse($course_id, $data, $instructor_id) {
        $sql = "UPDATE courses SET
                title = ?,
                description = ?,
                price = ?,
                category = ?,
                level = ?,
                status = ?,
                updated_at = NOW()
                WHERE id = ? AND instructor_id = ?";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['title'],
            $data['description'],
            $data['price'],
            $data['category'],
            $data['level'],
            $data['status'],
            $course_id,
            $instructor_id
        ]);
    }

    /**
     * Delete a course
     */
    public function deleteCourse($course_id, $instructor_id) {
        // First delete related records
        $this->deleteCourseModules($course_id);

        $sql = "DELETE FROM courses WHERE id = ? AND instructor_id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$course_id, $instructor_id]);
    }

    /**
     * Toggle course visibility (published/draft)
     */
    public function toggleVisibility($course_id, $instructor_id) {
        $sql = "UPDATE courses SET
                status = CASE WHEN status = 'published' THEN 'draft' ELSE 'published' END,
                updated_at = NOW()
                WHERE id = ? AND instructor_id = ?";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$course_id, $instructor_id]);
    }

    /**
     * Get modules for a course
     */
    public function getCourseModules($course_id) {
        $sql = "SELECT cm.*, COUNT(cl.id) as lesson_count
                FROM course_modules cm
                LEFT JOIN course_lessons cl ON cm.id = cl.module_id
                WHERE cm.course_id = ?
                GROUP BY cm.id
                ORDER BY cm.order_index ASC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$course_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Create a new module
     */
    public function createModule($data) {
        $sql = "INSERT INTO course_modules (course_id, title, description, order_index, created_at)
                VALUES (?, ?, ?, ?, NOW())";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $data['course_id'],
            $data['title'],
            $data['description'],
            $data['order_index']
        ]);

        return $this->db->lastInsertId();
    }

    /**
     * Update a module
     */
    public function updateModule($module_id, $data, $course_id) {
        $sql = "UPDATE course_modules SET
                title = ?,
                description = ?,
                order_index = ?
                WHERE id = ? AND course_id = ?";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['title'],
            $data['description'],
            $data['order_index'],
            $module_id,
            $course_id
        ]);
    }

    /**
     * Delete a module and its lessons
     */
    public function deleteModule($module_id, $course_id) {
        // Delete lessons first
        $this->deleteModuleLessons($module_id);

        $sql = "DELETE FROM course_modules WHERE id = ? AND course_id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$module_id, $course_id]);
    }

    /**
     * Get lessons for a module
     */
    public function getModuleLessons($module_id) {
        $sql = "SELECT * FROM course_lessons
                WHERE module_id = ?
                ORDER BY order_index ASC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$module_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Create a new lesson
     */
    public function createLesson($data) {
        $sql = "INSERT INTO course_lessons (module_id, title, content, video_url, duration, order_index, created_at)
                VALUES (?, ?, ?, ?, ?, ?, NOW())";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $data['module_id'],
            $data['title'],
            $data['content'],
            $data['video_url'],
            $data['duration'],
            $data['order_index']
        ]);

        return $this->db->lastInsertId();
    }

    /**
     * Update a lesson
     */
    public function updateLesson($lesson_id, $data, $module_id) {
        $sql = "UPDATE course_lessons SET
                title = ?,
                content = ?,
                video_url = ?,
                duration = ?,
                order_index = ?
                WHERE id = ? AND module_id = ?";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['title'],
            $data['content'],
            $data['video_url'],
            $data['duration'],
            $data['order_index'],
            $lesson_id,
            $module_id
        ]);
    }

    /**
     * Delete a lesson
     */
    public function deleteLesson($lesson_id, $module_id) {
        $sql = "DELETE FROM course_lessons WHERE id = ? AND module_id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$lesson_id, $module_id]);
    }

    /**
     * Delete all modules for a course
     */
    private function deleteCourseModules($course_id) {
        $modules = $this->getCourseModules($course_id);
        foreach ($modules as $module) {
            $this->deleteModuleLessons($module['id']);
        }

        $sql = "DELETE FROM course_modules WHERE course_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$course_id]);
    }

    /**
     * Delete all lessons for a module
     */
    private function deleteModuleLessons($module_id) {
        $sql = "DELETE FROM course_lessons WHERE module_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$module_id]);
    }
}
?>
