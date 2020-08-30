<?php

/**
 * 841. 钥匙和房间
 * Class CanVisitAllRoomsSolution
 * https://leetcode-cn.com/problems/keys-and-rooms/
 */
class CanVisitAllRoomsSolution
{

    /**
     * @param Integer[][] $rooms
     * @return Boolean
     */
    function canVisitAllRooms($rooms)
    {
        $already_rooms = [0];
        $tmp = [$rooms[0]];
        while (!empty($tmp)) {
            $keys = array_shift($tmp);
            foreach ($keys as $key) {
                if (!in_array($key, $already_rooms)) {
                    $already_rooms[] = $key;
                    $tmp[] = $rooms[$key];
                }
            }
        }
        return count($rooms) == count($already_rooms);
    }
}