<?php

namespace App\Http\Controllers\Backend\School;

use App\Exceptions\GeneralException;
use App\Http\Requests\Backend\School\DeleteSchoolRequest;
use App\Http\Requests\Backend\School\EditSchoolRequest;
use App\Http\Requests\Backend\School\StoreSchoolRequest;
use App\Http\Requests\Backend\School\UpdateSchoolRequest;
use App\Models\School;
use App\Services\CityService;
use App\Services\SchoolService;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Throwable;

/**
 * Class SchoolController.
 */
class SchoolController extends Controller
{
    /**
     * @var SchoolService
     */
    protected $schoolService;

    /**
     * @var UserService
     */
    protected $userService;

    /**
     * @var CityService
     */
    protected $cityService;

    /**
     * SchoolController constructor.
     *
     * @param SchoolService $schoolService
     * @param UserService $userService
     * @param CityService $cityService
     */
    public function __construct(SchoolService $schoolService, UserService $userService, CityService $cityService)
    {
        $this->schoolService = $schoolService;
        $this->userService = $userService;
        $this->cityService = $cityService;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        return view('backend.school.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.school.create')->withCities($this->cityService->get());
    }

    /**
     * @param  StoreSchoolRequest  $request
     *
     * @return mixed
     * @throws GeneralException
     * @throws Throwable
     */
    public function store(StoreSchoolRequest $request)
    {
        $this->schoolService->store($request->validated());

        return redirect()->route('admin.school.index')->withFlashSuccess(__('The school was successfully created.'));
    }

    /**
     * @param EditSchoolRequest $request
     * @param School $school
     * @return mixed
     */
    public function edit(EditSchoolRequest $request, School $school)
    {
        return view('backend.school.edit')
            ->withSchool($school)
            ->withCities($this->cityService->get());
    }

    /**
     * @param  UpdateSchoolRequest  $request
     * @param  School  $school
     *
     * @return mixed
     * @throws Throwable
     */
    public function update(UpdateSchoolRequest $request, School $school)
    {
        $this->schoolService->update($school, $request->validated());

        return redirect()->route('admin.school.index')->withFlashSuccess(__('The school was successfully updated.'));
    }

    /**
     * @param DeleteSchoolRequest $request
     * @param School $school
     * @return mixed
     * @throws GeneralException
     */
    public function destroy(DeleteSchoolRequest $request, School $school)
    {
        $this->schoolService->destroy($school);

        return redirect()->route('admin.school.index')->withFlashSuccess(__('The school was successfully deleted.'));
    }
}
