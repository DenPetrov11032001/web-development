SELECT
    *
FROM
    student
WHERE
    student.age > 19;



SELECT
    *
FROM
    student
JOIN
    group_students
WHERE
    student.group_id = 2;


SELECT
    *
FROM
    student as s
JOIN
    group_students as gs
JOIN
    faculty as f
WHERE
    s.group_id = 1 AND gs.faculty_id = 1;


SELECT
    *
FROM
    student as s
JOIN
    group_students as gs
JOIN
    faculty as f
WHERE
    s.id = 1 AND gs.id = s.group_id AND f.id = gs.faculty_id;