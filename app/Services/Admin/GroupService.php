<?php

namespace App\Services\Admin;

use App\Models\Group;
use App\Models\Schedule;

class GroupService extends AbstractService
{
    public function createGroup($data)
    {
        // Make groups
        $dataGroup = [
            'name' => $data['name'],
            'description' => $data['description'],
            'quantity' => $data['quantity']
        ];

        $group = Group::create($dataGroup);

        // Make schedules
        $schedules = $this->initDataSchedule($data['day_of_week'], $data['start_time'], $data['end_time'], $group->id);
        $group->schedules()->createMany($schedules);

        return $group;
    }

    public function getGroups()
    {
        $groups = Group::with('schedules')->orderBy('id', 'desc')->get();

        return $groups;
    }

    public function updateGroup($group, $data)
    {
        $group->update($data);

        $schedules = $this->initDataSchedule($data['day_of_week'], $data['start_time'], $data['end_time'], $group->id);
        $group->schedules()->delete();
        $group->schedules()->createMany($schedules);

        return true;
    }

    private function initDataSchedule($dayOfWeek, $startTime, $endTime, $groupId)
    {
        if (!is_array($dayOfWeek)) {
            $dayOfWeek = explode(',', $dayOfWeek);
        }
        $result = [];

        for ($i = 0; $i < count($dayOfWeek); $i++) {
            $result[] = [
                'group_id' => $groupId,
                'day_of_week' => intval($dayOfWeek[$i]),
                'start_time' => $startTime[$i],
                'end_time' => $endTime[$i],
            ];
        }

        return $result;
    }
}
