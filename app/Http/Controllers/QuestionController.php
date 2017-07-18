<?php

namespace App\Http\Controllers;

use App\Question;
use Carbon\Carbon;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(Request $request) {
        $question = new Question();
        if ($request->input('name') == '' || $request->input('url') == '') {
            return "问卷名称或url不能为空";
        }
        $question->name = $request->input('name');
        $question->location = new Point($request->input('lat'), $request->input('lng'));
        $question->url = $request->input('url');
        $question->distance = $request->input('distance');
        $question->start_time = $request->input('start_time');
        $question->end_time = $request->input('end_time');
        $question->save();

        return "success";
    }

    public function getNearQuestion(Request $request) {
        $lat = $request->input('lat');
        $lng = $request->input('lng');
//        $question = Question::distanceSphere(350000, new Point($lat, $lng), 'location')
//            ->get();
        $point = new Point($lat, $lng);
        $question = Question::selectRaw("*, st_distance_sphere(`location`, GeomFromText('{$point->toWkt()}')) as dist")
            ->where('start_time', '<', Carbon::now('Asia/Shanghai'))
            ->where('end_time', '>', Carbon::now('Asia/Shanghai'))
            ->whereRaw("st_distance_sphere(`location`, GeomFromText('{$point->toWkt()}')) <= `distance`")
            ->get();
        return view('list', ['questions' => $question]);
    }
}
