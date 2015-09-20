<?php

class UserNode extends \Eloquent
{
    public static function nodeIds($userId)
    {
        $userNode = UserNode::where('user_id', '=', $userId)->get();
        $result = array();
        foreach($userNode as $node)
        {
           array_push($result, $node->node_id); 
        }

        return $result;
    }

}
