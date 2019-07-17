<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\CourseRequest
 *
 * @property int $id
 * @property int $course_id
 * @property int $user_id
 * @property string $request_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Course $course
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CourseRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CourseRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CourseRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CourseRequest whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CourseRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CourseRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CourseRequest whereRequestStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CourseRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CourseRequest whereUserId($value)
 */
	class CourseRequest extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Course
 *
 * @property int $id
 * @property string $course_title
 * @property string $course_slug
 * @property string|null $course_description
 * @property string|null $project_url
 * @property string|null $course_featured_img
 * @property int $published
 * @property string $course_author_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Course onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereCourseAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereCourseDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereCourseFeaturedImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereCourseSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereCourseTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereProjectUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Course withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Course withoutTrashed()
 */
	class Course extends \Eloquent {}
}

namespace App{
/**
 * App\Message
 *
 * @property int $id
 * @property int $request_id
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Message $course
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUpdatedAt($value)
 */
	class Message extends \Eloquent {}
}

