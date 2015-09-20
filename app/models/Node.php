<?php

class Node extends \Eloquent
{
    const CACHE_KEY     = 'site_nodes';
    const CACHE_MINUTES = 60;

    protected $fillable = [];

    public function topics($filter)
    {
        return $this->hasMany('Topic')->getTopicsWithFilter($filter);
    }

    public static function allLevelUp($excellent=false)
    {
        $nodes = Node::all();

        $result = array();
        foreach ($nodes as $key => $node) 
        {
            if ($node->parent_node == null) 
            {
                $result['top'][] = $node;
            }else{
                if ($excellent) 
                {
                    $node->excellent && $result['second'][$node->parent_node][] = $node;
                } else
                {
                    $result['second'][$node->parent_node][] = $node;
                }
            }
        }
        return $result;
    }

    public static function userLevelUp($userId)
    {
        $userNode = UserNode::nodeIds($userId);  
        $userNodeIds = implode(',', $userNode);
        $nodes = Node::whereRaw("id in ({$userNodeIds})")->get();

        $result = $top = array();
        foreach($nodes as $key => $node) 
        {
            if(!in_array($node->parent_node, $top)) 
            {
               array_push($top, $node->parent_node); 
            }
            $result['second'][$node->parent_node][] = $node;
        }

        $topIds = implode(',', $top);
        $topNodes = Node::whereRaw("id in ({$topIds})")->get();
        foreach($topNodes as $tkey => $tnode)
        {
            $result['top'][] = $tnode;
        }
        return $result;
    }

    public function getFormattedParentNodeAttribute(){
        $parent_id = $this->getAttribute('parent_node');
        $parent_node = Node::find($parent_id); 
        return $parent_node->name;
    }
}
