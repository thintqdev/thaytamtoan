<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateGroupRequest;
use App\Models\Group;
use App\Services\Admin\GroupService;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    protected $groupService;

    public function __construct(GroupService $groupService)
    {
        $this->groupService = $groupService;
    }

    public function index()
    {
        $groups = $this->groupService->getGroups();

        return view(
            'admin.group.index',
            [
                'groups' => $groups
            ]
        );
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $this->groupService->createGroup($data);

        return response()->json(['success' => true]);
    }

    public function destroy(Request $request)
    {
        $group = Group::findOrFail($request->id);
        $group->delete();

        return response()->json(['success' => true]);
    }

    public function show(Request $request)
    {
        $group = Group::with('schedules')->findOrFail($request->id);

        return view('admin.group.detail', ['group' => $group]);
    }

    public function edit(Request $request)
    {
        $group = Group::with('schedules')->findOrFail($request->id);

        return view('admin.group.form_edit', ['group' => $group]);
    }

    public function update(Request $request)
    {
        $group = Group::with('schedules')->findOrFail($request->id);
        $data = $request->all();

        $this->groupService->updateGroup($group, $data);

        return redirect()->route('group.list');
    }
}
