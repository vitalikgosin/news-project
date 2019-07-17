<?php

namespace App\Http\Controllers\Admin;

use App\CourseRequest;
use App\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function messages($request_id)
    {
        $course_request = CourseRequest::find($request_id);

        if(
            $course_request->user_id != \Auth::id() // не подходит отправитель
            && // и
            $course_request->course->course_author_id != \Auth::id() // не подходит получатель
        ){
            // если не подходит ни тот, ни другой - показываем 404
            abort(404);
        }
        $course_author_flag = 0;
        if($course_request->course->course_author_id == \Auth::id()){

            $course_author_flag = 1;
        }

        // раз сюда дошли - значит подходит

        //dd($course_request->course_id);
        $request_status = $course_request->request_status;


        $coursemessages = Message::where('request_id', $request_id)
        ->orderBy('created_at' , 'asc')
        ->get();




        return view('admin.messages', ['messages' =>  $coursemessages,
            'course_request'=>$course_request,
            'request_status'=> $request_status,
            'course_author_flag'=>$course_author_flag
            ]);

    }

    public function startCourseBtn($request_id)
    {
        $course_request = CourseRequest::find($request_id);
        if($course_request->user_id != \Auth::id())
         {
            abort(404);
          }

    }


}
