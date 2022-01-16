<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Index
Breadcrumbs::for('index', function (BreadcrumbTrail $trail) {
    $trail->push('/', '/');
});

/*  ----------------------------------------------------------------------------------------------------------------  */
/*  -- Admin Breadcrumbs  ------------------------------------------------------------------------------------------  */
/*  ----------------------------------------------------------------------------------------------------------------  */

// Index > Dashboard
Breadcrumbs::for('adminDash', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('Dashboard', '/admin/dashboard');
});

// Index > Dashboard > Create User
Breadcrumbs::for('createUser', function (BreadcrumbTrail $trail) {
    $trail->parent('adminDash');
    $trail->push('Create new user', '/admin/register');
});

// Index > Dashboard > disciplines
Breadcrumbs::for('disciplines', function (BreadcrumbTrail $trail) {
    $trail->parent('adminDash');
    $trail->push('Disciplines', '/admin/disciplines');
});

// Index > Dashboard > Disciplines > New Discipline
Breadcrumbs::for('NewDisciplines', function (BreadcrumbTrail $trail) {
    $trail->parent('disciplines');
    $trail->push('Create new discipline', '/admin/create/discipline');
});

//  -- Tutors  --  //

// Index > Dashboard > List Tutors
Breadcrumbs::for('tutors', function (BreadcrumbTrail $trail) {
    $trail->parent('adminDash');
    $trail->push('Tutor List', '/admin/users');
});

// Index > Dashboard > List tutor > Tutor x
Breadcrumbs::for('listTutor', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('tutors');
    $trail->push('Tutor ' . $id, "/admin/tutors/" . $id);
});

// Index > Dashboard > List tutor > Tutor x > Assign Discipline
Breadcrumbs::for('listTutorDisc', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('listTutor', $id);
    $trail->push('Assign Discipline', "/admin/tutors/" . $id . '/assign');
});

//  -- Students --  //

// Index > Dashboard > List Student
Breadcrumbs::for('students', function (BreadcrumbTrail $trail) {
    $trail->parent('adminDash');
    $trail->push('Student List', '/admin/users');
});

// Index > Dashboard > List student > Student x
Breadcrumbs::for('listStudents', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('students');
    $trail->push('Student ' . $id, "/admin/users/" . $id);
});

// Index > Dashboard > List student > Student x > Assign Discipline
Breadcrumbs::for('listStudentsDisc', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('listStudents', $id);
    $trail->push('Assign Discipline', "/admin/tutors/" . $id . '/assign');
});

/*  ----------------------------------------------------------------------------------------------------------------  */
/*  -- Tutor Breadcrumbs  ------------------------------------------------------------------------------------------  */
/*  ----------------------------------------------------------------------------------------------------------------  */

// Index > Dashboard
Breadcrumbs::for('tutorDash', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('Dashboard', '/tutor/dashboard');
});

// Index > Dashboard > Assigment x
Breadcrumbs::for('tutorPost', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('tutorDash');
    $trail->push('Assigment ' . $id, '/tutor/assigment/' . $id);
});

// Index > Dashboard > Assigment x > Create post
Breadcrumbs::for('tutorCreatePost', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('tutorPost', $id);
    $trail->push('Create Post', '/tutor/createPost');
});

/*  ----------------------------------------------------------------------------------------------------------------  */
/*  -- Student Breadcrumbs  ----------------------------------------------------------------------------------------  */
/*  ----------------------------------------------------------------------------------------------------------------  */

// Index > Dashboard
Breadcrumbs::for('userDash', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('Dashboard', '/dashboard');
});

// Index > Dashboard > Assigment x
Breadcrumbs::for('userPost', function (BreadcrumbTrail $trail, $id, $slug) {
    $trail->parent('userDash');
    $trail->push('Post ' . $id, '/post' . $slug);
});
