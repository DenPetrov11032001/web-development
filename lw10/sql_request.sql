SELECT
    *
FROM
    student
WHERE
    age > 19;



SELECT
    *
FROM
    group_students as gs
JOIN
    student
WHERE
    gs.id = 2;


SELECT
    *
FROM
    faculty as f
JOIN
    group_students as gs
JOIN
    student as s
WHERE
    f.group_id = gs.id AND gs.id = 1;


SELECT
    *
FROM
    group_students as gs
JOIN
    faculty as f
JOIN
    student as s
WHERE
    gs.student_id = 5 AND f.group_id = gs.id;