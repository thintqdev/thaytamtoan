<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request, Exam $exam)
    {
        // $classId = $request->get('class_id');

        // $childrenIds = Category::find($classId);
        // if (is_null($childrenIds)) {
        //     $childrenIds = [];
        // }

        // $chapterId = $request->get('chapter_id');
        // $questions = Question::where('category_id', $chapterId)->where('level', $request->get('level'))->get();
        $questions = Question::with('category')->where('exam_id', $exam->id)->get();


        return view('admin.question.index', [
            'questions' => $questions,
            'exam' => $exam
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Exam $exam)
    {
        $levels = config('view.question.level');
        $parentCategories = Category::whereNotNull('parent_id')->get();
        return view('admin.question.create', ['parent_categories' => $parentCategories, 'exam' => $exam, 'levels' => $levels]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $result = Question::create($data);

        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param Question $question
     * @return \Illuminate\Http\Response
     */
    public function show($question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Question $question
     * @return \Illuminate\Http\Response
     */
    public function edit($question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Question $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Question $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($question)
    {
        //
    }
}
