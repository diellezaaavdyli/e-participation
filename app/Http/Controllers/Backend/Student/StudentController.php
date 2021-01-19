<?php

namespace App\Http\Controllers\Backend\Student;

use App\Exceptions\GeneralException;
use App\Http\Requests\Backend\Student\DeleteStudentRequest;
use App\Http\Requests\Backend\Student\EditStudentRequest;
use App\Http\Requests\Backend\Student\StoreStudentRequest;
use App\Http\Requests\Backend\Student\UpdateStudentRequest;
use App\Models\Student;
use App\Services\StudentService;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Throwable;

/**
 * Class StudentController.
 */
class StudentController extends Controller
{
    /**
     * @var StudentService
     */
    protected $studentService;

    /**
     * StudentController constructor.
     *
     * @param StudentService $studentService
     */
    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        return view('backend.student.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.student.create');
    }

    /**
     * @param  StoreStudentRequest  $request
     *
     * @return mixed
     * @throws GeneralException
     * @throws Throwable
     */
    public function store(StoreStudentRequest $request)
    {
        $this->studentService->store($request->validated());

        return redirect()->route('admin.student.index')->withFlashSuccess(__('The student was successfully created.'));
    }

    /**
     * @param EditStudentRequest $request
     * @param Student $student
     * @return mixed
     */
    public function edit(EditStudentRequest $request, Student $student)
    {
        return view('backend.student.edit')
            ->withStudent($student);
    }

    /**
     * @param  UpdateStudentRequest  $request
     * @param  Student  $student
     *
     * @return mixed
     * @throws Throwable
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $this->studentService->update($student, $request->validated());

        return redirect()->route('admin.student.index')->withFlashSuccess(__('The student was successfully updated.'));
    }

    /**
     * @param DeleteStudentRequest $request
     * @param Student $student
     * @return mixed
     * @throws GeneralException
     */
    public function destroy(DeleteStudentRequest $request, Student $student)
    {
        $this->studentService->destroy($student);

        return redirect()->route('admin.student.index')->withFlashSuccess(__('The student was successfully deleted.'));
    }
}
