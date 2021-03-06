<?php

class NodesController extends \BaseController
{

    protected $topic;

    public function __construct(Topic $topic)
    {
        parent::__construct();
        
        $this->beforeFilter('auth', ['only' => 'create', 'store']);
        $this->topic = $topic;
    }

    public function create()
    {
        return View::make('nodes.create');
    }

    public function store()
    {
        $validator = Validator::make($data = Input::all(), Node::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Node::create($data);

        return Redirect::route('nodes.index');
    }

    public function show($id)
    {
        $node = Node::findOrFail($id);
        $filter = $this->topic->present()->getTopicFilter();
        $topics = $this->topic->getNodeTopicsWithFilter($filter, $id);

        return View::make('topics.index', compact('topics', 'node'));
    }

    public function update($id)
    {
        $node = Node::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Node::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $node->update($data);

        return Redirect::route('nodes.index');
    }

    public function destroy($id)
    {
        Node::destroy($id);

        return Redirect::route('nodes.index');
    }

    public function operate()
    {
        $nodeId = Input::get('node_id');
        $operateType = Input::get('operate_type');
        $userId = Auth::user()->id;

        $userNode = UserNode::whereRaw("`user_id` = {$userId} and `node_id` = {$nodeId}")->get();
        if($operateType == 'follow' && empty($userNode->id))
        {
            $userNode = new UserNode();
            $userNode->user_id = $userId;
            $userNode->node_id = $nodeId;
            $userNode->save();
        }elseif(!empty($userNode->id)){
            $userNode->delete(); 
        }

        echo json_encode(array(
            'errNo' => Config::get('common.err_no.success'),
            'errMsg' => Config::get('common.err_msg.success'), 
        ));
    }
}
