<?php

class PagesController extends \BaseController
{

    protected $topic;

    public function __construct(Topic $topic)
    {
        parent::__construct();
        $this->topic = $topic;
    }

    /**
     * The home page
     */
    public function home()
    {
        $common = Config::get('common');
        $nodes  = Auth::check() ? Node::userLevelUp(Auth::user()->id) : Node::allLevelUp(true);
        $node_id = array();

        foreach($nodes['second'] as $node)
        {
            foreach($node as $n)
            {
                array_push($node_id, $n->id);
            }
        }
        $topics = $this->topic->getNodeTopicsWithFilter('excellent',$node_id,$common['topic_count_default']);

        if(isset($topics[0])){
            $replies =  $topics[0]->getRepliesWithLimit(10);
            $topic_title = $topics[0]->title;
        }else{
            $replies = array();
            $topic_title = '';
        }
        return View::make('pages.home', compact('topics', 'nodes', 'replies','topic_title'));
    }

    /**
     * topic list in the home page
     */
    public function topic_list()
    {
        $node_id = Input::get('node_id');

        $common = Config::get('common');
        if(empty($node_id)){
            $topics = $this->topic->getTopicsWithFilter('excellent',$common['topic_count_default']);
        }else{
            $topics = $this->topic->getNodeTopicsWithFilter('excellent',$node_id,$common['topic_count_default']);
        }

        if(isset($topics[0])){
            $replies =  $topics[0]->getRepliesWithLimit(10);
            $topic_title = $topics[0]->title;
        }else{
            $replies = array();
            $topic_title = '';
        }
        return View::make('pages.topic_list', compact('topics','replies','topic_title'));
    }

    public function reply_list()
    {
        $topic_id = Input::get('topic_id');
        $topic = Topic::findOrFail($topic_id);

        $replies =  $topic->getRepliesWithLimit(10);
        $topic_title = $topic->title;

        return View::make('pages.reply_list', compact('replies','topic_title'));
    } 
    /**
     * About us page
     */
    public function about()
    {
        return View::make('pages.about');
    }

    /**
     * Community WIKI
     */
    public function wiki()
    {
        $topics = $this->topic->getWikiList();
        return View::make('pages.wiki', compact('topics'));
    }

    /**
     * Search page, using google's.
     */
    public function search()
    {
        $query = Purifier::clean(Input::get('q'));

        $limit = 20;
        $latest_page = Input::get('page') ?: 1;
        \Paginator::setCurrentPage($latest_page);

        $topics = $this->topic->where('title','like','%'.$query.'%')->with('user', 'node', 'lastReplyUser')->paginate($limit);
        $nodes  = Node::allLevelUp();
        $links  = Link::remember(1440)->get();

        return View::make('topics.index', compact('topics', 'nodes', 'links'));
        //return Redirect::away('https://www.baidu.com/search?q=site:phphub.org ' . $query, 301);
    }

    /**
     * Feed function
     */
    public function feed()
    {
        $topics = Topic::excellent()->recent()->limit(20)->get();

        $channel =[
            'title' => 'Pingju - 评论汇集的应用',
            'description' => '评聚是一个为您汇聚感兴趣的咨询以及评论的网络应用',
            'link' => URL::route('feed')
        ];

        $feed = Rss::feed('2.0', 'UTF-8');

        $feed->channel($channel);

        foreach ($topics as $topic) {
            $feed->item([
                'title' => $topic->title,
                'description|cdata' => str_limit($topic->body, 200),
                'link' => URL::route('topics.show', $topic->id),
                'pubDate' => date('Y-m-d', strtotime($topic->created_at)),
                ]);
        }

        return Response::make($feed, 200, array('Content-Type' => 'text/xml'));
    }

    /**
     * Sitemap function
     */
    public function sitemap()
    {
        return App::make('Phphub\Sitemap\Builder')->render();
    }
}
