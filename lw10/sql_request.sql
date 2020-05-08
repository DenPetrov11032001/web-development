SELECT
    *
FROM
    student
WHERE
    age > 19;



SELECT
    *
FROM
    group_students
JOIN
    student
WHERE
    group_title = 1;


SELECT
    *
FROM
    faculty
JOIN
    group_stodents
JOIN
    student
WHERE
    faculty.group_title = group_stodents.group_title AND group_stodents.group_title = 1;


SELECT
    *
FROM
    group_students
JOIN
    faculty
WHERE
    group_students.student_id = student.id AND faculty.group_title = group_stodents.group_title;